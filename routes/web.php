<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->name("welcome");



// Route::get('/backoffice', function () {
//     return view('backoffice');
// })->middleware(["auth","verification"])->name("backoffice");

Route::get("/backoffice", [BackofficeController::class, "index"])->middleware(["auth","verification"])->name("backoffice");


Route::resource("/role", RoleController::class);
Route::resource("/user", UserController::class);
Route::resource("/article", ArticleController::class)->middleware(["auth","verification"]);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
