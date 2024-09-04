<?php


use App\Http\Controllers\Ajax;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Logs;
use App\Http\Controllers\Partners;
use App\Http\Controllers\User;
use App\Http\Controllers\medicine_categories;
use App\Http\Controllers\medicine_types;
use App\Http\Controllers\customers;
use App\Http\Controllers\DB_Controller;
use App\Http\Controllers\expired_products;
use App\Http\Controllers\Logout;
use App\Http\Controllers\products;
use App\Http\Controllers\receiving;
use App\Http\Controllers\sales;

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

//Route::get("/login", [Auth::class, 'index'])->name("login");
//Route::post("/auth-user", [Auth::class, 'auth'])

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('layouts.dashboard');
    })->name("dashboard");

//    Route::resource('notes', );
//    Route::get("/users", [User::class, 'index'])->name("users");
//    Route::get("/users/add", [User::class, 'create'])->name("add-user");
//    Route::post("/users/store", [User::class, 'store'])->name("store-user");
//    Route::get("/users/edit/{id}", [User::class, 'show'])->name("edit-user")->where("id", "[0-9]+");
//    Route::post("/users/update/{id}", [User::class, 'update'])->name("update-user")->where("id", "[0-9]+");
//    Route::get("users/delete/{id}", [User::class, 'destroy'])->name("delete-user")->where("id", '[0-9]+');
});
