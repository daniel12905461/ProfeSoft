@extends('layouts.app')
@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Estudiante</h1>
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
                <h3 class="card-title">Registro de Estudiantes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('IngresarClase') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nombr</label>
                        <input type="text" class="form-control" id="txtPrimerNombre" placeholder="Primer Nombre" name="txtPrimerNombre" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Segundo Nombre</label>
                        <input type="text" class="form-control" id="txtSegundoNombre" placeholder="Segundo Nombre" name="txtSegundoNombre">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Apellido Paterno</label>
                        <input type="text" class="form-control" id="txtApellidoPaterno" placeholder="Apellido Paterno" name="txtApellidoPaterno" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Apellido Materno</label>
                        <input type="text" class="form-control" id="txtApellidoMaterno" placeholder="Apellido Materno" name="txtApellidoMaterno"required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Ci</label>
                        <input type="text" class="form-control" id="txtCi" placeholder="Ci" name="txtCi">
                      </div>
                      <div class="form-group">
                        <label>Genero</label>
                        <select class="form-control" name="txtGenero">
                          <option value="1">Masculino</option>
                          <option value="0">Femenino</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="txtNacimiento" name="txtNacimiento" required>
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
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Ci</th>
                      <th>Genero</th>
                      <th>Fecha de Naci</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
									@foreach($ListaEstudiantes as $Estudiante)
                    <tr>
                      <td>{{ $Estudiante->IdEstudiante }}</td>
                      <td>{{ $Estudiante->PrimerNombre }} {{ $Estudiante->SegundoNombre }} {{ $Estudiante->ApellidoPaterno }} {{ $Estudiante->ApellidoMaterno }}</td>
                      <td>{{ $Estudiante->CiEstudiante }}</td>
                      <td>{{ $Estudiante->Genero }}</td>
                      <td>{{ $Estudiante->FechaNacimiento }}</td>
                      <td>
                          <a type="button" class="btn btn-info small">Actualizar</a>
                          <a href="{{ url('eliminarEstudiante/' . $Estudiante->IdEstudiante) }}" type="button" class="btn btn-danger small">Eliminar</a>
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