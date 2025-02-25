<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PostDetail;

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Home Page
Route::get('/', function () {
  return view('home');
})->name('home');

// About Us Page
Route::get('/about-us', function () {
  return view('about-us');
})->name('about-us');

// Contact Us Page
Route::get('contact-us', function () {
  return view('contact-us');
})->name('contact-us');

Route::get('/post/{id}', PostDetail::class)->name('post.detail');