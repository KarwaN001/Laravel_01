<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('test');
});
//test test test
Route::post('/test', [TestController::class, 'test']);

Route::get('/registration-success', function () {
    return view('registration-success');
});
