<?php

use App\Http\Controllers\Northwind;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/register','register');

Route::post('/register/form',[RegisterController::class,'register'])->name('reg.form');

Route::view('/login','login')->name('login');

Route::get('/admin/student/list',[RegisterController::class,'list'])->name('admin.stu.list');

Route::get('/admin/customer/list',[Northwind::class,'list'])->name('admin.cuslist');
Route::get('/admin/student/edit/{id}',[RegisterController::class,'edit'])->name('admin.cusedit');

Route::post('/admin/student/update',[RegisterController::class,'update'])->name('admin.cusupdate');

Route::get('/admin/student/delete/{id}',[RegisterController::class,'delete'])->name('admin.cusdelete');

Route::get('/admin/student/deleteall',[RegisterController::class,'deleteall'])->name('admin.cusdeleteall');

Route::get('/admin/student/list/search',[RegisterController::class,'search'])->name('admin.studentSearch');
