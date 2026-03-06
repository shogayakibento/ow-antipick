<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\PageController@index')->name('index');

Route::get('/select','App\Http\Controllers\PageController@select')->name('select');

Route::post('/choose','App\Http\Controllers\PageController@choose')->name('choose');

Route::get('/about','App\Http\Controllers\PageController@about')->name('about');

Route::get('/sitemap.xml', function () {
    return response()->view('sitemap')->header('Content-Type', 'application/xml');
})->name('sitemap');