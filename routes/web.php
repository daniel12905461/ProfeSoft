<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/filiacion', function () {
    return view('filiacion');
});

Route::post('/', 'Logim@logim')->name('LoginProfe');

// Estudiante
Route::resource('estudiantes', 'EstudianteControl');

// Evaluacion
Route::get('/Evaluacion', 'EvaluacionControl@Listar');
Route::get('/ActualizarSelectMaterTrimes/{idCurso}', 'EvaluacionControl@ListarMaterTrime');
Route::get('/ActualizarSelectDimeciones/{idTrimestre}', 'EvaluacionControl@ListarDimenciones');
Route::post('/Evaluacion', 'EvaluacionControl@Ingresar')->name('IngresarEvaluacion');

//Materia
Route::get('/materia', 'materiaControl@Listar');
Route::post('/materia', 'materiaControl@Ingresar')->name('IngresarMateria');

// filiacion
Route::get('/filiacion', 'filiacionControl@Listar');
Route::post('/filiacion', 'materiaControl@Ingresar')->name('IngresarClaseEstudiante');

// Curso
Route::get('/Curso', 'CursoControl@Listar');
Route::post('/Curso', 'CursoControl@Ingresar')->name('IngresarCurso');

// Calificaiones
Route::get('/Calificaciones', 'CalificaionesControl@Listar');
Route::get('/ActualizarTabla/{idCurso}&{IdMateria}&{IdTrimestre}', 'CalificaionesControl@ActualizarTabla');
Route::get('/MostrarNotasPorEvaluacion/{IdEvaluacion}', 'CalificaionesControl@MostrarNotasPorEvaluacion');
Route::get('/MostrarNotasPorCalificaion/{IdEvaluacionEstudiante}', 'CalificaionesControl@MostrarNotasPorCalificaion');
Route::post('/Calificaciones', 'CalificaionesControl@ActualizarNotaPorEvaluacion')->name('ActualizarNotasPorEvaluacion');
Route::post('/Actualizar', 'CalificaionesControl@ActualizarNota')->name('ActualizarNota');
