<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});


Route::get('/testimonial', function () {
    return view('pages.testimonial');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/jobs', function () {
    return view('pages.job-list');
})->name('jobs');

Route::get('/job-categories', function () {
    return view('pages.category');
});

Route::get('/jobs/details' , function () {
    return view('pages.job-details');
});


Route::get('/post-job', function () {
    return view('pages.post-job');
});

Route::get('/welcome', function () {
    return view('pages.welcome');
});


