<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('home');
});


    
//Route::get("/user/team/{id}", [TeamController::class, 'show'])->name('team.show')->middleware('auth');
//Route::get("/team/{id}", [TeamController::class, 'show'])->name('team.show');
//Route::get("/user/team/{id}", [TeamController::class, 'show'])->name('team.team'); colocando o arquivo chamado team.blade dentro da pasta users

Route::middleware(['auth'])->group(function () {
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/user', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
});

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin',[UserController::class, 'admin'])->name('admin');
});
//VIA CEP WEB SERVICE
//Route::get('/viacep',[ViaCepController::class, 'index'])->name('viacep.index');
//Route::post('/viacep',[ViaCepController::class, 'index'])->name('viacep.index.post');
//Route::get('/viacep/{cep}', [ViaCepController::class, 'show'])->name('viacep.show');

//CODIGO PARA CLICAR EM ESQUECI MINHA SENHA USAR NO .ENV
//MAIL_MAILER=smtp
//MAIL_HOST=smtp.gmail.com
//MAIL_PORT=587
//MAIL_USERNAME=risysintegrator@gmail.com
//MAIL_PASSWORD=92392105
//MAIL_ENCRYPTION=tls
//MAIL_FROM_ADDRESS=risysintegrator@gmail.com

