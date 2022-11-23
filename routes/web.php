<?php
use App\Http\Controllers\HomeController;
use App\User;

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
Route::get('list', function(){
    $data = User::all();
    return view('index', compact('data'));
});


Route::get('/', function () {
    echo '<h1>Welcome e4m </h1>';
});


