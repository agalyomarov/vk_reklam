<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/access_token', [MainController::class, 'accessToken'])->name('access_token.index');
Route::post('/access_token', [MainController::class, 'accessTokenStore'])->name('access_token.store');
Route::get('/accaunt', [MainController::class, 'accaunt'])->name('account.index');
Route::get('/company', [MainController::class, 'company'])->name('company.index');
Route::post('/company', [MainController::class, 'companyView'])->name('company.store');
