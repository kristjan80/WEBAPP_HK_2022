<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionManager;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
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
Route::get('/', [NewsController::class, 'getNews']);

// News adding routes
Route::get('/addnews', [NewsController::class, 'create']);
Route::post('/addnews', [NewsController::class, 'addnews']);

// User creation and authentication routes

Route::get('/register', [RegistrationController::class, 'create']);
Route::post('/register',  [RegistrationController::class, 'dataToDatabase']);

Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [SessionManager::class, 'endSession']);

// Image upload routes
Route::get('/uploadimage', [ImageController::class, 'create']);
Route::post('/uploadimage', [ImageController::class, 'uploadImage']);

Route::get('/gallery', [GalleryController::class, 'create']);

// Profile editing routes
Route::get('/changeuser', [ProfileController::class, 'createEditProfile']);
Route::post('/changeuser', [ProfileController::class, 'editProfile']);

Route::get('/changepassword', [ProfileController::class, 'createEditPassword']);
Route::post('/changepassword', [ProfileController::class, 'editPassword']);