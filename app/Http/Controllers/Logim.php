<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Logim extends Controller
{
	//
	public function index()
	{
		$Grupo_Almacen = DB::select('select * from profesor;');

		return view('/GrupoAlmasen', ['Grupo_Almacen' => $Grupo_Almacen]);
	}

	public function logim(Request $request)
	{
		$user=$request['user'];
		if ($user==""){
			return back()
				->withErrors(['user' => 'LLenar este campo'])
				->withImput(request(['user']));
		}
		$password=$request['password'];
		if ($password==''){
			return back()
				->withErrors(['password' => 'LLenar este campo'])
				->withInput(request(['user']));
		}

		$Datos = DB::select('SELECT CONCAT(p.apellidoPaterno," ",p.apellidoMaterno," ",p.primerNombre," ",p.segundoNombre) as NombreProfesor ,p.IdProfesor ,p.Contrasenia FROM Profesor p WHERE p.Usuario=?',array($user));
		// dd($Datos[0]->Contrasenia);

		if (isset($Datos[0]->Contrasenia)){
			if ($Datos[0]->Contrasenia == $password) {
				session(['Daniel'=>'Admin']);
				return redirect('/Estudiante');
			}else{
				// return redirect('/');
				return back()->withErrors(['password' => 'Contraseña incorrecta'])
				->withInput(request(['user']));
			}
		}else{
			return back()->withErrors(['user' => 'Usuario no válido'])
			->withInput(request(['user']));
		}
	}
}
