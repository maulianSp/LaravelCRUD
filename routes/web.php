<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/pertanyaan', 'QuestionController@index')->name('question');
Route::get('/pertanyaan/create', 'QuestionController@create');
Route::post('/pertanyaan', 'QuestionController@store');
Route::get('/pertanyaan/{id}', 'QuestionController@show')->name('show');
Route::get('/pertanyaan/{id}/edit', 'QuestionController@edit');
Route::put('/pertanyaan/{id}', 'QuestionController@update');
Route::delete('/pertanyaan/{id}', 'QuestionController@destroy');

//Route::get('/jawaban/{id}', 'AnswerController@index')->name('jawaban');
Route::post('/jawaban', 'AnswerController@store');