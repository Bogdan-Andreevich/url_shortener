<?php

use App\Http\Controllers\GitHubController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortener;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Redirect to Github
Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);
//Redirect to Github
Route::get('auth/google', [GoogleController::class, 'googleRedirect']);
Route::get('auth/google/callback', [GoogleController::class, 'googleCallback']);
//Home page
Route::post('/dashboard', [UrlShortener::class, 'getUrl'])->name('CreateShortUrl');
Route::get('/dashboard/{key}', [UrlShortener::class, 'getShortUrl'])->name('ShortUrl');


