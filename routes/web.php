<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site.ar.home');
});

Route::get('/about', function () {
    return view('site.ar.pages.about.index');
});

Route::get('/contact', function () {
    return view('site.ar.pages.contact.index');
});

Route::get('/news', function () {
    return view('site.ar.pages.news.index');
});

Route::get('/news/details', function () {
    return view('site.ar.pages.news.details');
});

Route::get('/sectors', function () {
    return view('site.ar.pages.sectors.index');
});

Route::get('/en', function () {
    return view('site.en.home');
});