<?php

use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[LoginController::class,'index']);

Route::get('/inicio',InicioController::class)->name('home');

Route::get('/registro',[RegistroController::class,'index'])->name('registro');
Route::post('/registro',[RegistroController::class,'store']);
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::get('/info',[InfoController::class,'index'])->name('info');
Route::post('/logout',[LogoutController::class,'logout'])->name('logout');


Route::get('/{user:usuario}',[PostController::class,'index'])->name('post.home');
Route::get('/posts/create',[PostController::class,'create'])->name('post.create');
Route::post('/posts/create',[PostController::class,'store'])->name('post.store');
Route::get('/{user:usuario}/post/{post}',[PostController::class,'show'])->name('post.show');
Route::delete('/post/{post}',[PostController::class,'destroy'])->name('post.eliminar');

Route::post('/{user:usuario}/post/{post}',[ComentarioController::class,'store'])->name('comentarios.store');

Route::post('/imagenes',[ImagenController::class,'store'])->name('imagen.store');

Route::post('/post/{post}/likes',[LikeController::class,'store'])->name('post.like.store');
Route::delete('/post/{post}/likes',[LikeController::class,'destroy'])->name('post.like.eliminar');

Route::get('/{user:usuario}/editar-perfil',[PerfilController::class,'index'])->name('perfil.index');
Route::post('/{user:usuario}/editar-perfil',[PerfilController::class,'store'])->name('perfil.store');

Route::post('/{user:usuario}/follow',[FollowerController::class,'store'])->name('user.follow');
Route::delete('/{user:usuario}/unfollow',[FollowerController::class,'destroy'])->name('user.unfollow');

