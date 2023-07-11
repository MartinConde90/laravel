<?php

use App\http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// personal-site.com => welcome
/*
Route::get('/', function () {
    return view('welcome'); //esta funcion está en resources/views/welcome.blade.php
});
*/

Route::view('/','welcome')->name('home'); //Esto hace lo mismo que arriba siempre que arriba no necesitemos ninguna otra operacion adicional entre la peticion y la respuesta

// personal-site.com/contacto => contact
Route::view('/contact','contact')->name('contact'); //->name('contact') le da un nombre de ruta para que independiente del primer parametro, vaya a ese archivo

// personal-site.com/blog => blog
Route::get('/blog', [PostController::class, 'index'])->name('posts.index'); //php artisan make:controller PostController -i (crear controlador por comando)
Route::get('/blog/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/blog', [PostController::class, 'store'])->name('posts.store');

Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');

// personal-site.com/about => about
Route::view('/about','about')->name('about');