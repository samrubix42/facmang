<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home')->name('home');
Route::livewire('/about', 'pages::about')->name('about');
Route::livewire('/services', 'pages::service')->name('services');
Route::livewire('/services/{slug}', 'pages::service-view')->name('services.show');
Route::livewire('/contact', 'pages::contact')->name('contact');
