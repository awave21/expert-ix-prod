<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('lecturers', function () {
    return Inertia::render('Lecturers');
})->name('lecturers');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//админ панель
Route::get('adminpanel', function () {
    return Inertia::render('AdminDashboard/AdminPanel');
})->middleware(['auth', 'verified'])->name('adminpanel');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
