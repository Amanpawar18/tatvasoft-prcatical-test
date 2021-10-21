<?php

use App\Http\Controllers\EventController;
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

Route::resource('event', EventController::class);
Route::get('event-ajax', [EventController::class, 'ajaxData'])->name('event.ajaxData');

Route::get('/', function () {
    return view('welcome');
});
