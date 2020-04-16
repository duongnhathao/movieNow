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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','HomePageController@index');

Route::get('/homepage','HomePageController@index');
Route::get('/movie/','HomePageController@index');
Route::get('/movie/watch','HomePageController@index');
Route::get('/about','HomePageController@about');

Route::get('/movie/{mov_title}','MovieController@getMovie');

Route::get('movie/watch/{mov_title}/{chapter_nums}','MovieController@getChapter');

Route::get('/review','MovieController@getReview');
Route::get('/genres/{gen_title}','MovieController@getByGenTitle');


//admin 
Route::get('admin/dashboard','admin\AdminController@index');
Route::get('admin/table','admin\AdminController@table');
Route::get('admin/vote','admin\AdminController@vote');
Route::get('admin/member','admin\AdminController@member');
Route::get('admin/add_member','admin\AdminController@add_member');


Route::group(['prefix'=>'admin'], function(){
    Route::get('add_movie','admin\AdminController@add_movie');
    //add movie
    Route::post('add_movie', 'admin\AdminController@postMovie');
});

//Add Successfull
Route::post('add-chapter-successfull','admin\AdminController@addChapterSuccessfull');
//add Chapter
Route::post('add-chapter', 'admin\AdminController@addChapter');

//edit movie by ID
Route::post('edit-movie','admin\AdminController@showMovieByID');
//edit users by ID
Route::post('edit-users', 'admin\AdminController@showUserByID');
Route::get('editMovieDetails', 'admin\AdminController@showDetailsMovie');
Route::post('uploadFile','admin\AdminController@replaceFilm')->name('replaceFilm');
Route::post('deleteChapter','admin\AdminController@deleteChapter')->name('deleteChapter');









Route::get('/abc','\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
//Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm');
//Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
//Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');
//
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
//Route::post('/login/writer', 'Auth\LoginController@writerLogin');
//Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
//Route::post('/register/writer', 'Auth\RegisterController@createWriter');
//
//Route::view('/home', 'home')->middleware('auth');
//Route::view('/admin', 'admin');
//Route::view('/writer', 'writer');
