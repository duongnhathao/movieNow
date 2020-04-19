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
Route::post('rating-start','MovieController@rating')->name('rating-start');


//admin
//Route::get('admin/dashboard','admin\AdminController@index');
//Route::get('admin/table','admin\AdminController@table');
//Route::get('admin/vote','admin\AdminController@vote');
//Route::get('admin/member','admin\AdminController@member');
//Route::get('admin/add_member','admin\AdminController@add_member');
//Route::get('/admin/print', 'admin\AdminController@print');

Route::group(['prefix'=>'admin'], function(){
});

//Add Successfull
Route::post('add-chapter-successfull','admin\AdminController@addChapterSuccessfull');
Route::post('update-chapter-successfull','admin\AdminController@updateChapterSuccessfull');

//add Chapter
//Route::post('add-chapter', 'admin\AdminController@addChapter');

//edit movie by ID
Route::post('edit-movie','admin\AdminController@showMovieByID');
//edit users by ID
Route::post('edit-users', 'admin\AdminController@showUserByID');
Route::post('editMovieDetails', 'admin\AdminController@showDetailsMovie');
Route::post('uploadFile','admin\AdminController@replaceFilm')->name('replaceFilm');
Route::post('deleteChapter','admin\AdminController@deleteChapter')->name('deleteChapter');
Route::post('tmp','admin\AdminController@tmp');


//authentication
//Route::namespace('Auth')->group(function(){
//
//    //Login Routes
////    Route::get('/login','LoginController@showLoginForm')->name('login');
//
//    Route::post('/login','LoginController@login');
//    Route::post('/logout','LoginController@logout')->name('logout');
//
//    //Forgot Password Routes
//    Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
//    Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//
//    //Reset Password Routes
//    Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
//    Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
//
//});

//admin route
Auth::routes();
Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login','Auth\LoginController@login');
    Route::get('/logout','LoginController@logout')->name('logout');
    Route::get('/password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/print', 'AdminController@print');
    Route::get('/dashboard','AdminController@index')->name('dashboard');
    Route::get('/table','AdminController@table');
    Route::get('/vote','AdminController@vote');
    Route::get('/member','AdminController@member');
    Route::get('/add_member','AdminController@add_member');
    Route::post('/add-chapter', 'AdminController@addChapter');
    Route::get('/update-chapter/{id}/{num}', 'AdminController@updateChapter');

    Route::get('/add_movie','AdminController@add_movie');
    Route::get('/delete_chapter/{id}/{num}','AdminController@deleteChapter');
    Route::post('add_movie', 'AdminController@postMovie');

});

