<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});


Route::controller(TypeController::class)->group(function () {
    Route::get('type', 'index');
    Route::post('type', 'store');
    Route::get('type/{id}', 'show');
    Route::put('type/{id}', 'update');
    Route::delete('type/{id}', 'destroy');
    Route::get('type/{slug}/resources','indexbyliste');
}); 

//Route::get('resource', [ResourceController::class, 'index']);

Route::resource('resource', ResourceController::class);


//Route::resource('type', TypeController::class);

//Route::get('type/{slug}/resources', [ResourceController::class, 'indexbyliste'])->name('resources.type');
Route::get('resources', [ResourceController::class, 'liste']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
