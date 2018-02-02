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
    return view('index');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});


// Route::get('/login', function () {
//     return view('login');
// });

/*---------------------------
	Car Page Routers
-----------------------------*/
Route::resource('cars', 'CarController');

Route::get('/test', 'CarController@show')->name('test'); 
Route::get('display', 'CarController@displayCar');

Route::post('create', 'CarController@insertCar');

Route::post('update', 'CarController@updateCar');

Route::post('delete', 'CarController@deleteCar');

Route::get('/xml', 'CarController@xmltohtml');

Route::get('helloworld', 'loginController@show');

/*---------------------------
	Auth Routers
-----------------------------*/
Auth::routes();

/*---------------------------
	Home Page Routers
-----------------------------*/

Route::get('/home', 'HomeController@index')->name('home');

/*---------------------------
	Index Routers
-----------------------------*/

Route::get('/index', 'IndexController@index')->name('index');

/*---------------------------
	About Page Routers
-----------------------------*/

Route::get('/about', 'AboutController@index')->name('about');


/*---------------------------
	Editor Page Routers
-----------------------------*/

Route::get('/editor', 'EditorController@index')->name('editor');

Route::get('xmlfiles', 'EditorController@getXMLfile');

Route::get('xmlcontent', 'EditorController@get_content_xml_file');

Route::get('tveditor', 'EditorController@tvt_editor');

Route::post('save_file', 'EditorController@save_content_file');

Route::post('files_data', 'EditorController@get_files');

Route::get('folders_zip', 'EditorController@folders_zip'); 

Route::post('export_proj', 'EditorController@export_project');

/*-------------------------------
	Mobile Project Page Routers
---------------------------------*/

Route::get('/project', 'ProjectController@index')->name('projects');

Route::get('display_projects', 'ProjectController@display_project');

Route::post('get_file_zip', 'ProjectController@get_files');

Route::post('create_mobile_project', 'ProjectController@create_projects');

Route::get('/xml', 'ProjectController@xml_data');

/*-------------------------------
			Contact Us
---------------------------------*/
Route::post('send_mail', 'ContactController@send_email'); 