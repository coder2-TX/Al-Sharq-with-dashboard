<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'site.ar.home')->name('site.ar.home');
Route::view('/about', 'site.ar.pages.about.index')->name('site.ar.about');
Route::view('/contact', 'site.ar.pages.contact.index')->name('site.ar.contact');
Route::view('/news', 'site.ar.pages.news.index')->name('site.ar.news');
Route::view('/news/details', 'site.ar.pages.news.details')->name('site.ar.news.details');
Route::view('/sectors', 'site.ar.pages.sectors-3.index')->name('site.ar.sectors');
Route::view('/sectors/medical', 'site.ar.pages.sectors-3.sector-details.medical.index')->name('site.ar.sectors.medical');
Route::view('/sectors/commercial', 'site.ar.pages.sectors-3.sector-details.commercial.index')->name('site.ar.sectors.commercial');
Route::view('/sectors/medical-sector', 'site.ar.pages.sectors-3.sector-pages.medical.index')->name('site.ar.sectors.medical.page');
Route::view('/sectors/milk-food', 'site.ar.pages.sectors-3.sector-pages.milk-food.index')->name('site.ar.sectors.milk_food');
Route::view('/sectors/advertising', 'site.ar.pages.sectors-3.sector-pages.advertising.index')->name('site.ar.sectors.advertising');
Route::view('/sectors/communications', 'site.ar.pages.sectors-3.sector-pages.communications.index')->name('site.ar.sectors.communications');
Route::view('/sectors/medical/pharmacovigilance', 'site.ar.pages.sectors-3.sector-pages.medical.pharmacovigilance.index')->name('site.ar.sectors.medical.pharmacovigilance');
Route::view('/iso', 'site.ar.pages.iso.index')->name('site.ar.iso');

Route::prefix('en')->name('site.en.')->group(function () {
    Route::view('/', 'site.en.home')->name('home');
    Route::view('/about', 'site.en.pages.about.index')->name('about');
    Route::view('/contact', 'site.en.pages.contact.index')->name('contact');
    Route::view('/news', 'site.en.pages.news.index')->name('news');
    Route::view('/news/details', 'site.en.pages.news.details')->name('news.details');
    Route::view('/iso', 'site.en.pages.iso.index')->name('iso');
});