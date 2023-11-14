<?php

use App\Http\Controllers\CommunityLinkUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

    return view('welcome');
});

Auth::routes(['verify' => 'true']);

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

//rutas A5
Route::get('community', [App\Http\Controllers\CommunityLinkController::class, 'index']);

Route::post('community', [App\Http\Controllers\CommunityLinkController::class, 'store'])->middleware(['auth', 'verified']);

// A11
Route::get('community/{channel:slug}', [App\Http\Controllers\CommunityLinkController::class, 'index']);

Route::post('votes/{link}',[App\Http\Controllers\CommunityLinkUserController::class, 'store'])->middleware(['auth', 'verified']);

//A17
Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->middleware(['auth', 'verified']);

Route::post('profile/store',[App\Http\Controllers\ProfileController::class,'store'])->middleware(['auth', 'verified']);

//A18
Route::resource('users', 'App\Http\Controllers\UserController')->middleware(['auth', 'verified','can:dashBoard,App\Models\User']);