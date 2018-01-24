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

// Route::get('/login', function () {
//     return view('login');
// });

Route::resource('cars', 'CarController');

Route::get('/test', 'CarController@show')->name('test'); 
Route::get('display', 'CarController@displayCar');

Route::post('create', 'CarController@insertCar');

Route::post('update', 'CarController@updateCar');

Route::post('delete', 'CarController@deleteCar');

Route::get('/xml', 'CarController@xmltohtml');

Route::get('helloworld', 'loginController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'IndexController@index')->name('index');

Route::get('/about', 'AboutController@index')->name('about');

Route::get('/editor', 'EditorController@index')->name('editor');

Route::get('xmlfiles', 'EditorController@getXMLfile');

Route::get('xmlcontent', 'EditorController@get_content_xml_file');

Route::get('tveditor', 'EditorController@tvt_editor');

Route::post('save_file', 'EditorController@save_content_file');
 