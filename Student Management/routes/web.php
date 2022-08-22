<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;

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

Route::get('/', 'App\Http\Controllers\StudentController@index');



Route::get('/dashboard', [StudentController::class, 'show']);

Route::post('/dashboard', [StudentController::class, 'show']);


Route::get('/studentRegister', 'App\Http\Controllers\StudentController@studentPortal');

// Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/student_marking', [StudentController::class, 'student_marking_page']);

Route::post('/register_student', [StudentController::class, 'store_new_student_data']);

Route::post('/update_student_mark', [StudentController::class, 'update_student_mark']);


Route::get('/student_report', [ReportController::class, 'show']);

Route::delete('/delete_student/{id}', [ReportController::class, 'destroy']);


Route::get('/student_database', [ReportController::class, 'show_student_data']);


Route::post('/update_student', [ReportController::class, 'update_student']);
