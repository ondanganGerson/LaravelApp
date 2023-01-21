<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API RoutesPzzzzzzzzzzzz
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//For OpenApi/Swagger purposes and postman
Route::apiResource('posts', PostController::class);
// Route::get('posts',[PostController::class, 'index']);
// Route::get('posts/{id}',[PostController::class, 'show']);
// Route::post('posts',[PostController::class, 'store']);
// Route::put('posts/{id}',[PostController::class, 'update']);
// Route::delete('posts/{id}',[PostController::class, 'destroy']);


Route::post('/country', 'App\\Http\\Controllers\\StudentController');