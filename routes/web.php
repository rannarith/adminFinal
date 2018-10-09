<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () {
    // Dashboard 
    Route::get('/','DashboardController@index')->name('dashboard');
    // Category
    Route::get('/categories_list', 'CategoriesController@index')->name('categories_list');
    Route::get('/create_categories', 'CategoriesController@create')->name('create');
    Route::post('/add_category', 'CategoriesController@store')->name('add_category');
    Route::get('/edit_category/{id}', 'CategoriesController@edit')->name('edit');
    Route::post('/update_category/{id}', 'CategoriesController@update')->name('update_category');
    Route::get('/delete_category/{id}', 'CategoriesController@delete')->name('delete');
    Route::get('/search_category', 'CategoriesController@search')->name('search');
    Route::get('/detail_category/{id}', 'CategoriesController@detail')->name('detail');
    // Products
    Route::get('/product_list', 'ProductController@index')->name('list');
    Route::get('/create_product', 'ProductController@create')->name('create');
    Route::post('/add_product', 'ProductController@store')->name('add');
    Route::get('/edit_product/{id}', 'ProductController@edit')->name('edit');
    Route::post('/update_product/{id}', 'ProductController@update')->name('update');
    Route::get('/delete_product/{id}', 'ProductController@delete')->name('delete');
    Route::get('/search_product', 'ProductController@search')->name('search');
    Route::get('/detail_product/{id}', 'ProductController@detail')->name('detail');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
