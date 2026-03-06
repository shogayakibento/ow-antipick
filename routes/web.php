<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\PageController@index')->name('index');

Route::get('/select','App\Http\Controllers\PageController@select')->name('select');

Route::post('/choose','App\Http\Controllers\PageController@choose')->name('choose');

Route::get('/about','App\Http\Controllers\PageController@about')->name('about');

Route::get('/robots.txt', function () {
    $content = "User-agent: *\nDisallow:\nSitemap: " . url('/sitemap.xml') . "\n";
    return response($content, 200)->header('Content-Type', 'text/plain');
})->name('robots');

Route::get('/sitemap.xml', function () {
    $urls = [
        ['loc' => url('/'),          'changefreq' => 'weekly',  'priority' => '1.0'],
        ['loc' => url('/select'),    'changefreq' => 'weekly',  'priority' => '0.9'],
        ['loc' => url('/about'),     'changefreq' => 'monthly', 'priority' => '0.5'],
    ];
    $content = view('sitemap', compact('urls'))->render();
    return response($content, 200)->header('Content-Type', 'application/xml');
})->name('sitemap');