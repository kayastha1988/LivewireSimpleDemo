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
Route::get("/", 'MainController@mainPage')->name('home');
Route::get("/article", 'MainController@article')->name('article');
Route::get("/article/add", 'MainController@addArticle')->name('article.add');

// Route::get("/article/edit/{id}", 'MainController@editArticle')->name('article.edit');


Route::get("/blogs", 'BlogController@index')->name('blog');


Route::get("/testimonials", 'TestimonialController@index')->name('testimonials');

//directly rendering the component via livewire controller
// Route::get('/user', Users::class);


Route::get('/export/excel/users', 'MainController@exportExcel')->name('export.excel.users');
