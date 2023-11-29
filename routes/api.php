<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//cada ruta con su metodo apuntan a la funcion adecuada
Route::get('empleados', [EmpleadoController::class, 'index']);
Route::get('empleados/{id}', [EmpleadoController::class, 'show']);
Route::post('empleados', [EmpleadoController::class, 'store']);
Route::put('empleados/{id}', [EmpleadoController::class, 'update']);
Route::delete('empleados/{id}', [EmpleadoController::class, 'destroy']);