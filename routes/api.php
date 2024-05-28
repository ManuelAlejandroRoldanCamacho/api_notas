<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*

PENDIENTES: 

1. Crear las rutas basicas que no necesitaran autenticacion (ok)

2. Crear las rutas para autenticacion (login y logout) (ok)

3. Hacer la autenticacion y Probar la autenticacion (aqui andamos)

4. Crear las rutas que si ocuparan autenticacion

5. Agregar el middleware de santum para su uso aqui (bootstrap/app.php)

6. Editar las rutas que necesitan autenticacion y testear

7. Empezar a programar los endpoints

*/

//Routes without autentication
Route::get('/search-student/{search}', [UserController::class, 'search_student']);
Route::get('/search-notes-by-student/{student}', [UserController::class, 'search_notes_by_student']);

//Routes for autentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

//Routes with autentication
Route::middleware('auth:sanctum')->group (function (){
    Route::apiResource('grade', GradeController::class);
});
