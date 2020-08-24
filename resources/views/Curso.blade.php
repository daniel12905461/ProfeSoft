@extends('layouts.app')
@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Curso</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
				<!-- /.row -->
        <div class="row">
          <div class="col-12">

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registrar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('IngresarCurso') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Curso</label>
                        <input type="text" class="form-control" id="txtCurso" placeholder="Nobre del Curso" name="txtCurso" required>
                      </div>
                      <div class="form-group">
                        <label>Grado</label>
                        <select class="form-control" name="txtGrado">
                          <option value="Primario">Primario</option>
                          <option value="Secundario">Secundario</option>
                        </select>
                      </div>
                    </div>
                  <!-- @//dd(($ListaProfesores)) -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Paralelo</label>
                        <select class="form-control" name="txtParalelo">
                          <option value="A">A</option>
                          <option value="B">B</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Profesor</label>
                        <select class="form-control" name="txtProfesor">
									      @foreach($ListaProfesores as $Profesor)
                          <option value="{{ $Profesor->IdProfesor }}">{{ $Profesor->PrimerNombre }} {{ $Profesor->ApellidoPaterno }}</option>
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

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Cursos</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
							<div class="card-body table-responsive p-0" style="height: 400px;">
								<!--estile  text-nowrap -->
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Curso</th>
                      <th>Paralelo</th>
                      <th>Nivel</th>
                      <th>Profesor</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <!-- @//dd(($ListaCursos)) -->
									@foreach($ListaCursos as $Curso)
                    <tr>
                      <td>{{ $Curso->IdCurso }}</td>
                      <td>{{ $Curso->Curso }}</td>
                      <td>{{ $Curso->Paralelo }}</td>
                      <td>{{ $Curso->Grado }}</td>
                      <td>{{ $Curso->PrimerNombre }} {{ $Curso->SegundoNombre }} {{ $Curso->ApellidoPaterno }} {{ $Curso->ApellidoMaterno }}</td>
                      <td><button></button></td>
                    </tr>
									@endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
	<!-- /.content-wrapper -->
	
<!-- jQuery -->
<script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
@endsection