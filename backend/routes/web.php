<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
// require __DIR__.'/auth.php';
Route::get('user/{hash}', UserController::class . '@show')->name('user.show');
