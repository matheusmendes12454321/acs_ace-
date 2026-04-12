<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('auth.login'); });
Route::get('/login', function () { return view('auth.login'); });
Route::get('/app', function () { return view('layouts.app'); });
