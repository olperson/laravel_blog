<?php

namespace App\Http\Controllers;

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
Route::any('/admin/login', [Admin\LoginController::class, 'login']);
Route::get('/verifycode', [Admin\LoginController::class, 'captcha']);
Route::get('/', function () {
	return view('welcome');
});
Route::match(['get', 'post'], '/crypt', [Admin\LoginController::class, 'crypt1']);
//后台登录中间件判断路由
Route::get('/test', [Admin\LoginController::class, 'test']);


Route::group(['middleware' => ['web', 'login'], 'prefix' => 'admin'], function () {
	Route::get('/index', [Admin\IndexController::class, 'index']);
	Route::get('/info', [Admin\IndexController::class, 'info']);
	Route::get('/logout', [Admin\LoginController::class, 'logout']);
	Route::match(['get', 'post'], '/passwdreset', [Admin\LoginController::class, 'passwdreset']);
	Route::any('/content/changeorder', [Admin\CreateController::class, 'order']);
	Route::resource('/contents/index', Admin\CreateController::class);
	Route::resource('/article/index', Admin\ArticleController::class);
});
Route::get('/imgs', [ImagesController::class, 'imgs']);