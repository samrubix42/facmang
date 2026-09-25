<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home')->name('home');
Route::livewire('/about', 'pages::about')->name('about');
Route::livewire('/services', 'pages::service')->name('services');
Route::livewire('/services/{slug}', 'pages::service-view')->name('services.show');
Route::livewire('/contact', 'pages::contact')->name('contact');
Route::livewire('/gallery', 'pages::gallery')->name('gallery');
Route::livewire('/careers', 'pages::careers')->name('careers');

Route::livewire('/login', 'pages::auth.login')->middleware('guest')->name('login');

Route::middleware('auth')->group(function () {
    Route::livewire('/admin', 'pages::admin.dashboard')->name('admin.dashboard');
    Route::livewire('/admin/testimonials', 'admin::testimonial')->name('admin.testimonials');
    Route::livewire('/admin/gallery', 'admin::gallery')->name('admin.gallery');
    Route::livewire('/admin/gallery-categories', 'admin::gallery-category')->name('admin.gallery-categories');
    Route::livewire('/admin/service-categories', 'admin::service.category')->name('admin.service-categories');
    Route::livewire('/admin/services', 'admin::service.list')->name('admin.services.index');
    Route::livewire('/admin/services/create', 'admin::service.add')->name('admin.services.create');
    Route::livewire('/admin/services/{service}/edit', 'admin::service.update')->name('admin.services.edit');
    Route::livewire('/admin/jobs', 'admin::job.job-application')->name('admin.jobs.index');
    Route::livewire('/admin/job-applied', 'admin::job.job-applied')->name('admin.job-applied.index');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    })->name('logout');
});
