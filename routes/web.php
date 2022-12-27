<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Models\Listings;

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


//Single Listings
Route::get('/listings/{listing}', [ListingController::class, 'show']);

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
