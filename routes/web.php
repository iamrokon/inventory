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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['as' => 'company.','prefix' => 'company','namespace' => 'Company','middleware'=>['auth','company']],function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('add-category', 'CategoryController@createCategory');
    Route::post('save-category', 'CategoryController@storeCategory');
    Route::get('manage-category', 'CategoryController@manageCategory');
    Route::get('edit-category/{id}', 'CategoryController@editCategory');
    Route::post('update-category', 'CategoryController@updateCategory');
    Route::get('delete-category/{id}', 'CategoryController@deleteCategory');

    Route::get('/add-product', 'ProductController@addProduct');
    Route::post('/save-product', 'ProductController@storeProduct');
    Route::get('/manage-product', 'ProductController@manageProduct');
    Route::get('/order-product/{id}', 'ProductController@orderProduct');
    Route::get('/edit-product/{id}', 'ProductController@editProduct');
    Route::post('/update-product', 'ProductController@updateProduct');
    Route::get('/delete-product/{id}', 'ProductController@deleteProduct');
    Route::get('/received-product', 'ProductController@receivedProduct');
});

Route::group(['as' => 'supplier.','prefix' => 'supplier','namespace' => 'Supplier','middleware'=>['auth','supplier']],function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('/ordered-product', 'ProductController@orderedProduct');
    Route::get('/send-product/{id}', 'ProductController@sendProduct');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
