<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('salut', function () {
    return("salut");
});

Route::group(['prefix' => 'salutation'], function(){

    Route::get('salut/{slug}-{id}', function ($slug, $id) {
        return "slug : $slug, ID : $id";
    })->where('slug', '[a-z0-9\-]+')->where('id', '[0-9]+');
    
    Route::get('bonjour/{slug}-{id}', ['as' => 'bonjour', function ($slug, $id) {
        return "Lien : " . route('bonjour', ['slug' => $slug, 'id' => $id]);
    }])->where('slug', '[a-z0-9\-]+')->where('id', '[0-9]+');
    
});
