<?php

// Breeze導入で追加
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\KnowledgeCardController;
use App\Http\Controllers\QuestionHasCardController;
use App\Http\Controllers\CardhasQuestionController;
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


// Breeze導入で追加
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

require __DIR__ . '/auth.php';
// Breeze導入ここまで



// 管理者用ルートグループ
Route::middleware(['auth', 'AdminMiddleware'])->group(function () {

  Route::get('question/{question}', [CardhasQuestionController::class, 'show'])->name('question.show');

  Route::post('question/{x}/{y}', [CardhasQuestionController::class, 'attach'])->name('QwithC.attach');

  Route::delete('question/{x}/{y}', [CardhasQuestionController::class, 'detach'])->name('QwithC.detach');
});


// ゲスト用ルートグループ（ルート細分化予定、テスト用にauthルート化中、guestルート化予定）
Route::middleware(['auth'])->group(function () {

  Route::resource('posts', PostController::class);

  Route::resource('questions', QuestionController::class);
});
