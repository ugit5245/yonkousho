<?php

use App\Http\Controllers\CardhasQuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\KnowledgeCardController;
use App\Http\Controllers\QuestionHasCardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('question/{question}', [CardhasQuestionController::class, 'show'])->name('question.show');

Route::post('question/{question}/attach', [CardhasQuestionController::class, 'attach'])->name('QwithC.attach');

Route::delete('question/{question}/detach', [CardhasQuestionController::class, 'destroy'])->name('QwithC.destach');


Route::resource('posts',PostController::class);

Route::resource('questions', QuestionController::class);

