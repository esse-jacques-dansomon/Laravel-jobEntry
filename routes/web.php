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

Route::get('/', 'App\Http\Controllers\ApplicantController@index')->name('home');
Route::get('/jobs', 'App\Http\Controllers\JobController@index')->name('jobs');
Route::get('/jobs/{job}', 'App\Http\Controllers\JobController@show')->name('job');
Route::get('/jobs?active_type={type}', 'App\Http\Controllers\JobController@index')->name('jobs-active');
Route::get('/job-categories', 'App\Http\Controllers\JobController@categories')->name('job-categories');
Route::get('/jobs-categories/{category}', 'App\Http\Controllers\JobController@category')->name('job-category');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');



Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');



Route::get('/post-job', function () {
    return view('pages.post-job');
});
