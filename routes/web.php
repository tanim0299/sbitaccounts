<?php

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
    return view('auth.login');
});

//tanim

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// main menu
Route::get('/addMainMenu', [App\Http\Controllers\mainMenuController::class, 'index']);
Route::post('/mainMenuStore', [App\Http\Controllers\mainMenuController::class, 'store']);
Route::get('/viewMainMenu', [App\Http\Controllers\mainMenuController::class, 'view']);
Route::get('/editMainMenu/{id}', [App\Http\Controllers\mainMenuController::class, 'edit']);
Route::post('/mainMenuUpdate/{id}', [App\Http\Controllers\mainMenuController::class, 'update']);
Route::get('/deleteMainMenu/{id}', [App\Http\Controllers\mainMenuController::class, 'delete']);

// sub_menu
Route::get('/addSubMenu', [App\Http\Controllers\subMenuController::class, 'index']);
Route::post('/subMenuStore', [App\Http\Controllers\subMenuController::class, 'store']);
Route::get('/viewSubMenu', [App\Http\Controllers\subMenuController::class, 'view']);
Route::get('/editSubMenu/{id}', [App\Http\Controllers\subMenuController::class, 'edit']);
Route::post('/subMenuUpdate/{id}', [App\Http\Controllers\subMenuController::class, 'update']);
Route::get('/deleteSubMenu/{id}', [App\Http\Controllers\subMenuController::class, 'delete']);

// admin info
Route::get('/createAdmin',[App\Http\Controllers\adminController::class, 'index']);
Route::post('/registerAdmin',[App\Http\Controllers\adminController::class, 'store']);
Route::get('/viewAdmin',[App\Http\Controllers\adminController::class, 'view']);
Route::get('/editAdmin/{id}',[App\Http\Controllers\adminController::class, 'edit']);
Route::post('/updateAdmin/{id}',[App\Http\Controllers\adminController::class, 'update']);
Route::get('/deleteAdmin/{id}',[App\Http\Controllers\adminController::class, 'delete']);


//course information
Route::get('/addCourse',[App\Http\Controllers\courseController::class, 'index']);
Route::post('/courseStore',[App\Http\Controllers\courseController::class, 'store']);
Route::get('/viewCourse',[App\Http\Controllers\courseController::class, 'view']);
Route::get('/editCourse/{id}',[App\Http\Controllers\courseController::class, 'edit']);
Route::post('/courseUpdate/{id}',[App\Http\Controllers\courseController::class, 'update']);
Route::get('/courseDelete/{id}',[App\Http\Controllers\courseController::class, 'delete']);


// stuent route
Route::get('/addStudent',[App\Http\Controllers\studentController::class, 'index']);
Route::post('/getCourseFee',[App\Http\Controllers\studentController::class, 'getCourseFee']);
Route::post('/subCourseFee',[App\Http\Controllers\studentController::class, 'subCourseFee']);
Route::post('/studentStore',[App\Http\Controllers\studentController::class, 'store']);
