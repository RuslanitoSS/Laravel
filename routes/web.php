<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

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

//Authenticate
Route::get('/auth/signup', [AuthController::class, 'signup']);
Route::post('/auth/registr', [AuthController::class, 'registr']);
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/authenticate', [AuthController::class, 'authenticate']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

//Article
Route::resource('article', ArticleController::class)->middleware('auth:sanctum');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show')->middleware('checkclick');

//Comment
Route::controller(CommentController::class)->prefix('/comment')->middleware('auth:sanctum')->group(function(){
    Route::post('','store')->name('comment.store');
    Route::get('/{id}/edit', 'edit')->name('comment.edit');
    Route::post('/{comment}/update', 'update')->name('comment.update');
    Route::get('/{comment}/destroy', 'destroy')->name('comment.destroy');
    Route::get('/index','index')->name('comment.index');
    Route::get('/{comment}/accept', 'accept')->name('comment.accept');
    Route::get('/{comment}/reject', 'reject')->name('comment.reject');
});


Route::get('/', [MainController::class, 'index']);
Route::get('galery/{img}/{name}', function($img, $name){
    return view('main.galery', ['img'=>$img, 'name'=>$name]);
});

// Route::get('/', function () {
//         return view('layout');
//     });

Route::get('/about', function(){
    return view('main.about');
});

Route::get('/contacts', function(){
    $data = [
        'city'=>'Moscow',
        'street'=>'Semenovskaya',
        'house'=>38,
    ];
    return view('main.contact', ['data'=>$data]);
});

// Route::get('/', function () {
//     return view('welcome');
// });
