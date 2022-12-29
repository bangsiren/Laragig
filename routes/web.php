<?php

use App\Models\Listing;
use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

//AlL Listings 
Route::get('/', [ListingController::class, 'index']);

// Show Create Form 
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listings Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Show Edit Form 
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update  Listings
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete  Listings
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Single Listings
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/Create Form 
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Show Register/Create Form 
Route::post('/users', [UserController::class, 'store']);

// Logout Users
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');;

//  Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
// Route::get('/hello', function () {
//     return response('<h1>Hello World</h1>', 200)
//          ->header('Content-Type', 'text/plains')
//          ->header('foo', 'bar');
// });
// Route::get('/posts/{id}', function($id){
//     ddd($id);
//    return response('posts '.$id);
// })->where('id', '[0-10]+');
// Route::get('/search', function(Request $request){
//     return $request->name. ' '. $request->city;
// });
