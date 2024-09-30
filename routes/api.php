<?php

use App\Http\Controllers\API\V1\TodosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\API\V1'], function () {
    Route::apiResource('/todos', TodosController::class)->parameters(
        [
            'todos' => 'id'
        ]
    );
});
