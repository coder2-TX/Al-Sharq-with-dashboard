<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'site.ar.home')->name('site.ar.home');
Route::view('/about', 'site.ar.pages.about.index')->name('site.ar.about');
Route::view('/contact', 'site.ar.pages.contact.index')->name('site.ar.contact');
Route::view('/news', 'site.ar.pages.news.index')->name('site.ar.news');
Route::view('/news/details', 'site.ar.pages.news.details')->name('site.ar.news.details');
Route::view('/sectors', 'site.ar.pages.sectors.index')->name('site.ar.sectors');
Route::view('/iso', 'site.ar.pages.iso.index')->name('site.ar.iso');

Route::prefix('en')->name('site.en.')->group(function () {
    Route::view('/', 'site.en.home')->name('home');
    Route::view('/about', 'site.en.pages.about.index')->name('about');
    Route::view('/contact', 'site.en.pages.contact.index')->name('contact');
    Route::view('/news', 'site.en.pages.news.index')->name('news');
    Route::view('/news/details', 'site.en.pages.news.details')->name('news.details');
    Route::view('/iso', 'site.en.pages.iso.index')->name('iso');
});