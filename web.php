<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SystemLogController;

Route::get('/', [SesiController::class,'index']);
Route::post('/', [SesiController::class, 'login'])
    ->middleware('throttle:5,1'); 

Route::get('/admin', [SesiController::class, 'admin']);
Route::get('/operator', [SesiController::class, 'operator']);

Route::get('/landing', [PropertyController::class, 'index']);
Route::post('/landing/store', [GuestController::class, 'store'])->name('guest.store');
Route::get('landing/katalog', [KatalogController::class, 'katalog'])->name('katalog.show');
Route::get('landing/privacypolicy', [PropertyController::class, 'pripol'])->name('privacy.policy');
Route::get('landing/katalog/search', [KatalogController::class, 'search'])->name('katalog.search');
Route::get('/landing/search', [PropertyController::class, 'search'])->name('properties.search');

Route::get('/admin/systemlog', [SystemLogController::class, 'index'])->name('system.log');




