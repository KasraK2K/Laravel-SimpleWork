<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\UserNotificationsController;
use Illuminate\Support\Facades\Route;

app()->bind('example', function () {
    return new App\Example();
});

Route::get('/', function () {
    return View::make('welcome');
});

Route::get('/bind', function () {
//    $example = resolve(App\Example::class);
//    ddd($example);
    ddd(resolve('example'));
});

Route::get('/about', function () {
    return view('about', [
        "articles" => App\Models\Article::take(3)->latest()->get(),
    ]);
});

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::post('/articles', [ArticlesController::class, 'store']);
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);
Route::put('/articles/{article}', [ArticlesController::class, 'update']);

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact']);
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store']);

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/payments/create', [PaymentsController::class, 'create'])->middleware('auth');
Route::post('/payments', [PaymentsController::class, 'store'])->middleware('auth');

Route::get('/notifications', [UserNotificationsController::class, 'show'])->middleware('auth');
