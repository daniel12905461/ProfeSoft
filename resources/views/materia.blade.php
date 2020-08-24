@extends('layouts.app')
@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Materias</h1>
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
              <form action="{{ route('IngresarMateria') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nombre de la Materia</label>
                        <input type="text" class="form-control" id="txtMateria" placeholder="Nobre de la Materia" name="txtMateria" required>
                      </div>
                    </div>
                  <!-- @//dd(($ListaProfesores)) -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Curso</label>
                        <select class="form-control" name="txtCurso">
									      @foreach($ListaCursos as $Curso)
                          <option value="{{ $Curso->IdCurso }}">{{ $Curso->Curso }}-{{ $Curso->Grado }}-{{ $Curso->Paralelo }}</option>
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
                <h3 class="card-title">Lista de Materias</h3>

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
							<div class="card-body table-responsive p-0" style="height: 200px;">
								<!--estile  text-nowrap -->
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Materia</th>
                      <th>Curso</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($ListaMaterias as $Materia)
                    <tr>
                      <td>{{ $Materia->IdMateria }}</td>
                      <td>{{ $Materia->Materia }}</td>
                      <td>{{ $Materia->Curso }}-{{ $Materia->Grado }}-{{ $Materia->Paralelo }}</td>
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