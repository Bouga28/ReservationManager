<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
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

/*
Route::controller(TypeController::class)->group(function () {
    Route::get('type', 'index');
    Route::post('type', 'store');
    Route::get('type/{id}', 'show');
    Route::put('type/{id}', 'update');
    Route::delete('type/{id}', 'destroy');
    Route::get('type/{slug}/resources','indexbyliste');
}); */
Route::resource('type', TypeController::class);
Route::get('type/{slug}/resources', [ResourceController::class, 'indexbyliste'])->name('resources.type');

Route::controller(ResourceController::class)->group(function () {
    Route::get('resource', 'index');
    Route::post('resource', 'store');
    Route::get('resource/page/{id}', 'show');
    Route::put('resource/{id}', 'update');
    Route::delete('resource/{id}', 'delete');
    Route::get('resources', 'liste');
    Route::get('resourcebyid/{id}', 'getbyid');
}); 

Route::controller(ReservationController::class)->group(function () {
    Route::get('reservation', 'index');
    Route::post('reservation', 'store');
    Route::get('reservation/{id}', 'show');
    Route::put('reservation/{id}', 'update');
    Route::delete('reservation/{id}', 'destroy');
    Route::get('reservations', 'liste');

}); 

Route::controller(UsersController::class)->group(function () {
    Route::get('users', 'index');
    Route::post('users', 'store');
    Route::get('users/{id}', 'show');
    Route::put('users/{id}', 'update');
    Route::delete('users/{id}', 'destroy');


}); 

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('roles', RolesController::class);
Route::resource('permissions', PermissionsController::class);
   /*

    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);

    */
//Route::get('resource', [ResourceController::class, 'index']);

//Route::resource('resource', ResourceController::class);


//Route::resource('type', TypeController::class);

//Route::get('type/{slug}/resources', [ResourceController::class, 'indexbyliste'])->name('resources.type');
//Route::get('resources', [ResourceController::class, 'liste']);
/*




        /**
         * User Routes
         
        Route::group(['prefix' => 'posts'], function() {
            Route::get('/', 'PostsController@index')->name('posts.index');
            Route::get('/create', 'PostsController@create')->name('posts.create');
            Route::post('/create', 'PostsController@store')->name('posts.store');
            Route::get('/{post}/show', 'PostsController@show')->name('posts.show');
            Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
            Route::patch('/{post}/update', 'PostsController@update')->name('posts.update');
            Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
        });

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
});*/