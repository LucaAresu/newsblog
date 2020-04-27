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

Route::get('/','StaffController@index')->name('staff_index');

Route::get('sezioni','SectionController@create')->name('staff_create_section');
Route::post('sezioni','SectionController@store');

Route::get('promote','StaffController@promoteView')->name('staff_promote');
Route::post('promote','StaffController@promoteSearch');
Route::patch('promote', 'StaffController@promote');
