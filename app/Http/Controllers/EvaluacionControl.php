<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EvaluacionControl extends Controller
{
    //
    public function Listar()
    {
        $ListaEValuaciones = DB::select('SELECT e.*,d.Dimencion,t.Trimestre,c.Curso,m.Materia
        FROM Evaluacion e JOIN Materia m ON e.IdMateria = m.IdMateria
        JOIN Dimencion d ON e.IdDimencion = d.IdDimencion
        JOIN Trimestre t ON d.IdTrimestre = t.IdTrimestre
        JOIN Curso c ON t.IdCurso = c.IdCurso');
        $ListaCursos = DB::select('select * from Curso');
        $ListaMaterias = DB::select('select * from Materia');
        $ListaTrimestres = DB::select('select * from Trimestre');
        $ListaDimenciones = DB::select('select * from Dimencion');
        return view('/Evaluacion', ['ListaEValuaciones' => $ListaEValuaciones,
                                    'ListaCursos' => $ListaCursos,
                                    'ListaMaterias' => $ListaMaterias,
                                    'ListaTrimestres' => $ListaTrimestres,
                                    'ListaDimenciones' => $ListaDimenciones]);
    }

    public function ListarMaterTrime($idCurso)
    {
        $ListaMaterias = DB::select('select * from Materia where idCurso=?',[$idCurso]);
        $ListaTrimestres = DB::select('select * from Trimestre where idCurso=?',[$idCurso]);
        return response()->json([
            'ListaMaterias' => $ListaMaterias,
            'ListaTrimestres' => $ListaTrimestres
        ]);
    }

    public function ListarDimenciones($idTrimestre)
    {
        $ListaDimenciones = DB::select('select * from Dimencion where idTrimestre=?',[$idTrimestre]);
        return response()->json([
            'ListaDimenciones' => $ListaDimenciones
        ]);
    }

    public function Ingresar(Request $request)
    {
        // dd($request);
        $txtCurso=$request['txtCurso'];
        $txtEvaluacion=$request['txtEvaluacion'];
        $txtDimencion=$request['txtDimencion'];
        $txtMateria=$request['txtMateria'];
        
        $Grupo_Almacen = DB::insert('INSERT INTO Evaluacion
        (Evaluacion,IdDimencion,IdMateria)
        VALUES
        (?,?,?)',array($txtEvaluacion,$txtDimencion,$txtMateria));

        // $IdEvaluacion = DB::select('SELECT MAX(IdEvaluacion) AS IdEvaluacion FROM Evaluacion');

        // $ListaEstudiantes = DB::select('SELECT e.* 
        // FROM Estudiante e JOIN Curso c ON e.IdCurso=c.IdCurso
        // AND c.IdCurso=?',array($txtCurso));

        // foreach ($ListaEstudiantes as $Estudiante) {
        //     # code...
        //     $Grupo_Almacen = DB::insert('INSERT INTO EvaluacionEstudiante
        //     (NotaEvaluacion,IdEvaluacion,IdEstudiante)
        //     VALUES
        //     (0,?,?)',array($IdEvaluacion[0]->IdEvaluacion,$Estudiante->IdEstudiante));
        // }

        return redirect('/Evaluacion');
    }
}
