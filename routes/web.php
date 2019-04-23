<?php


use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

Route::get('/', function () {
    return view('home');
});

Route::get('/contact','HomeController@contact')->name('contact');

Route::get('/','ProductCnt@index')->name('home');
Route::get('/shop','ProductCnt@shop')->name('shop');
Route::get('/product/{product}','ProductCnt@product_details')->name('product_details');
Route::get('/category/{category}','ProductCnt@category_products')->name('category_products');

Route::get('/cart','CartCnt@index')->name('cart.index');
Route::post('/add-to-cart','CartCnt@getAddToCart')->name('addToCart');
Route::patch('/cart/update','CartCnt@update')->name('cart.update');
Route::delete('/cart/{product}','CartCnt@destroy')->name('cart.destroy');

Route::get('/checkout','CartCnt@checkout')->name('cart.checkout');

Route::middleware('auth')->group(function (){


    Route::get('/order','checkOutCnt@index')->name('order.index');

    //Route::get('/thankyou','checkOutCnt@thankyou')->name('thankyou');


});




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

