<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LanguageController;

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
    return view('main.home');
});

//////////Home////////////
// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/', [HomeController::class, 'index']);

//////////Course////////////
Route::resource('courses', CourseController::class);

//////////Course////////////
Route::resource('about', AboutController::class);

//////////Course////////////
Route::resource('contact', ContactController::class);


//////////Login////////////
// Route::get('/login', function () {
//         return view('login');
//     });


//////////Backend/////////////

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //////////Language////////////
    Route::resource('language', LanguageController::class);
    // Route::get('language/create',[LanguageController::class, 'create']);
    // Route::post('languages/store',[LanguageController::class, 'create'])->name('language.store');

    //////////Level////////////
    Route::resource('Level', LevelController::class);


     /////////Course////////////
    Route::resource('course', CourseController::class);
    Route::get('/get-levels/{id}',[CourseController::class, 'getLevels']);


    //////////Batch////////////
    Route::resource('batch', BatchController::class);

});

//////////Backend/////////////


