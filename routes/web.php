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

Route::redirect('/sectors/medical-sector', '/sectors/medicines')->name('site.ar.sectors.medical.page');
Route::redirect('/sectors/medical/pharmacovigilance', '/sectors/medicines/pharmacovigilance')->name('site.ar.sectors.medical.pharmacovigilance');

Route::view('/sectors/medicines', 'site.ar.pages.sectors-3.sector-pages.medicines.index')->name('site.ar.sectors.medicines');
Route::view('/medicines/partner-products', 'site.ar.pages.sectors-3.sector-pages.medicines.partner-products.index')->name('site.ar.medicines.partner-products');
Route::view('/sectors/medicines/pharmacovigilance', 'site.ar.pages.sectors-3.sector-pages.medicines.pharmacovigilance.index')->name('site.ar.sectors.medicines.pharmacovigilance');

Route::view('/sectors/medical-supplies', 'site.ar.pages.sectors-3.sector-pages.medical-supplies.index')->name('site.ar.sectors.medical_supplies');
Route::view('/medical-supplies/partner-products', 'site.ar.pages.sectors-3.sector-pages.medical-supplies.partner-products.index')->name('site.ar.medical_supplies.partner-products');

Route::view('/sectors/milk-food', 'site.ar.pages.sectors-3.sector-pages.milk-food.index')->name('site.ar.sectors.milk_food');
Route::view('/milk-food/partner-products', 'site.ar.pages.sectors-3.sector-pages.milk-food.partner-products.index')->name('site.ar.milk-food.partner-products');

Route::view('/sectors/advertising', 'site.ar.pages.sectors-3.sector-pages.advertising.index')->name('site.ar.sectors.advertising');
Route::view('/advertising/partner-products', 'site.ar.pages.sectors-3.sector-pages.advertising.partner-products.index')->name('site.ar.advertising.partner-products');

Route::view('/sectors/communications', 'site.ar.pages.sectors-3.sector-pages.communications.index')->name('site.ar.sectors.communications');
Route::view('/communications/partner-products', 'site.ar.pages.sectors-3.sector-pages.communications.partner-products.index')->name('site.ar.communications.partner-products');

Route::view('/sectors/cars', 'site.ar.pages.sectors-3.sector-pages.cars.index')->name('site.ar.sectors.cars');
Route::view('/cars/partner-products', 'site.ar.pages.sectors-3.sector-pages.cars.partner-products.index')->name('site.ar.cars.partner-products');

Route::view('/sectors/paints', 'site.ar.pages.sectors-3.sector-pages.paints.index')->name('site.ar.sectors.paints');
Route::view('/paints/partner-products', 'site.ar.pages.sectors-3.sector-pages.paints.partner-products.index')->name('site.ar.paints.partner-products');

Route::view('/sectors/vocational-training', 'site.ar.pages.sectors-3.sector-pages.vocational-training.index')->name('site.ar.sectors.vocational_training');
Route::view('/vocational-training/partner-products', 'site.ar.pages.sectors-3.sector-pages.vocational-training.partner-products.index')->name('site.ar.vocational_training.partner-products');

Route::view('/iso', 'site.ar.pages.iso.index')->name('site.ar.iso');

Route::prefix('en')->name('site.en.')->group(function () {
    Route::view('/', 'site.en.home')->name('home');
    Route::view('/about', 'site.en.pages.about.index')->name('about');
    Route::view('/contact', 'site.en.pages.contact.index')->name('contact');
    Route::view('/news', 'site.en.pages.news.index')->name('news');
    Route::view('/news/details', 'site.en.pages.news.details')->name('news.details');

    Route::view('/sectors', 'site.en.pages.sectors-3.index')->name('sectors');
    Route::view('/sectors/medical', 'site.en.pages.sectors-3.sector-details.medical.index')->name('sectors.medical');
    Route::view('/sectors/commercial', 'site.en.pages.sectors-3.sector-details.commercial.index')->name('sectors.commercial');

    Route::redirect('/sectors/medical-sector', '/en/sectors/medicines')->name('sectors.medical.page');
    Route::redirect('/sectors/medical/pharmacovigilance', '/en/sectors/medicines/pharmacovigilance')->name('sectors.medical.pharmacovigilance');

    Route::view('/sectors/medicines', 'site.en.pages.sectors-3.sector-pages.medicines.index')->name('sectors.medicines');
    Route::view('/medicines/partner-products', 'site.en.pages.sectors-3.sector-pages.medicines.partner-products.index')->name('medicines.partner-products');
    Route::view('/sectors/medicines/pharmacovigilance', 'site.en.pages.sectors-3.sector-pages.medicines.pharmacovigilance.index')->name('sectors.medicines.pharmacovigilance');

    Route::view('/sectors/medical-supplies', 'site.en.pages.sectors-3.sector-pages.medical-supplies.index')->name('sectors.medical_supplies');
    Route::view('/medical-supplies/partner-products', 'site.en.pages.sectors-3.sector-pages.medical-supplies.partner-products.index')->name('medical_supplies.partner-products');

    Route::view('/sectors/milk-food', 'site.en.pages.sectors-3.sector-pages.milk-food.index')->name('sectors.milk_food');
    Route::view('/milk-food/partner-products', 'site.en.pages.sectors-3.sector-pages.milk-food.partner-products.index')->name('milk-food.partner-products');

    Route::view('/sectors/advertising', 'site.en.pages.sectors-3.sector-pages.advertising.index')->name('sectors.advertising');
    Route::view('/advertising/partner-products', 'site.en.pages.sectors-3.sector-pages.advertising.partner-products.index')->name('advertising.partner-products');

    Route::view('/sectors/communications', 'site.en.pages.sectors-3.sector-pages.communications.index')->name('sectors.communications');
    Route::view('/communications/partner-products', 'site.en.pages.sectors-3.sector-pages.communications.partner-products.index')->name('communications.partner-products');

    Route::view('/sectors/cars', 'site.en.pages.sectors-3.sector-pages.cars.index')->name('sectors.cars');
    Route::view('/cars/partner-products', 'site.en.pages.sectors-3.sector-pages.cars.partner-products.index')->name('cars.partner-products');

    Route::view('/sectors/paints', 'site.en.pages.sectors-3.sector-pages.paints.index')->name('sectors.paints');
    Route::view('/paints/partner-products', 'site.en.pages.sectors-3.sector-pages.paints.partner-products.index')->name('paints.partner-products');

    Route::view('/sectors/vocational-training', 'site.en.pages.sectors-3.sector-pages.vocational-training.index')->name('sectors.vocational_training');
    Route::view('/vocational-training/partner-products', 'site.en.pages.sectors-3.sector-pages.vocational-training.partner-products.index')->name('vocational_training.partner-products');

    Route::view('/iso', 'site.en.pages.iso.index')->name('iso');
});