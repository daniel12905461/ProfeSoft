@extends('layouts.app')
@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Evaluaciones</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
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
                <h3 class="card-title">Registro</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('IngresarEvaluacion') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Curso</label>
                        <select class="form-control" name="txtCurso" id="txtCurso">
									      @foreach($ListaCursos as $Curso)
                          <option value="{{ $Curso->IdCurso }}">{{ $Curso->Curso }}-{{ $Curso->Grado }}-{{ $Curso->Paralelo }}</option>
									      @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Materia</label>
                        <select class="form-control" name="txtMateria" id="txtMateria">
									      @foreach($ListaMaterias as $Materia)
                          <option value="{{ $Materia->IdMateria }}">{{ $Materia->Materia }}</option>
									      @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Trimestre</label>
                        <select class="form-control" name="txtTrimestre" id="txtTrimestre">
									      @foreach($ListaTrimestres as $Tirmestre)
                          <option value="{{ $Tirmestre->IdTrimestre }}">{{ $Tirmestre->Trimestre }}</option>
									      @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Dimencion</label>
                        <select class="form-control" name="txtDimencion" id="txtDimencion">
									      @foreach($ListaDimenciones as $Dimencion)
                          <option value="{{ $Dimencion->IdDimencion }}">{{ $Dimencion->Dimencion }}</option>
									      @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nombre de la Evaluacion</label>
                        <input type="text" class="form-control" id="txtEvaluacion" placeholder="Evaluacion" name="txtEvaluacion" required>
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
                <h3 class="card-title">Fixed Header Table</h3>

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
							<div class="card-body table-responsive p-0" style="height: 300px;">
								<!--estile  text-nowrap -->
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Evaluacion</th>
                      <th>Dimencion</th>
                      <th>Trimestre</th>
                      <th>Materia</th>
                      <th>Curso</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <!-- @//dd(($ListaEValuaciones)) -->
									@foreach($ListaEValuaciones as $Evaluacion)
                    <tr>
                      <td>{{ $Evaluacion->IdEvaluacion }}</td>
                      <td>{{ $Evaluacion->Evaluacion }}</td>
                      <td>{{ $Evaluacion->Dimencion }}</td>
                      <td>{{ $Evaluacion->Trimestre }}</td>
                      <td>{{ $Evaluacion->Materia }}</td>
                      <td>{{ $Evaluacion->Curso }}</td>
                      <td>
                          <a type="button" class="btn btn-info small">Actualizar</a>
                          <a href="{{ url('eliminarEstudiante/' . $Evaluacion->IdEvaluacion) }}" type="button" class="btn btn-danger small">Eliminar</a>
                      </td>
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
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection