<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\TesztFeladatController;

Route::get('/random-feladat', 'TesztFeladatController@randomfeladat');
Route::get('/megoldas-ellenorzes', 'TesztFeladatController@megoldasellenorzes');


Route::get('/', function () {
    return view('welcome');
});


