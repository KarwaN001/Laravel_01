<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test');
});

Route::get('/registration-success', function () {
    return view('registration-success');
});
