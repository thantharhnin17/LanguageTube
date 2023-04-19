<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContactController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//////////Home////////////
Route::get('/', [HomeController::class, 'index']);

//////////Course////////////
Route::resource('courses', CourseController::class);

//////////Course////////////
Route::resource('about', AboutController::class);

//////////Course////////////
Route::resource('contact', ContactController::class);


//////////Login////////////
Route::get('/login', function () {
        return view('login');
    });


