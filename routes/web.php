<?php
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get("/", [CrudController::class, "index"])->name("crud.index");


//Ruta para anadir un nuevo alumno
Route::post("/registrar-alumno", [CrudController::class, "create"])->name("crud.create");

//Ruta para Modificar un alumno
Route::post("/modificar-alumno", [CrudController::class, "update"])->name("crud.update");