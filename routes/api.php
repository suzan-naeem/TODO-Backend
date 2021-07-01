<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TodoController;


Route::get('todos',[TodoController::class,'index']);
Route::post('/add-todo',[TodoController::class,'store']);
Route::get('/edit-todo/{id}',[TodoController::class,'edit']);
Route::put('update-todo/{id}',[TodoController::class,'update']);
Route::delete('delete-todo/{id}',[TodoController::class,'destroy']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
