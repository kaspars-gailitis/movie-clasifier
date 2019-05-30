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

Auth::routes();

Route::get('/test', 'TensorflowModel\ModelController@evaluateReview');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/movies/list/{pageNumber?}', 'MovieController@index')->name('movies.list');
Route::get('/movie/{id}', 'MovieController@show');

Route::get('/reviews/list/{pageNumber?}', 'ReviewController@showList')->name('reviews.list');
Route::get('/reviews/show/{id}', 'ReviewController@showReview');
Route::get('/reviews/edit/{id?}', 'ReviewController@editReview')->middleware('auth')->name('reviews.edit');
Route::delete('/reviews/delete', 'ReviewController@deleteReview')->middleware('auth')->name('reviews.delete');
Route::post('/review/store', 'ReviewController@store')->middleware('auth');

Route::post('/evaluate', 'EvaluationController@evaluate')->middleware('auth');

Route::get('/admin', 'AdminController@index')->middleware('auth', 'admin')->name('admin.dashboard');
Route::post('/admin/reviews/update', 'AdminController@updateReviewReting')->middleware('auth', 'admin')->name('admin.reviews');
Route::get('/admin/users', 'AdminController@listUsers')->middleware('auth', 'admin')->name('admin.users');
Route::get('/admin/algorithm', 'AdminController@algorithPerformance')->middleware('auth', 'admin')->name('admin.algorithm');

Route::get('/reviews/my/list', 'ReviewController@listMyReviews')->middleware('auth')->name('reviews.user');

Route::get('/search', 'MovieController@search');

Route::get('/update/rating', 'ReviewController@updateBulk');

Route::get('/searchLanding', function () {
    return view('search_movie');
})->name('search');
//Route::get('/search','SearchController@search');