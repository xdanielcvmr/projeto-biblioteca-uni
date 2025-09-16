<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenderController;

Route::redirect('/', '/books'); // redireciona para a listagem

Route::prefix('books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::post('/', [BookController::class, 'store'])->name('store');
    Route::get('/{id}', [BookController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BookController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [BookController::class, 'destroyView'])->name('destroy.view');
    Route::delete('/{id}', [BookController::class, 'destroy'])->name('destroy');
});

Route::prefix('genders')->name('genders.')->group(function () {
    Route::get('/', [GenderController::class, 'index'])->name('index');
    Route::get('/create', [GenderController::class, 'create'])->name('create');
    Route::post('/', [GenderController::class, 'store'])->name('store');
    Route::get('/{id}', [GenderController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [GenderController::class, 'edit'])->name('edit');
    Route::put('/{id}', [GenderController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [GenderController::class, 'destroyView'])->name('destroy.view');
    Route::delete('/{id}', [GenderController::class, 'destroy'])->name('destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::post('/', [BookController::class, 'store'])->name('store');
    Route::get('/{id}', [BookController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BookController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [BookController::class, 'destroyView'])->name('destroy.view');
    Route::delete('/{id}', [BookController::class, 'destroy'])->name('destroy');
});

// Rota raiz (opcional, ex: redireciona para livros)
Route::get('/', fn () => redirect()->route('books.index'));

