<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\KnowledgeCardController;
use App\Http\Controllers\QuestionsHaveCardsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts',PostController::class);

Route::resource('questions', QuestionController::class);

Route::post('questions/{{question_id}}', [QuestionsHaveCardsController::class, 'store'])->name('QwithC.store');

Route::delete('questions/{{question_id}}', [QuestionsHaveCardsController::class, 'destroy'])->name('QwithC.destroy');