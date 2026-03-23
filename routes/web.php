<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\PageController@index')->name('index');

Route::get('/select','App\Http\Controllers\PageController@select')->name('select');

Route::post('/choose','App\Http\Controllers\PageController@choose')->name('choose');

Route::get('/about','App\Http\Controllers\PageController@about')->name('about');

Route::get('/privacy','App\Http\Controllers\PageController@privacy')->name('privacy');

Route::get('/sitemap.xml', function () {
    $characters = \App\Models\Character::all();
    return response()->view('sitemap', compact('characters'))->header('Content-Type', 'application/xml');
})->name('sitemap');

// Hero detail
Route::get('/heroes/{slug}', 'App\Http\Controllers\CharacterController@show')->name('hero.show');

// Character details (キャラ詳細)
Route::get('/heroes', 'App\Http\Controllers\CharacterController@weakness')->name('weakness');
Route::post('/heroes', 'App\Http\Controllers\CharacterController@weaknessResult')->name('weakness.result');
Route::redirect('/weakness', '/heroes', 301);

// English routes
Route::prefix('en')->group(function () {
    Route::get('/','App\Http\Controllers\PageController@indexEn')->name('en.index');
    Route::get('/select','App\Http\Controllers\PageController@selectEn')->name('en.select');
    Route::post('/choose','App\Http\Controllers\PageController@chooseEn')->name('en.choose');
    Route::get('/about','App\Http\Controllers\PageController@aboutEn')->name('en.about');
    Route::get('/privacy','App\Http\Controllers\PageController@privacyEn')->name('en.privacy');
    Route::get('/heroes/{slug}', 'App\Http\Controllers\CharacterController@showEn')->name('en.hero.show');
    Route::get('/heroes', 'App\Http\Controllers\CharacterController@weaknessEn')->name('en.weakness');
    Route::post('/heroes', 'App\Http\Controllers\CharacterController@weaknessResultEn')->name('en.weakness.result');
    Route::redirect('/weakness', '/en/heroes', 301);
});