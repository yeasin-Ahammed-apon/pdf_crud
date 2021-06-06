<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dev;

Route::get('/', [dev::class, 'home']);
Route::get('/download/{id}', [dev::class, 'download']);
Route::get('/add_page', [dev::class, 'add_page']);
Route::post('/add', [dev::class, 'add']);
Route::get('/edit_page/{id}', [dev::class, 'edit_page']);
Route::post('/update', [dev::class, 'update']);
Route::get('/delete/{id}', [dev::class, 'delete']);




