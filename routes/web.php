<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\HomeController;


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
});


Route::get('home',[HomeController::class,'index'])->name('home');

Auth::routes();


Route::get('lang/home', [\App\Http\Controllers\LangController::class, 'test']);
Route::get('lang/change', [\App\Http\Controllers\LangController::class, 'change'])->name('changeLang');
Route::get('lang/language', [\App\Http\Controllers\LangController::class, 'language'])->name('language');





Route::get('user.show',[\App\Http\Controllers\admin\UserController::class,'show'])->name('user.show');
Route::get('user/status',[\App\Http\Controllers\admin\UserController::class,'status'])->name('user/status');
Route::get('user.create',[\App\Http\Controllers\admin\UserController::class,'create'])->name('user.create');
Route::post('user.store',[\App\Http\Controllers\admin\UserController::class,'store'])->name('user.store');
Route::get('user/edit/{id}',[\App\Http\Controllers\admin\UserController::class,'edit'])->name('user/edit');
Route::post('user.update/{id}',[\App\Http\Controllers\admin\UserController::class,'update'])->name('user.update');
Route::get('user.destroy/{id}',[\App\Http\Controllers\admin\UserController::class,'destroy'])->name('user.destroy');

Route::get('cache_clear',[HomeController::class,'cache_clear'])->name('cache_clear');
Route::get('profile',[HomeController::class,'profile'])->name('profile');
Route::get('password',[HomeController::class,'password'])->name('password');
Route::post('user_profile.update/{id}',[HomeController::class,'profile_update'])->name('user_profile.update');

Route::get('category/create',[\App\Http\Controllers\admin\CategoryController::class,'create'])->name('category/create');
Route::post('category.store',[\App\Http\Controllers\admin\CategoryController::class,'store'])->name('category.store');
Route::get('category.show',[\App\Http\Controllers\admin\CategoryController::class,'show'])->name('category.show');
Route::get('category.status',[\App\Http\Controllers\admin\CategoryController::class,'status'])->name('category.status');
Route::get('category/edit/{id}',[\App\Http\Controllers\admin\CategoryController::class,'edit'])->name('category/edit');
Route::post('category/update/{id}',[\App\Http\Controllers\admin\CategoryController::class,'update'])->name('category/update');
Route::get('category/destroy/{id}',[\App\Http\Controllers\admin\CategoryController::class,'destroy'])->name('category/destroy');

Route::get('account/create',[\App\Http\Controllers\admin\AccountController::class,'create'])->name('account/create');
Route::post('account/store',[\App\Http\Controllers\admin\AccountController::class,'store'])->name('account/store');
Route::get('account/show',[\App\Http\Controllers\admin\AccountController::class,'show'])->name('account/show');
Route::get('account/status',[\App\Http\Controllers\admin\AccountController::class,'status'])->name('account/status');
Route::get('account/edit/{id}',[\App\Http\Controllers\admin\AccountController::class,'edit'])->name('account/edit');
Route::post('account/update/{id}',[\App\Http\Controllers\admin\AccountController::class,'update'])->name('account/update');
Route::get('account/destroy/{id}',[\App\Http\Controllers\admin\AccountController::class,'destroy'])->name('account/destroy');

Route::get('income/create',[\App\Http\Controllers\admin\IncomeController::class,'create'])->name('income/create');
Route::post('income/store',[\App\Http\Controllers\admin\IncomeController::class,'store'])->name('income/store');
Route::get('income/show',[\App\Http\Controllers\admin\IncomeController::class,'show'])->name('income/show');
Route::get('income/edit/{id}',[\App\Http\Controllers\admin\IncomeController::class,'edit'])->name('income/edit');
Route::post('income/update/{id}',[\App\Http\Controllers\admin\IncomeController::class,'update'])->name('income/update');
Route::get('income/destroy/{id}',[\App\Http\Controllers\admin\IncomeController::class,'destroy'])->name('income/destroy');

Route::get('expenses/create',[\App\Http\Controllers\admin\ExpensesController::class,'create'])->name('expenses/create');
Route::get('expenses/show',[\App\Http\Controllers\admin\ExpensesController::class,'show'])->name('expenses/show');
Route::post('expenses/store',[\App\Http\Controllers\admin\ExpensesController::class,'store'])->name('expenses/store');
Route::get('expenses/edit/{id}',[\App\Http\Controllers\admin\ExpensesController::class,'edit'])->name('expenses/edit');
Route::post('expenses/update/{id}',[\App\Http\Controllers\admin\ExpensesController::class,'update'])->name('expenses/update');
Route::get('expenses/destroy/{id}',[\App\Http\Controllers\admin\ExpensesController::class,'destroy'])->name('expenses/destroy');

Route::get('transfer/create',[\App\Http\Controllers\admin\TransferController::class,'create'])->name('transfer/create');
Route::get('transfer/edit/{id}',[\App\Http\Controllers\admin\TransferController::class,'edit'])->name('transfer/edit');
Route::get('transfer/show',[\App\Http\Controllers\admin\TransferController::class,'show'])->name('transfer/show');
Route::post('transfer/store',[\App\Http\Controllers\admin\TransferController::class,'store'])->name('transfer/store');
Route::post('transfer/update/{id}',[\App\Http\Controllers\admin\TransferController::class,'update'])->name('transfer/update');
Route::get('transfer/destroy/{id}',[\App\Http\Controllers\admin\TransferController::class,'destroy'])->name('transfer/destroy');

Route::get('report',[\App\Http\Controllers\admin\ReportController::class,'show'])->name('report');
