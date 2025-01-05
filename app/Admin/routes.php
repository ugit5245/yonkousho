<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\PostController;
use App\Admin\Controllers\BookController;
use App\Admin\Controllers\QuestionController;
use App\Admin\Controllers\KnowledgeCardController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('posts', PostController::class);
    $router->resource('books', BookController::class);
    $router->resource('questions', QuestionController::class);
    $router->resource('knowledge_cards', KnowledgeCardController::class);

});
