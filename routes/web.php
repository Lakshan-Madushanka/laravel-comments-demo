<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('posts.show', ['post' => 1]);
});

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('{post}', PostController::class)->name('show');
});

Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('{article}', ArticleController::class)->name('show');
});

Route::get('dashboard', function () {
    if (!Auth::check()) {
        Auth::login(User::query()->whereEmail('test@example.com')->first());
    }

    return redirect()->route('admin.comments.dashboard');
})->name('admin');

Route::post('logout', function () {
   Auth::logout();
   return redirect()->back();
})->name('logout');
