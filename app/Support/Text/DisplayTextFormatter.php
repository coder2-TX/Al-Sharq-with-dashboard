<?php

namespace App\Support\Text;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMText;
use Filament\Forms\Components\RichEditor\RichContentRenderer;
use Filament\Forms\Components\RichEditor\TextColor;

final class DisplayTextFormatter
{
    public static function fromRichEditor(?string $value, ?array $textColors = null): string
    {
        $value = (string) $value;

        if ($value === '') {
            return '';
        }

        $html = RichContentRenderer::make($value)
            ->textColors($textColors ?? TextColor::getDefaults())
            ->toHtml();

        return static::formatHtmlWithEnglishDigits($html);
    }

    public static function fromPlainText(?string $value, bool $convertNewLines = true): string
    {
        $value = (string) $value;

        if ($value === '') {
            return '';
        }

        $result = static::wrapDigitTokensInString($value);

        return $convertNewLines ? nl2br($result) : $result;
    }

    public static function normalizeLatinDigits(?string $value): string
    {
        return strtr((string) $value, [
            '٠' => '0',
            '١' => '1',
            '٢' => '2',
            '٣' => '3',
            '٤' => '4',
            '٥' => '5',
            '٦' => '6',
            '٧' => '7',
            '٨' => '8',
            '٩' => '9',
            '۰' => '0',
            '۱' => '1',
            '۲' => '2',
            '۳' => '3',
            '۴' => '4',
            '۵' => '5',
            '۶' => '6',
            '۷' => '7',
            '۸' => '8',
            '۹' => '9',
        ]);
    }

    protected static function formatHtmlWithEnglishDigits(?string $html): string
    {
        $html = (string) $html;

        if ($html === '') {
            return '';
        }

        $previousUseInternalErrors = libxml_use_internal_errors(true);

        $dom = new DOMDocument('1.0', 'UTF-8');
        $wrappedHtml = '<div id="display-text-root">' . $html . '</div>';

        $loaded = $dom->loadHTML(
            '<?xml encoding="utf-8" ?>' . $wrappedHtml,
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );

        if ($loaded === false) {
            libxml_clear_errors();
            libxml_use_internal_errors($previousUseInternalErrors);

            return $html;
        }

        $root = $dom->getElementById('display-text-root');

        if (! $root instanceof DOMElement) {
            libxml_clear_errors();
            libxml_use_internal_errors($previousUseInternalErrors);

            return $html;
        }

        static::replaceDigitTokensInNode($root, $dom);

        $result = '';
        $children = [];

        foreach ($root->childNodes as $child) {
            $children[] = $child;
        }

        foreach ($children as $child) {
            $result .= $dom->saveHTML($child);
        }

        libxml_clear_errors();
        libxml_use_internal_errors($previousUseInternalErrors);

        return $result;
    }

    protected static function replaceDigitTokensInNode(DOMNode $node, DOMDocument $dom): void
    {
        if ($node instanceof DOMText) {
            static::replaceDigitTokensInTextNode($node, $dom);
            return;
        }

        if (! $node instanceof DOMElement) {
            return;
        }

        $tagName = strtolower($node->tagName);

        if (in_array($tagName, ['script', 'style'], true)) {
            return;
        }

        $classAttr = $node->getAttribute('class');

        if ($classAttr !== '' && preg_match('/(?:^|\s)lp-enDigits(?:\s|$)/u', $classAttr)) {
            return;
        }

        $children = [];

        foreach ($node->childNodes as $child) {
            $children[] = $child;
        }

        foreach ($children as $child) {
            static::replaceDigitTokensInNode($child, $dom);
        }
    }

    protected static function replaceDigitTokensInTextNode(DOMText $textNode, DOMDocument $dom): void
    {
        $text = $textNode->nodeValue ?? '';

        if ($text === '' || ! preg_match('/[0-9٠-٩۰-۹]/u', $text)) {
            return;
        }

        $pattern = '/[A-Za-z0-9٠-٩۰-۹][A-Za-z0-9٠-٩۰-۹:\/\-.]*[0-9٠-٩۰-۹][A-Za-z0-9٠-٩۰-۹:\/\-.]*|[0-9٠-٩۰-۹]+/u';

        preg_match_all($pattern, $text, $matches, PREG_OFFSET_CAPTURE);

        if (empty($matches[0])) {
            return;
        }

        $fragment = $dom->createDocumentFragment();
        $lastOffset = 0;

        foreach ($matches[0] as [$token, $offset]) {
            $before = substr($text, $lastOffset, $offset - $lastOffset);

            if ($before !== '') {
                $fragment->appendChild($dom->createTextNode($before));
            }

            $span = $dom->createElement('span');
            $span->setAttribute('class', 'lp-enDigits');
            $span->setAttribute('dir', 'ltr');
            $span->setAttribute('lang', 'en');
            $span->appendChild($dom->createTextNode(static::normalizeLatinDigits($token)));

            $fragment->appendChild($span);

            $lastOffset = $offset + strlen($token);
        }

        $after = substr($text, $lastOffset);

        if ($after !== '') {
            $fragment->appendChild($dom->createTextNode($after));
        }

        $parent = $textNode->parentNode;

        if ($parent) {
            $parent->replaceChild($fragment, $textNode);
        }
    }

    protected static function wrapDigitTokensInString(string $value): string
    {
        $pattern = '/[A-Za-z0-9٠-٩۰-۹][A-Za-z0-9٠-٩۰-۹:\/\-.]*[0-9٠-٩۰-۹][A-Za-z0-9٠-٩۰-۹:\/\-.]*|[0-9٠-٩۰-۹]+/u';

        preg_match_all($pattern, $value, $matches, PREG_OFFSET_CAPTURE);

        if (empty($matches[0])) {
            return e($value);
        }

        $result = '';
        $lastOffset = 0;

        foreach ($matches[0] as [$token, $offset]) {
            $result .= e(substr($value, $lastOffset, $offset - $lastOffset));
            $result .= '<span class="lp-enDigits" dir="ltr" lang="en">' . e(static::normalizeLatinDigits($token)) . '</span>';
            $lastOffset = $offset + strlen($token);
        }

        $result .= e(substr($value, $lastOffset));

        return $result;
    }
}