<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{path?}', function () {
    $buildPath = base_path('frontend/build/index.html');
    if (!file_exists($buildPath)) {
        abort(404);
    }
    return file_get_contents($buildPath);
})->where('path', '.*');