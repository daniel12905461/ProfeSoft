<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CalificaionesControl extends Controller
{
    //
    public function Listar()
    {
        $ListaEValuacionesSABER = DB::select('SELECT e.*
                                        FROM Materia m JOIN Curso c ON m.IdCurso = c.IdCurso
                                        JOIN Trimestre t ON c.IdCurso = t.IdCurso
                                        JOIN Dimencion d ON t.IdTrimestre = d.IdTrimestre
                                        JOIN Evaluacion e ON d.IdDimencion = e.IdDimencion
                                        AND c.IdCurso = 1
                                        AND t.IdTrimestre = 1
                                        AND m.IdMateria = 1
                                        AND d.Dimencion = "SABER"
                                        ORDER BY e.IdEvaluacion');

        $ListaEValuacionesHACER = DB::select('SELECT e.*
                                        FROM Materia m JOIN Curso c ON m.IdCurso = c.IdCurso
                                        JOIN Trimestre t ON c.IdCurso = t.IdCurso
                                        JOIN Dimencion d ON t.IdTrimestre = d.IdTrimestre
                                        JOIN Evaluacion e ON d.IdDimencion = e.IdDimencion
                                        AND c.IdCurso = 1
                                        AND t.IdTrimestre = 1
                                        AND m.IdMateria = 1
                                        AND d.Dimencion = "HACER"
                                        ORDER BY e.IdEvaluacion');

        $ListaEValuacionesDECIDIR = DB::select('SELECT e.*
                                        FROM Materia m JOIN Curso c ON m.IdCurso = c.IdCurso
                                        JOIN Trimestre t ON c.IdCurso = t.IdCurso
                                        JOIN Dimencion d ON t.IdTrimestre = d.IdTrimestre
                                        JOIN Evaluacion e ON d.IdDimencion = e.IdDimencion
                                        AND c.IdCurso = 1
                                        AND t.IdTrimestre = 1
                                        AND m.IdMateria = 1
                                        AND d.Dimencion = "DECIDIR"
                                        ORDER BY e.IdEvaluacion');
                                        
        $ListaCursos = DB::select('select * from Curso');
        $ListaMaterias = DB::select('select * from Materia');
        $ListaTrimestres = DB::select('select * from Trimestre');
        $ListaDimenciones = DB::select('select * from Dimencion');
        $ListaEstudiantes = DB::select('SELECT e.* 
                                        FROM Estudiante e JOIN Curso c ON e.IdCurso=c.IdCurso
                                        AND c.IdCurso=1');
        // $ListaEValuacionesEstudiante = DB::select('select * from evaluacionEstudiante');

        $ListaEValuacionesEstudiante;
        $i=0;
        $j=0;

        $NotaFinalSaber=0;
        $CantidadNotasSaber=0;

        $NotaFinalHacer=0;
        $CantidadNotasHacer=0;

        $NotaFinalDecidir=0;
        $CantidadNotasDecidir=0;

        foreach ($ListaEstudiantes as $Estudiante) {
            $ListaEValuacionesEstudiante[$i]["IdEstudiante"]=$Estudiante->IdEstudiante;
            $ListaEValuacionesEstudiante[$i]["PrimerNombre"]=$Estudiante->PrimerNombre;
            $ListaEValuacionesEstudiante[$i]["SegundoNombre"]=$Estudiante->SegundoNombre;
            $ListaEValuacionesEstudiante[$i]["ApellidoPaterno"]=$Estudiante->ApellidoPaterno;
            $ListaEValuacionesEstudiante[$i]["ApellidoMaterno"]=$Estudiante->ApellidoMaterno;
            foreach ($ListaEValuacionesSABER as $Evaluacion) {
                $Calificacion = DB::select('SELECT ee.* 
                FROM Estudiante es JOIN evaluacionEstudiante ee ON es.IdEstudiante = ee.IdEstudiante
                JOIN Evaluacion ev ON ee.IdEvaluacion = ev.IdEvaluacion
                AND es.IdEstudiante = ?
                AND ev.IdEvaluacion = ?',array($Estudiante->IdEstudiante,$Evaluacion->IdEvaluacion));
                if ($Calificacion) {
                    $ListaEValuacionesEstudiante[$i][$j]='<a href="" class="NotaEvaluacion" value="'.$Calificacion[0]->IdEvaluacionEstudiante.'" data-toggle="modal" data-target="#modal-sm">'.$Calificacion[0]->NotaEvaluacion.'</a>';
                    $NotaFinalSaber=$NotaFinalSaber+$Calificacion[0]->NotaEvaluacion;
                    $CantidadNotasSaber++;
                }else{
                    $InsertarNota = DB::insert('INSERT INTO EvaluacionEstudiante
                    (NotaEvaluacion,IdEvaluacion,IdEstudiante)
                    VALUES
                    (0,?,?)',array($Evaluacion->IdEvaluacion,$Estudiante->IdEstudiante));
                    $ListaEValuacionesEstudiante[$i][$j]="0";
                    $CantidadNotasSaber++;
                }
                $j++;
            }
            $ListaEValuacionesEstudiante[$i][$j]=round(($NotaFinalSaber/$CantidadNotasSaber)*(45/100));
            $j++;
            foreach ($ListaEValuacionesHACER as $Evaluacion) {
                $Calificacion = DB::select('SELECT ee.* 
                FROM Estudiante es JOIN evaluacionEstudiante ee ON es.IdEstudiante = ee.IdEstudiante
                JOIN Evaluacion ev ON ee.IdEvaluacion = ev.IdEvaluacion
                AND es.IdEstudiante = ?
                AND ev.IdEvaluacion = ?',array($Estudiante->IdEstudiante,$Evaluacion->IdEvaluacion));
                if ($Calificacion) {
                    $ListaEValuacionesEstudiante[$i][$j]='<a href="" class="NotaEvaluacion" value="'.$Calificacion[0]->IdEvaluacionEstudiante.'"  data-toggle="modal" data-target="#modal-sm">'.$Calificacion[0]->NotaEvaluacion.'</a>';
                    $NotaFinalHacer=$NotaFinalHacer+$Calificacion[0]->NotaEvaluacion;
                    $CantidadNotasHacer++;
                }else{
                    $InsertarNota = DB::insert('INSERT INTO EvaluacionEstudiante
                    (NotaEvaluacion,IdEvaluacion,IdEstudiante)
                    VALUES
                    (0,?,?)',array($Evaluacion->IdEvaluacion,$Estudiante->IdEstudiante));
                    $ListaEValuacionesEstudiante[$i][$j]="0";
                    $CantidadNotasHacer++;
                }
                $j++;
            }
            $ListaEValuacionesEstudiante[$i][$j]=round(($NotaFinalHacer/$CantidadNotasHacer)*(45/100));
            $j++;
            foreach ($ListaEValuacionesDECIDIR as $Evaluacion) {
                $Calificacion = DB::select('SELECT ee.* 
                FROM Estudiante es JOIN evaluacionEstudiante ee ON es.IdEstudiante = ee.IdEstudiante
                JOIN Evaluacion ev ON ee.IdEvaluacion = ev.IdEvaluacion
                AND es.IdEstudiante = ?
                AND ev.IdEvaluacion = ?',array($Estudiante->IdEstudiante,$Evaluacion->IdEvaluacion));
                if ($Calificacion) {
                    $ListaEValuacionesEstudiante[$i][$j]='<a href="" class="NotaEvaluacion" value="'.$Calificacion[0]->IdEvaluacionEstudiante.'"  data-toggle="modal" data-target="#modal-sm">'.$Calificacion[0]->NotaEvaluacion.'</a>';
                    $NotaFinalDecidir=$NotaFinalHacer+$Calificacion[0]->NotaEvaluacion;
                    $CantidadNotasDecidir++;
                }else{
                    $InsertarNota = DB::insert('INSERT INTO EvaluacionEstudiante
                    (NotaEvaluacion,IdEvaluacion,IdEstudiante)
                    VALUES
                    (0,?,?)',array($Evaluacion->IdEvaluacion,$Estudiante->IdEstudiante));
                    $ListaEValuacionesEstudiante[$i][$j]="0";
                    $CantidadNotasDecidir++;
                }
                $j++;
            }
            $ListaEValuacionesEstudiante[$i][$j]=round(($NotaFinalDecidir/$CantidadNotasDecidir)*(10/100));
            $j++;
            $ListaEValuacionesEstudiante[$i][$j]=round((($NotaFinalSaber/$CantidadNotasSaber)*(45/100))+(($NotaFinalHacer/$CantidadNotasHacer)*(45/100))+(($NotaFinalDecidir/$CantidadNotasDecidir)*(10/100)));
            $j++;
            $i++;
            $CantidadNotas=$j;
            $j=0;

            $NotaFinalSaber=0;
            $CantidadNotasSaber=0;
    
            $NotaFinalHacer=0;
            $CantidadNotasHacer=0;
    
            $NotaFinalDecidir=0;
            $CantidadNotasDecidir=0;
        }
        return view('/Calificaciones', ['ListaEValuacionesSABER' => $ListaEValuacionesSABER,
                                    'ListaEValuacionesHACER' => $ListaEValuacionesHACER,
                                    'ListaEValuacionesDECIDIR' => $ListaEValuacionesDECIDIR,
                                    'ListaCursos' => $ListaCursos,
                                    'ListaMaterias' => $ListaMaterias,
                                    'ListaTrimestres' => $ListaTrimestres,
                                    'ListaDimenciones' => $ListaDimenciones,
                                    'ListaEstudiantes' => $ListaEstudiantes,
                                    'ListaEValuacionesEstudiante' => $ListaEValuacionesEstudiante,
                                    'CantidadNotas' => $CantidadNotas]);
    }

    public function ActualizarTabla($idCurso,$IdMateria,$IdTrimestre)
    {
        // $IdCurso=$IdCurso['IdCurso'];
        // $IdMateria=$request['IdMateria'];
        // $IdTrimestre=$request['IdTrimestre'];
        $ListaEValuacionesSABER = DB::select('SELECT e.*
                                        FROM Materia m JOIN Curso c ON m.IdCurso = c.IdCurso
                                        JOIN Trimestre t ON c.IdCurso = t.IdCurso
                                        JOIN Dimencion d ON t.IdTrimestre = d.IdTrimestre
                                        JOIN Evaluacion e ON d.IdDimencion = e.IdDimencion
                                        AND c.IdCurso = ?
                                        AND t.IdTrimestre = ?
                                        AND m.IdMateria = ?
                                        AND d.Dimencion = "SABER"
                                        ORDER BY e.IdEvaluacion',array($idCurso,$IdMateria,$IdTrimestre));

        $ListaEValuacionesHACER = DB::select('SELECT e.*
                                        FROM Materia m JOIN Curso c ON m.IdCurso = c.IdCurso
                                        JOIN Trimestre t ON c.IdCurso = t.IdCurso
                                        JOIN Dimencion d ON t.IdTrimestre = d.IdTrimestre
                                        JOIN Evaluacion e ON d.IdDimencion = e.IdDimencion
                                        AND c.IdCurso = ?
                                        AND t.IdTrimestre = ?
                                        AND m.IdMateria = ?
                                        AND d.Dimencion = "HACER"
                                        ORDER BY e.IdEvaluacion',array($idCurso,$IdMateria,$IdTrimestre));

        $ListaEValuacionesDECIDIR = DB::select('SELECT e.*
                                        FROM Materia m JOIN Curso c ON m.IdCurso = c.IdCurso
                                        JOIN Trimestre t ON c.IdCurso = t.IdCurso
                                        JOIN Dimencion d ON t.IdTrimestre = d.IdTrimestre
                                        JOIN Evaluacion e ON d.IdDimencion = e.IdDimencion
                                        AND c.IdCurso = ?
                                        AND t.IdTrimestre = ?
                                        AND m.IdMateria = ?
                                        AND d.Dimencion = "DECIDIR"
                                        ORDER BY e.IdEvaluacion',array($idCurso,$IdMateria,$IdTrimestre));

        $ListaEstudiantes = DB::select('SELECT e.* 
                                        FROM Estudiante e JOIN Curso c ON e.IdCurso=c.IdCurso
                                        AND c.IdCurso=?',array($idCurso));
        
        $ListaEValuacionesEstudiante;
        $i=0;
        $j=0;

        $NotaFinalSaber=0;
        $CantidadNotasSaber=0;

        $NotaFinalHacer=0;
        $CantidadNotasHacer=0;

        $NotaFinalDecidir=0;
        $CantidadNotasDecidir=0;

        foreach ($ListaEstudiantes as $Estudiante) {
            $ListaEValuacionesEstudiante[$i]["IdEstudiante"]=$Estudiante->IdEstudiante;
            $ListaEValuacionesEstudiante[$i]["PrimerNombre"]=$Estudiante->PrimerNombre;
            $ListaEValuacionesEstudiante[$i]["SegundoNombre"]=$Estudiante->SegundoNombre;
            $ListaEValuacionesEstudiante[$i]["ApellidoPaterno"]=$Estudiante->ApellidoPaterno;
            $ListaEValuacionesEstudiante[$i]["ApellidoMaterno"]=$Estudiante->ApellidoMaterno;
            foreach ($ListaEValuacionesSABER as $Evaluacion) {
                $Calificacion = DB::select('SELECT ee.* 
                FROM Estudiante es JOIN evaluacionEstudiante ee ON es.IdEstudiante = ee.IdEstudiante
                JOIN Evaluacion ev ON ee.IdEvaluacion = ev.IdEvaluacion
                AND es.IdEstudiante = ?
                AND ev.IdEvaluacion = ?',array($Estudiante->IdEstudiante,$Evaluacion->IdEvaluacion));
                if ($Calificacion) {
                    // $ListaEValuacionesEstudiante[$i][$j]=$Calificacion[0]->NotaEvaluacion;
                    $ListaEValuacionesEstudiante[$i][$j]='<a href="" class="NotaEvaluacion" value="'.$Calificacion[0]->IdEvaluacionEstudiante.'"  data-toggle="modal" data-target="#modal-sm">'.$Calificacion[0]->NotaEvaluacion.'</a>';
                    $NotaFinalSaber=$NotaFinalSaber+$Calificacion[0]->NotaEvaluacion;
                    $CantidadNotasSaber++;
                }else{
                    $InsertarNota = DB::insert('INSERT INTO EvaluacionEstudiante
                    (NotaEvaluacion,IdEvaluacion,IdEstudiante)
                    VALUES
                    (0,?,?)',array($Evaluacion->IdEvaluacion,$Estudiante->IdEstudiante));
                    $ListaEValuacionesEstudiante[$i][$j]="0";
                    $CantidadNotasSaber++;
                }
                $j++;
            }
            $ListaEValuacionesEstudiante[$i][$j]=round(($NotaFinalSaber/$CantidadNotasSaber)*(10/100));
            $j++;
            foreach ($ListaEValuacionesHACER as $Evaluacion) {
                $Calificacion = DB::select('SELECT ee.* 
                FROM Estudiante es JOIN evaluacionEstudiante ee ON es.IdEstudiante = ee.IdEstudiante
                JOIN Evaluacion ev ON ee.IdEvaluacion = ev.IdEvaluacion
                AND es.IdEstudiante = ?
                AND ev.IdEvaluacion = ?',array($Estudiante->IdEstudiante,$Evaluacion->IdEvaluacion));
                if ($Calificacion) {
                    $ListaEValuacionesEstudiante[$i][$j]=$Calificacion[0]->NotaEvaluacion;
                    $NotaFinalHacer=$NotaFinalHacer+$Calificacion[0]->NotaEvaluacion;
                    $CantidadNotasHacer++;
                }else{
                    $InsertarNota = DB::insert('INSERT INTO EvaluacionEstudiante
                    (NotaEvaluacion,IdEvaluacion,IdEstudiante)
                    VALUES
                    (0,?,?)',array($Evaluacion->IdEvaluacion,$Estudiante->IdEstudiante));
                    $ListaEValuacionesEstudiante[$i][$j]="0";
                    $CantidadNotasHacer++;
                }
                $j++;
            }
            $ListaEValuacionesEstudiante[$i][$j]=round(($NotaFinalHacer/$CantidadNotasHacer)*(10/100));
            $j++;
            foreach ($ListaEValuacionesDECIDIR as $Evaluacion) {
                $Calificacion = DB::select('SELECT ee.* 
                FROM Estudiante es JOIN evaluacionEstudiante ee ON es.IdEstudiante = ee.IdEstudiante
                JOIN Evaluacion ev ON ee.IdEvaluacion = ev.IdEvaluacion
                AND es.IdEstudiante = ?
                AND ev.IdEvaluacion = ?',array($Estudiante->IdEstudiante,$Evaluacion->IdEvaluacion));
                if ($Calificacion) {
                    $ListaEValuacionesEstudiante[$i][$j]=$Calificacion[0]->NotaEvaluacion;
                    $NotaFinalDecidir=$NotaFinalHacer+$Calificacion[0]->NotaEvaluacion;
                    $CantidadNotasDecidir++;
                }else{
                    $InsertarNota = DB::insert('INSERT INTO EvaluacionEstudiante
                    (NotaEvaluacion,IdEvaluacion,IdEstudiante)
                    VALUES
                    (0,?,?)',array($Evaluacion->IdEvaluacion,$Estudiante->IdEstudiante));
                    $ListaEValuacionesEstudiante[$i][$j]="0";
                    $CantidadNotasDecidir++;
                }
                $j++;
            }
            $ListaEValuacionesEstudiante[$i][$j]=round(($NotaFinalDecidir/$CantidadNotasDecidir)*(10/100));
            $j++;
            $ListaEValuacionesEstudiante[$i][$j]=round((($NotaFinalSaber/$CantidadNotasSaber)*(10/100))+(($NotaFinalHacer/$CantidadNotasHacer)*(10/100))+(($NotaFinalDecidir/$CantidadNotasDecidir)*(10/100)));
            $j++;
            $i++;
            $CantidadNotas=$j;
            $j=0;

            $NotaFinalSaber=0;
            $CantidadNotasSaber=0;
    
            $NotaFinalHacer=0;
            $CantidadNotasHacer=0;
    
            $NotaFinalDecidir=0;
            $CantidadNotasDecidir=0;
        }
        return response()->json([
            'ListaEValuacionesSABER' => $ListaEValuacionesSABER,
            'ListaEValuacionesHACER' => $ListaEValuacionesHACER,
            'ListaEValuacionesDECIDIR' => $ListaEValuacionesDECIDIR,
            'ListaEValuacionesEstudiante' => $ListaEValuacionesEstudiante,
            'CantidadNotas' => $CantidadNotas
        ]);
    }

    public function MostrarNotasPorEvaluacion($IdEvaluacion)
    {
        $ListaEstudiantes = DB::select('SELECT es.*, e.Evaluacion
                                        FROM Evaluacion e JOIN Materia m ON e.IdMateria = m.IdMateria
                                        JOIN Curso c ON m.IdCurso = c.IdCurso
                                        JOIN Estudiante es ON c.IdCurso = es.IdCurso
                                        AND e.IdEvaluacion=?',array($IdEvaluacion));
        $NombreDeLaEvaluacion = $ListaEstudiantes[0]->Evaluacion;
        $ListaEstudiantesCalificaiones;
        $i=0;
        foreach ($ListaEstudiantes as $Estudiante) {
            $ListaEstudiantesCalificaiones[$i]["IdEstudiante"]=$Estudiante->IdEstudiante;
            $ListaEstudiantesCalificaiones[$i]["PrimerNombre"]=$Estudiante->PrimerNombre;
            $ListaEstudiantesCalificaiones[$i]["SegundoNombre"]=$Estudiante->SegundoNombre;
            $ListaEstudiantesCalificaiones[$i]["ApellidoPaterno"]=$Estudiante->ApellidoPaterno;
            $ListaEstudiantesCalificaiones[$i]["ApellidoMaterno"]=$Estudiante->ApellidoMaterno;
            $Calificacion = DB::select('SELECT ee.*
                FROM Estudiante es JOIN evaluacionEstudiante ee ON es.IdEstudiante = ee.IdEstudiante
                JOIN Evaluacion ev ON ee.IdEvaluacion = ev.IdEvaluacion
                AND es.IdEstudiante = ?
                AND ev.IdEvaluacion = ?',array($Estudiante->IdEstudiante,$IdEvaluacion));
            if ($Calificacion) {
                $ListaEstudiantesCalificaiones[$i]["Nota"]=$Calificacion[0]->NotaEvaluacion;
                $ListaEstudiantesCalificaiones[$i]["IdEvaluacionEstudiante"]=$Calificacion[0]->IdEvaluacionEstudiante;
            }else{
                // $InsertarNota = DB::insert('INSERT INTO EvaluacionEstudiante
                // (NotaEvaluacion,IdEvaluacion,IdEstudiante)
                // VALUES
                // (0,?,?)',array($IdEvaluacion,$Estudiante->IdEstudiante));
                $ListaEstudiantesCalificaiones[$i]["Nota"]="0";
            }
            $i++;
        }
        return response()->json([
            'ListaEstudiantesCalificaiones' => $ListaEstudiantesCalificaiones,
            'NombreDeLaEvaluacion' => $NombreDeLaEvaluacion,
            'IdEvaluacion' => $IdEvaluacion
        ]);
    }
    
    public function MostrarNotasPorCalificaion($IdEvaluacionEstudiante)
    {
        $DatosCalificacion = DB::select('SELECT es.*,ev.*,ee.* 
                                        FROM Estudiante es JOIN evaluacionEstudiante ee ON es.IdEstudiante = ee.IdEstudiante
                                        JOIN Evaluacion ev ON ee.IdEvaluacion = ev.IdEvaluacion
                                        AND ee.IdEvaluacionEstudiante = ?',array($IdEvaluacionEstudiante));
        return response()->json([
            'DatosCalificacion' => $DatosCalificacion
        ]);
    }    
    
    public function ActualizarNotaPorEvaluacion(Request $request)
    {
        $ListaDeCalificaion;
        $j=0;
        for ($i=0; $i < 100; $i++) { 
            if($request['txtIdCalificacion'.$i]){
                $ListaDeCalificaion[$j]["IdCalificacion"]=$request['txtIdCalificacion'.$i];
                $ListaDeCalificaion[$j]["Nota"]=$request['txtNota'.$i];
                $j++;
            }
        }
        // dd($request);
        // dd($ListaDeCalificaion);
        for ($i=0; $i < count($ListaDeCalificaion); $i++) { 
            DB::update('UPDATE EvaluacionEstudiante 
            SET NotaEvaluacion=? 
            WHERE IdEvaluacionEstudiante=?', array($ListaDeCalificaion[$i]["Nota"],$ListaDeCalificaion[$i]["IdCalificacion"]));
        }

        return redirect('/Calificaciones');
    }    
    
    public function ActualizarNota(Request $request)
    {
        $txtIdCalificacion = $request['txtIdCalificacion'];
        $txtNota = $request['txtNota'];

        DB::update('UPDATE EvaluacionEstudiante 
        SET NotaEvaluacion=? 
        WHERE IdEvaluacionEstudiante=?', array($txtNota,$txtIdCalificacion));

        return redirect('/Calificaciones');
    }
}
