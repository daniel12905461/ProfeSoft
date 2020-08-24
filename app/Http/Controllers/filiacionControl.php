<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class filiacionControl extends Controller
{
    //
    public function Listar()
    {
        $ListaClases = DB::select('select * from Materia');
        $ListaEstudiantes = DB::select('select * from Estudiante');
        return view('/filiacion', ['ListaClases' => $ListaClases,'ListaEstudiantes' => $ListaEstudiantes]);
    }
}
