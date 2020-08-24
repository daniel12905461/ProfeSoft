<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Estudiante extends Controller
{
    //
    public function ListaEstudiantes()
    {
        $ListaEstudiantes = DB::select('select * from estudiante');
        $ListaCursos = DB::select('select * from Curso');
        return view('/Estudiante', ['ListaEstudiantes' => $ListaEstudiantes, 'ListaCursos'=> $ListaCursos]);
    }

    public function IngresarEstudiante(Request $request)
    {
        // dd($request);
        $txtPrimerNombre=$request['txtPrimerNombre'];
        $txtSegundoNombre=$request['txtSegundoNombre'];
        $txtApellidoPaterno=$request['txtApellidoPaterno'];
        $txtApellidoMaterno=$request['txtApellidoMaterno'];
        $txtCi=$request['txtCi'];
        $txtGenero=$request['txtGenero'];
        $txtNacimiento=$request['txtNacimiento'];
        $txtCurso=$request['txtCurso'];
        
        $Grupo_Almacen = DB::insert('INSERT INTO Estudiante
        (PrimerNombre,SegundoNombre,ApellidoPaterno,ApellidoMaterno,CiEstudiante,Genero,FechaNacimiento,IdCurso)
        VALUES
        (?,?,?,?,?,?,?,?)',array($txtPrimerNombre,$txtSegundoNombre,$txtApellidoPaterno,$txtApellidoMaterno,$txtCi,$txtGenero,$txtNacimiento,$txtCurso));

        return redirect('/Estudiante');
    }

    public function eliminarEstudiante($IdEstudiante, Request $request) {
        DB::delete('DELETE FROM Estudiante WHERE IdEstudiante=:IdEstudiante', array($IdEstudiante));
        return redirect('/Estudiante');
    }

    public function actualizarEstudiante($IdEstudiante, Request $request) {
        DB::update('DELETE FROM Estudiante WHERE IdEstudiante=:IdEstudiante', array($IdEstudiante));
        return redirect('/Estudiante');
    }
}
