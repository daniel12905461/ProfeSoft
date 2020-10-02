<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Estudiante;
use App\Curso;

class EstudianteControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListaEstudiantes = Estudiante::all();
        $ListaCursos = Curso::all();
        return view('Estudiante', compact('ListaEstudiantes','ListaCursos'));
        // return view('/Estudiante', ['ListaEstudiantes' => $ListaEstudiantes, 'ListaCursos'=> $ListaCursos]);
        //
        // $TipoPersonas = TipoPersona::all();
        // $Personas = Persona::with('tipoPersona')->paginate();
        // return view('personas.index', compact('Personas','TipoPersonas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validarDatos = $this->validate($request,[
            'txtPrimerNombre' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'max:100'],
            'txtApellidoPaterno' => 'required',
            'txtApellidoMaterno' => 'required',
            'txtNacimiento' => 'required',
        ]);
        // dd($validarDatos);
        $estudiante = new Estudiante();
        $estudiante->PrimerNombre = $request['txtPrimerNombre'];
        $estudiante->SegundoNombre = $request['txtSegundoNombre'];
        $estudiante->ApellidoPaterno = $request['txtApellidoPaterno'];
        $estudiante->ApellidoMaterno = $request['txtApellidoMaterno'];
        $estudiante->CiEstudiante = $request['txtCi'];
        $estudiante->Genero = $request['txtGenero'];
        $estudiante->FechaNacimiento = $request['txtNacimiento'];
        $estudiante->IdCurso = $request['txtCurso'];
        $saved = $estudiante->save();
        // dd($saved);

        return redirect()->route('estudiantes.index')->with(array(
            'message' => 'Se guardo el Estudiante correctamente',
            // 'saved'=> $saved
        ));
        // return redirect()->route('personas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estudiante  $persona
     * @return \Illuminate\Http\Estudiante
     */
    public function show($IdEstudiante)
    {
        $estudiante = DB::select('SELECT *
            FROM Estudiante e JOIN Curso c ON e.IdCurso=c.IdCurso
            AND e.IdEstudiante=?',[$IdEstudiante]);
        // $estudiante = Estudiante::find($IdEstudiante);

        return response()->json([
            'estudiante' => $estudiante[0]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estudiante  $persona
     * @return \Illuminate\Http\Estudiante
     */
    public function edit($IdEstudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estudiante  $persona
     * @return \Illuminate\Http\Estudiante
     */
    public function update(Request $request,$id)
    {
        //
        $IdEstudiante = $request['txtIdEstudianteAct'];

        $validarDatos = $this->validate($request,[
            'txtPrimerNombreAct' => 'required',
            'txtApellidoPaternoAct' => 'required',
            'txtApellidoMaternoAct' => 'required',
            'txtNacimientoAct' => 'required',
        ]);

        $estudiante = Estudiante::find($IdEstudiante);
        $estudiante->PrimerNombre = $request['txtPrimerNombreAct'];
        $estudiante->SegundoNombre = $request['txtSegundoNombreAct'];
        $estudiante->ApellidoPaterno = $request['txtApellidoPaternoAct'];
        $estudiante->ApellidoMaterno = $request['txtApellidoMaternoAct'];
        $estudiante->CiEstudiante = $request['txtCiAct'];
        $estudiante->Genero = $request['txtGeneroAct'];
        $estudiante->FechaNacimiento = $request['txtNacimientoAct'];
        $estudiante->IdCurso = $request['txtCursoAct'];
        $estudiante->save();

        // return redirect()->route('estudiantes.index');
        return redirect()->route('estudiantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estudiante  $persona
     * @return \Illuminate\Http\Estudiante
     */
    public function destroy(Request $request,$id)
    {
        //
        $estudiante = Estudiante::find($request['txtIdEstudianteEli']);
        $estudiante->delete();
        return redirect()->route('estudiantes.index');
    }
}
