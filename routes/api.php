<?php

use App\Http\Controllers\API\V1\TodosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\API\V1'], function () {
    Route::get('todos', [TodosController::class, 'index']);
    Route::get('todos/{id}', [TodosController::class, 'show']);
    Route::post('todos/', [TodosController::class, 'store']);
    Route::put('todos/{id}', [TodosController::class, 'update']);
    Route::delete('todos/{id}', [TodosController::class, 'destroy']);
});
