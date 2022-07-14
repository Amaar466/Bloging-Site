<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
//Route::get('/dashbord',[DashboardController::class,'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route Frontend
Route::get('/',[FrontendController::class,'index']);
Route::get('tutorial/{category_slug}',[FrontendController::class,'viewcategorypost']);
Route::get('tutorial/{category_slug}/{post_slug}',[FrontendController::class,'viewpost']);



Route::prefix('admin')->middleware(['auth','isadmin'])->group(function(){
   Route::get('/dashbord',[DashboardController::class,'index']);
   //Category Route
   Route::get('/category',[CategoryController::class,'index']);
   Route::get('/add-category',[CategoryController::class,'create']);
   Route::post('/store-category',[CategoryController::class,'store']);
   Route::get('/edit-category/{id}',[CategoryController::class,'edit']);
   Route::post('/update-category/{id}',[CategoryController::class,'update']);
   Route::get('/delete-category/{id}',[CategoryController::class,'destroy']);
   //Route Post
   Route::get('/post',[PostController::class,'index']);
   Route::get('/add-post',[PostController::class,'create']);
   Route::post('/store-post',[PostController::class,'store']);
   Route::get('/edit-post/{id}',[PostController::class,'edit']);
   Route::post('/update-post/{id}',[PostController::class,'update']);
   Route::get('/delete-post/{id}',[PostController::class,'destroy']);
   //Route Users
   Route::get('/user',[UserController::class,'index']);
   Route::get('/edit-user/{id}',[UserController::class,'edit']);
   Route::post('/update-user/{id}',[UserController::class,'update']);


});