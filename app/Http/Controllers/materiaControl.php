<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class materiaControl extends Controller
{
    //
    public function Listar()
    {
        $ListaCursos = DB::select('select * from Curso');
        $ListaMaterias = DB::select('SELECT c.*,m.*
        FROM Curso c JOIN Materia m ON c.IdCurso = m.IdCurso');
        return view('/materia', ['ListaCursos' => $ListaCursos,
                                'ListaMaterias' => $ListaMaterias]);
    }

    public function Ingresar(Request $request)
    {
        // dd($request);
        $txtMateria=$request['txtMateria'];
        $txtCurso=$request['txtCurso'];
        
        $Grupo_Almacen = DB::insert('INSERT INTO Materia
        (Materia,IdCurso)
        VALUES
        (?,?)',array($txtMateria,$txtCurso));

        $IdMateria = DB::select('SELECT MAX(IdMateria) AS IdMateria FROM Materia');
        
        // var_dump($IdMateria);
        // dd($IdMateria);
        // var_dump($IdMateria);

        $Timestres = array('1 Trimestre','2 Trimestre','3 Trimestre');
        // dd($Timestres);
        $Dimenciones = array('SABER','HACER','DECIDIR');
        for ($i=0; $i < 3; $i++) { 
            # code...
            $Grupo_Almacen = DB::insert('INSERT INTO Trimestre
            (Trimestre,IdMateria)
            VALUES
            (?,?)',array($Timestres[$i],$IdMateria[0]->IdMateria));

            $IdTrimestre = DB::select('SELECT MAX(IdTrimestre) AS IdTrimestre FROM Trimestre');

            for ($j=0; $j < 3; $j++) {
                # code...
                $Grupo_Almacen = DB::insert('INSERT INTO Dimencion
                (Dimencion,IdTrimestre)
                VALUES
                (?,?)',array($Dimenciones[$j],$IdTrimestre[0]->IdTrimestre));
            }
        }

        return redirect('/materia');
    }
}
