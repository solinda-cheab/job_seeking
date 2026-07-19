<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/jobs', 'jobs.index')->name('jobs.index');
Route::view('/companies', 'companies.index')->name('companies.index');
Route::view('/resources', 'resources.index')->name('resources.index');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::post('/language', [LanguageController::class, 'update'])->name('language.update');

Route::redirect('/dashboard', '/resume-builder')
    ->middleware(['auth', 'verified']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/theme', [ProfileController::class, 'updateTheme'])->name('profile.theme');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/resume-builder', [ResumeController::class, 'edit'])->name('resume.edit');
    Route::patch('/resume-builder', [ResumeController::class, 'update'])->name('resume.update');
});

require __DIR__.'/auth.php';
