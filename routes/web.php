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

Route::get('/validate', function () {
    return view('validate');
});

#Auth::routes();

#Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/registrar', 'InstagramRegisterController@index');

Route::get('/colectivos', 'HomeController@colectivos');

Route::get('/colectivos/nuevo', 'HomeController@colectivos_nuevo');
Route::get('/colectivos/add', 'HomeController@colectivos_add');

Route::get('search/autocomplete', 'SearchController@autocomplete');


Route::get('/salir', function(){

Sentry::logout();

return Redirect::to('/');
    });

Route::get('/facebook', 'HomeController@facebook');
Route::get('/carnet', 'HomeController@carnet');
Route::get('/twitter', 'HomeController@twitter');
Route::get('/google', 'HomeController@google');
Route::get('/instagram', 'HomeController@instagram');

Route::get('user/activation/{token}', 'Auth\RegisterController@activateUser')->name('user.activate');

Route::get('auth/twitter', 'HomeController@redirectToProvider');
Route::get('auth/twitter/callback', 'HomeController@handleProviderCallback');

Route::get('auth/facebook', 'HomeController@redirectToProviderFacebook');
Route::get('auth/facebook/callback', 'HomeController@handleProviderCallbackFacebook');

Route::get('auth/google', 'HomeController@redirectToProviderGoogle');
Route::get('auth/google/callback', 'HomeController@handleProviderCallbackGoogle');

Route::get('auth/instagram', 'InstagramRegisterController@redirectToProviderInstagram');
Route::get('auth/instagram/callback', 'InstagramRegisterController@handleProviderCallbackInstagram');

Route::get('instagram/login', 'InstagramRegisterController@redirectToProviderInstagramLogin');
