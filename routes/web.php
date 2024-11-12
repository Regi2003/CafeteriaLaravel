<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;




Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/', [AuthController::class, 'index'])->name('home');
*/
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');



Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('productos/create', [ProductoController::class, 'create'])->name('productos.index');
Route::post('productos', [ProductoController::class, 'store'])->name('productos.index');
Route::get('productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.index');
Route::post('productos/{id}', [ProductoController::class, 'update'])->name('productos.index');
Route::post('productos/{id}/delete', [ProductoController::class, 'destroy'])->name('productos.index');

Route::get('categorias', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('categorias/create', [CategoriaController::class, 'create'])->name('categoria.index');
Route::post('categorias', [CategoriaController::class, 'store'])->name('categoria.index');
Route::get('categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categoria.index');
Route::post('categorias/{id}', [CategoriaController::class, 'update'])->name('categoria.index');
Route::post('categorias/{id}/delete', [CategoriaController::class, 'destroy'])->name('categoria.index');

Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index');


Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index');


Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
