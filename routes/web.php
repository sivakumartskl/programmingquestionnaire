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
	return view('mainhome');
});
Route::get('/login', function () {
	return view('login');
})->name('login');
Route::get('/register', function () {
	return view('register');
});
Route::post('/registeruser', [
	'uses' => 'UsersController@registerUser',
	'as' => 'registeruser'
]);
Route::post('/loginuser', [
	'uses' => 'UsersController@authenticateUser',
	'as' => 'loginuser'
]);
Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('/home', 'CreatesController@home')->name('home');
	Route::get('/create', function () {
		return view('create');
	});
	Route::post('/insert', 'CreatesController@insert');
	Route::get('/update/{id}', 'CreatesController@update');
	Route::post('/edit/{id}', 'CreatesController@edit');
	Route::get('/read/{id}', 'CreatesController@read');
	Route::get('/delete/{id}', 'CreatesController@delete');
	Route::get('/deleteconfirm/{id}', 'CreatesController@deleteconfirm');
	Route::get('/logout', [
		'uses' => 'UsersController@logoutUser',
		'as' => 'logout'
	]);
	Route::post('/useranswer', 'CommentsController@userAnswer');
	Route::post('/userreply', 'RepliesController@userReply');
	Route::post('/getclarification', 'ClarificationsController@saveClarification');
});
