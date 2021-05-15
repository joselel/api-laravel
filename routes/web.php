<?php

use App\Http\Middleware\ApiAuthMiddleware;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobStatusController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\PatientsLogController;
use App\Http\Controllers\PatientStatusController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomStatusController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return '<h1>Hola mundo</h1>';
});

Route::get('/pruebas/{nombre?}', function ($nombre = null) {
    $texto = '<h2>Texto desde una ruta</h2>';
    $texto .= 'Nombre:'.$nombre;
    return view('pruebas', array(
        'texto' => $texto
    ));
});

Route::get('/animales', [PruebaController::class, 'index']);
Route::get('/test-orm', [PruebaController::class, 'testOrm']);

//Rutas de API HM

//Rutas de controlador API para usuarios
//Route::get('/usuario/pruebas', [UserController::class, 'pruebas']);
Route::post('/api/register', [UserController::class, 'register']);
Route::post('/api/login', [UserController::class, 'login']);
Route::put('/api/user/update', [UserController::class, 'update']);
Route::post('/api/user/upload', [UserController::class, 'upload'])->middleware(apiAuthMiddleware::class);
Route::get('/api/user/avatar/{filename}', [UserController::class, 'getImage']);
Route::get('/api/user/detail/{id}', [UserController::class, 'detail']);

//Rutas de controlador API para categorias
Route::resource('/api/category', CategoryController::class);

//Rutas de controlador API para Posts
Route::resource('/api/post', PostController::class);
Route::post('/api/post/upload', [PostController::class, 'upload']);
Route::get('/api/post/image/{filename}', [PostController::class, 'getImage']);
Route::get('/api/post/category/{id}', [PostController::class, 'getPostsByCategory']);
Route::get('/api/post/user/{id}', [PostController::class, 'getPostsByUser']);

//Rutas de controlador API para tareas
Route::resource('/api/job', JobController::class);
//Rutas de controlador API para pacientes
Route::resource('/api/patient', PatientController::class);
//Rutas de controlador API para pacientes
Route::resource('/api/job-status', JobStatusController::class);
//Rutas de controlador API para pacientes
Route::resource('/api/job-types', JobTypeController::class);
//Rutas de controlador API para pacientes
Route::resource('/api/patients-log', PatientsLogController::class);
//Rutas de controlador API para pacientes
Route::resource('/api/patient-status', PatientStatusController::class);
//Rutas de controlador API para pacientes
Route::resource('/api/rooms', RoomController::class);
//Rutas de controlador API para pacientes
Route::resource('/api/room-status', RoomStatusController::class);
//Rutas de controlador API para pacientes
Route::resource('/api/role', RoleController::class);
//Rutas de controlador API para pacientes
Route::resource('/api/module', ModuleController::class);
