<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::patch('/news/{id}', [NewsController::class, 'update'])->name('news.update');
Route::delete('/news/{id}/delete', [NewsController::class, 'delete'])->name('news.delete');

// Categories
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::patch('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');

// Tags
Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('/tag', [TagController::class, 'store'])->name('tag.store');
Route::get('/tag/{id}', [TagController::class, 'show'])->name('tag.show');
Route::get('/tag/{id}/edit', [TagController::class, 'edit'])->name('tag.edit');
Route::patch('/tag/{id}', [TagController::class, 'update'])->name('tag.update');
Route::delete('/tag/{id}/delete', [TagController::class, 'delete'])->name('tag.delete');

// Comments
Route::post('/comment', [CommentController::class, 'uploadComment'])->name('comment.upload');
Route::delete('/comment/{id}/delete', [CommentController::class, 'delete'])->name('comment.delete');
Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
Route::patch('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');

require __DIR__.'/auth.php';
