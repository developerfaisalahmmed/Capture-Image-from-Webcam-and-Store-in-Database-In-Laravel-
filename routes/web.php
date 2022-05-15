<?php

use App\Http\Controllers\BarcodeControler;
use App\Http\Controllers\WebcamController;
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


Route::controller(WebcamController::class)->group(function () {
    Route::get('/', 'index')->name('webcam');
    Route::get('webcam', 'create')->name('webcam.capture');
    Route::post('webcam', 'store');
});
