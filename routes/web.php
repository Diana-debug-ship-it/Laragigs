<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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

// Common Resource Routes:
// index - show all listings
// show - show single listing
// create - show form to create new listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - delete listing

// All listings
Route::get('/', [\App\Http\Controllers\ListingController::class, 'index']);

// Show Create form
Route::get('/listings/create', [ListingController::class, 'create'])
    ->middleware('auth');

// Store listing data
Route::post('/listings/', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])
    ->middleware('auth');

// Update
Route::put('/listings/{listing}', [ListingController::class, 'update'])
    ->middleware('auth');

// Delete
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])
    ->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])
->middleware('auth');

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register|Create Form
Route::get('/register', [UserController::class, 'create'])
    ->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])
    ->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')
    ->middleware('guest');;

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

