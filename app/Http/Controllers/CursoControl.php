<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CursoControl extends Controller
{
    //
    public function Listar()
    {
        $ListaProfesores = DB::select('select * from profesor');
        $ListaCursos = DB::select('SELECT c.*,p.*
        FROM Curso c JOIN Profesor p ON c.IdProfesor=p.IdProfesor');
        return view('/Curso', ['ListaProfesores' => $ListaProfesores,
                                'ListaCursos' => $ListaCursos]);
    }

    public function Ingresar(Request $request)
    {
        // dd($request);
        $txtCurso=$request['txtCurso'];
        $txtGrado=$request['txtGrado'];
        $txtParalelo=$request['txtParalelo'];
        $txtProfesor=$request['txtProfesor'];
        
        $Grupo_Almacen = DB::insert('INSERT INTO Curso
        (Curso,Grado,Paralelo,IdProfesor)
        VALUES
        (?,?,?,?)',array($txtCurso,$txtGrado,$txtParalelo,$txtProfesor));

        return redirect('/Curso');
    }
}
