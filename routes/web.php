<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;


use App\Http\Controllers\TestController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\UriController;
use App\Http\Controllers\UserRegistration;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\StudInsertController;

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

//for RoleMiddleware
// Route::get('role',[
//     'middleware' => 'Role:editor',
//     'uses' => 'TestController@index',
//  ]);//v.5
Route::get('role', [TestController::class, 'index'])->middleware('Role:editor');//v.10

// Route::get('/usercontroller/path',[
//     'middleware' => 'First',
//     'uses' => 'UserController@showPath']);//Laravel v.5
Route::get('usercontroller/path',[UserController::class,'showPath'])->middleware('First');

// Route::resource('my','MyController');//v.5
Route::resource('my',MyController::class);//
Route::get('/foo/bar' , [UriController::class, 'index']);
// Route::get('/cookie/get','CookieController@getCookie');
Route::get('/register',function(){
    return view('register');
});
Route::post('/user/register',[UserRegistration::class, 'postRegister'])->defaults('array',[1]);
Route::get('/cookie/get',[CookieController::class, 'getCookie']);

// Route::get('/cookie/set','CookieController@setCookie'); //Laravel v.5.2
Route::get('/cookie/set',[CookieController::class, 'setCookie']);//Laravel v.10.18
Route::get('json',function(){
    return response()->json(['name'=>'Virat Gandhi', 'state'=>'Gujarat']);
});
Route::get('/test',function(){
    return view('register1');
});
Route::get('/test2',['as'=>'testing',function(){
    return view('register2');
}]);
Route::get('redirect1', function(){
    return redirect()->route('testing');
});

//Redirections Test
Route::get('rr', [RedirectController::class, 'index']);
Route::get('redirectioncontroller',function(){
    return redirect()->action ([RedirectController::class,'index']);
});
Route::get('insert',[StudInsertController::class,'insertform']);
Route::post('create',[StudInsertController::class,'insert']);
