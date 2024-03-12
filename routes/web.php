<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\RegistrationController;
use App\Models\Students;
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

Route::get('/students/create',[StudentsController::class, 'create'])->name('student.create');
Route::get('/students/view',[StudentsController::class, 'view'])->name('student.view');
Route::get('/students/delete/{id}',[StudentsController::class, 'delete'])->name('student.delete');
Route::get('/students/edit/{id}',[StudentsController::class, 'edit'])->name('student.edit');
Route::post('/students/update/{id}',[StudentsController::class, 'update'])->name('student.update');
Route::post('/students',[StudentsController::class, 'store']);
