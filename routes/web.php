<?php

use App\Http\Livewire\User\Users;
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


// Frontend
Route::group(['middleware' => ['auth']], function () {
//    Route::namespace("backend")->group(function () { //to define this, there must be a backend folder for controllers.
    Route::group(['prefix' => 'backend'], function () {
        Route::get("/dashboard", 'MainController@mainPage')->name('dashboard');
        Route::get("/article", 'MainController@article')->name('article');
        Route::get("/article/add", 'MainController@addArticle')->name('article.add');

// Route::get("/article/edit/{id}", 'MainController@editArticle')->name('article.edit');


        Route::get("/blogs", 'BlogController@index')->name('blog');

        Route::group(['prefix' => 'testimonials'], function () {
            Route::get("/", 'TestimonialController@index')->name('testimonials')->middleware('can:isAdmin');
        });
        Route::group(['prefix' => 'gallery'], function () {
            Route::get("/", 'ImageGalleryController@index')->name('gallery');
        });

//directly rendering the component via livewire controller
// Route::get('/user', Users::class);


        Route::get('/export/excel/users', 'MainController@exportExcel')->name('export.excel.users');
    });
//    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
