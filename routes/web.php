<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/home', function () {
    return redirect()->route('home');
});
Route::get('/jobs', 'App\Http\Controllers\JobController@index')->name('jobs');
Route::get('/jobs/{job}', 'App\Http\Controllers\JobController@show')->name('job');
Route::get('/jobs?active_type={type}', 'App\Http\Controllers\JobController@index')->name('jobs-active');
Route::get('/post-job', 'App\Http\Controllers\JobController@create')->name('post-job');
Route::post('/post-job', 'App\Http\Controllers\JobController@store')->name('post-job');
Route::get('/apply/{job}', 'App\Http\Controllers\JobController@apply')->name('apply');
Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('categories');
Route::get('/categories/{category}', 'App\Http\Controllers\CategoryController@show')->name('category');
Route::get('/about', function () {
    return inertia('other/About');
})->name('about');



Route::get('/contact', function () {
    return inertia('other/Contact');
})->name('contact');


Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::get('/register', 'App\Http\Controllers\ApplicantController@create')->name('register');
Route::post('/register', 'App\Http\Controllers\ApplicantController@store')->name('register');
Route::get('/enterprise', 'App\Http\Controllers\EnterpriseController@create')->name('enterprise');
Route::post('/enterprise', 'App\Http\Controllers\EnterpriseController@store')->name('enterprise');


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/dashboard/{job}', [App\Http\Controllers\HomeController::class, 'show'])->name('dashboard-job');
Route::get('/dashboard/{job}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('dashboard-job-edit');
Route::put('/dashboard/{job}', [App\Http\Controllers\HomeController::class, 'update'])->name('dashboard-job-update');
Route::delete('/dashboard/{job}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('dashboard-job-delete');
Route::get('/dashboard/{job}/applicants', [App\Http\Controllers\HomeController::class, 'applicants'])->name('dashboard-job-applicants');
Route::get('/dashboard/{job}/applicants/{applicant}', [App\Http\Controllers\HomeController::class, 'applicant'])->name('dashboard-job-applicant');

