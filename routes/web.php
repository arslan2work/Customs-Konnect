<?php

use Illuminate\Support\Facades\Route;
use App\Events\MessageSend;

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
    // broadcast(new MessageSend('mydata'));
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('userList', 'MessageController@user_list')->name('user.list');
Route::get('userMessage/{id}', 'MessageController@user_message')->name('user.message');
Route::post('sendMessage', 'MessageController@send_message')->name('user.message.send');
Route::get('deleteSingleMessage/{id}', 'MessageController@delete_single_message')->name('user.message.delete.single');
Route::get('deleteAllMessage/{id}', 'MessageController@delete_all_message')->name('user.message.all.single');

Route::get('{path}', 'HomeController@index')->where('path', '[A-Za-z]+');
