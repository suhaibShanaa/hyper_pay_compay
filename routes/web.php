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


use Spatie\Permission\Models\Role;

Route::view('/','home');

//Route::get('/',function (){
//////    $admin = auth()->user();
//////    $role = Role::find(1);
//////    $role =auth()->user()->assignRole('admin' , 'moderator' , 'guest');
//////    $role->givePermissionTo('Add Customer' ,'Edit Customer' , 'Delete Customer','View Customer');
////////    $role->syncPermissions(['Add Customer' ,'Edit Customer' , 'Delete Customer','View Customer']);
//////    dd($admin->can('Add Customer' ,'Edit Customer' , 'Delete Customer','View Customer'));
////////
//////////
//////////  dd($admin->hasAnyPermission(['Add Customer' ,'Edit Customer' , 'Delete Customer']));
////////
//    $moderator = auth()->user();
//    $role = Role::find(2);
//    $role->givePermissionTo('Edit Customer','View Customer');
////    $role->hasPermissionTo('Add Customer' ,'Edit Customer' , 'Delete Customer','View Customer');
//
////
////  $guest = auth()->user();
//// $role = Role::find(3);
////    $role->givePermissionTo('View Customer');
//});


// For Contact
Route::get('contact/create','ContactFormController@create')->middleware('auth');
Route::post('contact','ContactFormController@store')->name('contact.store')->middleware('auth');


// For About
Route::view('about' , 'about')->middleware('test');


////For Customer
Route::get('customers/create','CustomerController@create')->middleware('auth');
Route::get('customers/index','CustomerController@index')->middleware('auth');
Route::post('customers/create','CustomerController@store')->middleware('auth');
Route::get('customers/{customer}' ,'CustomerController@show')->middleware('auth');

Route::get('customers/{customer}/edit' ,'CustomerController@edit')->middleware('auth');
Route::put('customers/{customer}' ,'CustomerController@update')->middleware('auth');
Route::delete('customers/{customer}' ,'CustomerController@destroy')->middleware('auth');
//Route::resource('customers' , 'CustomerController');


/// For Company
Route::get('company/create','CompanyController@create')->middleware('auth');
Route::get('company/index','CompanyController@index')->middleware('auth');
Route::post('company/create','CompanyController@store')->middleware('auth');
Route::get('company/{company}' ,'CompanyController@show')->middleware('auth');

Route::get('company/{company}/edit' ,'CompanyController@edit')->middleware('auth');
Route::put('company/{company}' ,'CompanyController@update')->middleware('auth');
Route::delete('company/{company}' ,'CompanyController@destroy')->middleware('auth');



Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
