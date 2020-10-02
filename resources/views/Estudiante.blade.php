@extends('layouts.app')
@section('content')
{{-- ================================================Validaciones============================= --}}
  <script type="application/javascript">
    let ifError = 0;
    let ErrorType = "";
  </script>
  @if(Session('message'))
    <script type="application/javascript">
      ifError = 2;
      ErrorType = '';
    </script>
  @endif
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

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Estudiantes</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-Agregar">Agregar</button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
							<div class="card-body table-responsive p-0" style="height: 425px;">
								<!--estile  text-nowrap -->
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Ci</th>
                      <th>Genero</th>
                      <th>Fecha de Naci</th>
                      <th>Curso</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
									@foreach($ListaEstudiantes as $i=>$Estudiante)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $Estudiante->PrimerNombre }} {{ $Estudiante->SegundoNombre }} {{ $Estudiante->ApellidoPaterno }} {{ $Estudiante->ApellidoMaterno }}</td>
                      <td>{{ $Estudiante->CiEstudiante }}</td>
                      <td>{{ $Estudiante->Genero }}</td>
                      <td>{{ $Estudiante->FechaNacimiento }}</td>
                      <td>{{ $Estudiante->curso->Curso }}</td>
                      <td>
                        <a href="" type="button" class="btn btn-xs btn-info small ClassVerEstudent" data-toggle="modal" data-target="#modal-lg-VerMas" value="{{ $Estudiante->IdEstudiante }}" title="Ver Mas"><i class="fas fa-eye"></i></a>
                        <a href="" type="button" class="btn btn-xs btn-warning small ClassActuEstudent" data-toggle="modal" data-target="#modal-lg" value="{{ $Estudiante->IdEstudiante }}" title="Actualizar"><i class="fas fa-edit"></i></a>
                        <a href="" type="button" class="btn btn-xs btn-danger small ClassEliminarEstudent" data-toggle="modal" data-target="#modal-danger" value="{{ $Estudiante->IdEstudiante }}" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
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



  <div class="modal fade" id="modal-Agregar">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">Registrar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- form start -->
        <form action="{{ route('estudiantes.store') }}" method="POST">
          @csrf
          @if($errors -> any())
            @foreach($errors->all() as $error)
              <script type="application/javascript">
                ifError = 1;
                ErrorType = '{{ $error }}';
              </script>
            @endforeach
          @endif
          <div class="modal-body">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Primer Nombre</label>
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
                      <option value="2">Femenino</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="txtNacimiento" name="txtNacimiento" required>
                  </div>
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
          </div>
          <div class="modal-footer justify-content-between">
            <button type="cancel" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
          <!-- /.card-body -->
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->




  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h4 class="modal-title">Actualizar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- form start -->
        <form action="{{ route('estudiantes.update',1) }}" method="POST">
          @csrf
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" id="txtIdEstudianteAct" name="txtIdEstudianteAct">
          <div class="modal-body">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Primer Nombre</label>
                      <input type="text" class="form-control" id="txtPrimerNombreAct" placeholder="Primer Nombre" name="txtPrimerNombreAct" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Segundo Nombre</label>
                      <input type="text" class="form-control" id="txtSegundoNombreAct" placeholder="Segundo Nombre" name="txtSegundoNombreAct">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Apellido Paterno</label>
                      <input type="text" class="form-control" id="txtApellidoPaternoAct" placeholder="Apellido Paterno" name="txtApellidoPaternoAct" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Apellido Materno</label>
                      <input type="text" class="form-control" id="txtApellidoMaternoAct" placeholder="Apellido Materno" name="txtApellidoMaternoAct"required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ci</label>
                      <input type="text" class="form-control" id="txtCiAct" placeholder="Ci" name="txtCActi">
                    </div>
                    <div class="form-group">
                      <label>Genero</label>
                      <select class="form-control" name="txtGeneroAct" id="txtGeneroAct">
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Fecha de Nacimiento</label>
                      <input type="date" class="form-control" id="txtNacimientoAct" name="txtNacimientoAct" required>
                    </div>
                    <div class="form-group">
                      <label>Curso</label>
                      <select class="form-control" name="txtCursoAct" id="txtCursoAct">
                      @foreach($ListaCursos as $Curso)
                        <option value="{{ $Curso->IdCurso }}">{{ $Curso->Curso }}-{{ $Curso->Grado }}-{{ $Curso->Paralelo }}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="cancel" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
          <!-- /.card-body -->
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-lg-VerMas">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Estudiante</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="VerMasEst">

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Aceptar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-danger">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Eliminar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('estudiantes.destroy',1) }}" method="POST">
          @method('DELETE')
          @csrf
          <input type="hidden" id="txtIdEstudianteEli" name="txtIdEstudianteEli">
          <div class="modal-body" id="VerMasEst">
            <p>Deseas eliminar al Estudiante? &hellip;</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button  type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-outline-light">Si</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

@endsection
