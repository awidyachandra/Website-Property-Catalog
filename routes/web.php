<?php

use App\Http\Controllers\contentController;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\detailcontroller;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/manajemen', [UserController::class, 'index'])->name('manajemen.index');
Route::post('/manajemen', [UserController::class, 'store'])->name('manajemen.store');
Route::get('/manajemen/search', [UserController::class, 'search']);
Route::get('/manajemen/{username}/edit', [UserController::class, 'edit'])->name('manajemen.edit');
Route::put('/manajemen/{username}/update', [UserController::class, 'update'])->name('manajemen.update');
Route::get('manajemen/guest-book', [GuestBookController::class, 'index'])->name('guest-book');
Route::get('content/guest-book', [GuestBookController::class, 'index2'])->name('guest-book2');
Route::get('/content', [contentController::class, 'index'])->name('content.index');
Route::post('/content/addcon', [contentController::class, 'store'])->name('content.store');
Route::get('/content/add', [contentController::class, 'create'])->name('content.add');
Route::get('/content/{id}/edit', [contentController::class, 'edit'])->name('content.edit');
Route::put('/content/{id}/update', [contentController::class, 'update'])->name('content.update');
Route::get('/content/search', [contentController::class, 'search']);
Route::delete('/image/{imageId}/delete', [contentController::class, 'deleteImage'])->name('image.delete');
Route::get('katalog/detail/{id}', [detailcontroller::class, 'show'])->name('properties.show');
Route::get('/katalog', [detailcontroller::class, 'index'])->name('katalog.index');
Route::get('/katalog/search', [detailcontroller::class, 'search'])->name('katalog.search');
Route::get('/dashboard', [dashboardcontroller::class, 'index'])->name('dashboard.index');