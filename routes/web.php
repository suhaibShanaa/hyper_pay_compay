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
////    $admin = auth()->user();
////    $role = Role::find(1);
////    $role =auth()->user()->assignRole('admin' , 'moderator' , 'guest');
////    $role->givePermissionTo('Add Customer' ,'Edit Customer' , 'Delete Customer','View Customer');
//////    $role->syncPermissions(['Add Customer' ,'Edit Customer' , 'Delete Customer','View Customer']);
////    dd($admin->can('Add Customer' ,'Edit Customer' , 'Delete Customer','View Customer'));
//////
////////
////////  dd($admin->hasAnyPermission(['Add Customer' ,'Edit Customer' , 'Delete Customer']));
//////
//    $moderator = auth()->user();
//    $role = Role::find(2);
//    $role->givePermissionTo('Edit Customer','View Customer');
////    $role->hasPermissionTo('Add Customer' ,'Edit Customer' , 'Delete Customer','View Customer');

//
//  $guest = auth()->user();
// $role = Role::find(3);
//    $role->givePermissionTo('View Customer');
//});
//For Products
Route::post('product/index','ProductController@store')->middleware('auth');
Route::get('product/create','ProductController@create')->middleware('auth')->name('product.create');
Route::get('product/index','ProductController@index')->middleware('auth')->name('product.index');
Route::post('product/create','ProductController@store')->middleware('auth')->name('product.store');
Route::get('product/{product}' ,'ProductController@show')->middleware('auth');
Route::get('product/{product}/edit' ,'ProductController@edit')->middleware('auth')->name('product.edit');
Route::put('product/{product}' ,'ProductController@update')->middleware('auth')->name('product.update');
Route::delete('product/{product}' ,'ProductController@destroy')->middleware('auth')->name('product.destroy');


//For Pay
Route::get( '/pay' , 'PaymentController@index');
Route::get( '/status' , 'PaymentController@status' );

// For Contact
Route::get('contact/create','ContactFormController@create')->middleware('auth');
Route::post('contact','ContactFormController@store')->name('contact.store')->middleware('auth');
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
// For About
Route::view('about' , 'about')->middleware('test');
////For Customer
Route::get('customers/create','CustomerController@create')->middleware('auth')->name('customer.create');
Route::get('customers/index','CustomerController@index')->middleware('auth')->name('customer.index');
Route::post('customers/create','CustomerController@store')->middleware('auth')->name('customer.store');
Route::get('customers/{customer}' ,'CustomerController@show')->middleware('auth' );//, 'can:view,customer'
Route::get('customers/{customer}/edit' ,'CustomerController@edit')->middleware('auth')->name('customer.edit');
Route::put('customers/{customer}' ,'CustomerController@update')->middleware('auth')->name('customer.update');
Route::delete('customers/{customer}' ,'CustomerController@destroy')->middleware('auth')->name('customer.destroy');
//Route::resource('customers' , 'CustomerController');
/// For Company
Route::get('company/create','CompanyController@create')->middleware('auth')->name('company.create');
Route::get('company/index','CompanyController@index')->middleware('auth')->name('company.index');
Route::post('company/create','CompanyController@store')->middleware('auth')->name('company.store');
Route::get('company/{company}' ,'CompanyController@show')->middleware('auth', 'can:view,company');
Route::get('company/{company}/edit' ,'CompanyController@edit')->middleware('auth')->name('company.edit');
Route::put('company/{company}' ,'CompanyController@update')->middleware('auth')->name('company.update');
Route::delete('company/{company}' ,'CompanyController@destroy')->middleware('auth')->name('company.destroy');
//For Phone
Route::get('phone' , function (){
    $user = factory(\App\User::class)->create();

    $user->phone()->create([
        'phone' => '2222-333-4567',
    ]);

});
//For Post
Route::get('post' , function (){

    $user = factory(\App\User::class)->create();

    $user->post()->create([
       'title'  => 'Title Here',
       'body'   => 'Vdsfvdsvsdfcsd dasfdsdfvs sfsdf ',
    ]);
    dd($user->post);
});

//For RouteAuth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
