<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function(){
  Route::get('show_profile', 'API\CustomerController@ShowProfile');
  Route::post('edit_profile', 'API\CustomerController@EditProfile');
  Route::get('show_branch', 'API\BranchController@ShowBranch');
  Route::get('show_menu', 'API\MenuController@ShowMenu');
  Route::get('menu_category', 'API\CategoryController@ShowCategory');
  Route::get('menu_item', 'API\ItemController@ShowMenuItem');
  Route::get('order/history', 'API\OrderController@ShowOrdersHistory');
  Route::post('make_order', 'API\OrderController@MakeOrder');
  Route::get('order', 'API\OrderController@ShowOrder');
  Route::delete('order/delete/{id}', 'API\OrderController@DeleteOrder');
  Route::post('cart/add', 'API\CartController@AddToCart');
  Route::delete('cart/delete/{id}', 'API\CartController@DeleteFromCart');
});

Route::post('login', 'API\CustomerController@login');
Route::post('register', 'API\CustomerController@register');
Route::post('password/forget' , 'API\CustomerController@ForgetPassword');
Route::post('password/reset' , 'API\CustomerController@ResetPassword');
