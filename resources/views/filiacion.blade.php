@extends('layouts.app')
@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Filiacion del Estudinte</h1>
          </div><!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div> -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registro de Estudiantes a una clase</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('IngresarClaseEstudiante') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                  <!-- @//dd(($ListaClases)) -->
                  <!-- @//dd(($ListaEstudiantes)) -->
                      <div class="form-group">
                        <label>Estudiante</label>
                        <select class="form-control" name="txtProfesor">
									      @foreach($ListaEstudiantes as $Estudiante)
                          <option value="{{ $Estudiante->IdEstudiante }}">{{ $Estudiante->PrimerNombre }} {{ $Estudiante->ApellidoPaterno }}</option>
									      @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Clase</label>
                        <select class="form-control" name="txtProfesor">
									      @foreach($ListaClases as $Clase)
                          <option value="{{ $Clase->IdMateria }}">{{ $Clase->Materia }}</option>
									      @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="cancel" class="btn btn-warning">Cancelar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection