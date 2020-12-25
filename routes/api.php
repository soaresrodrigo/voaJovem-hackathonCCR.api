<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\StudentController;

Route::get('/', function () {
  return 'Olá, bem vindo';
});

Route::post('auth/login', [AuthController::class, 'login']);

// Só podem acessar, quem está logado
Route::group(['middleware' => ['apiJwt']], function () {
  
  // Acesso
  Route::prefix('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('refresh', [AuthController::class, 'refresh']);
  });

  // Usuários
  Route::get('users/{id}/courses', [UserController::class, 'courses']);
  Route::apiResource('users', UserController::class);

  // Cursos
  Route::get('courses/{id}/students', [CourseController::class, 'students']);
  Route::apiResource('courses', CourseController::class);

  // Estudantes
  Route::get('students/{id}/courses', [StudentController::class, 'courses']);
  Route::apiResource('students', StudentController::class);
});