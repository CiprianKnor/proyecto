<?php

use App\Http\Controllers\UsersController;

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

Route::resource('/', 'DiscussionsController');

Route::resource('/home', 'DiscussionsController');

Auth::routes(['verify' => true]);

Auth::routes();

Route::resource('discussions', 'DiscussionsController');

Route::resource('discussions/{discussion}/replies', 'RepliesController');

Route::get('users/notifications', [UsersController::class, 'notifications'])->name('users.notifications');
Route::post('discussions/{discussion}/replies/{reply}/mark-as-best-reply', 'DiscussionsController@reply')->name('discussions.best-reply');

