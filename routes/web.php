<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Frontend\HomeController@index')->name('shop_index');

Route::post('/filter', 'Frontend\HomeController@filter')->name('shop_filter');
Route::get('/addToCart', 'Frontend\HomeController@addToCart')->name('shop_add_cart');
Route::get('/cart_delete/{id}', 'Frontend\HomeController@cart_delete')->name('cart_delete');
Route::get('/checkout', 'Frontend\HomeController@checkout')->name('checkout');
