@extends('layouts.app')
@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <!-- <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Materias</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div> -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
				<!-- /.row -->
        <div class="row">
          <div class="col-12">

            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Calificar</h3>

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="text-sm" style="flex: 1 1 auto;
                                          padding-top: 0.25rem;
                                          padding-right: 1.25rem;
                                          padding-bottom: 0.10rem;
                                          padding-left: 1.25rem;
                                          font-size: smaller;">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Curso</label>
                      <select class="form-control" name="txtCurso" id="txtCurso" style="height: 23px; padding: 0px; font-size: small;">
                      @foreach($ListaCursos as $Curso)
                        <option value="{{ $Curso->IdCurso }}">{{ $Curso->Curso }}-{{ $Curso->Grado }}-{{ $Curso->Paralelo }}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Materia</label>
                      <select class="form-control" name="txtMateria" id="txtMateria" style="height: 23px; padding: 0px; font-size: small;">
                      @foreach($ListaMaterias as $Materia)
                        <option value="{{ $Materia->IdMateria }}">{{ $Materia->Materia }}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Trimestre</label>
                      <select class="form-control" name="txtTrimestre" id="txtTrimestre" style="height: 23px; padding: 0px; font-size: small;">
                      @foreach($ListaTrimestres as $Tirmestre)
                        <option value="{{ $Tirmestre->IdTrimestre }}">{{ $Tirmestre->Trimestre }}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                  <!-- <div class="col-sm-3">
                    <div class="form-group">
                      <label>Dimencion</label>
                      <select class="form-control" name="txtDimencion" id="txtDimencion">
                      @foreach($ListaDimenciones as $Dimencion)
                        <option value="{{ $Dimencion->IdDimencion }}">{{ $Dimencion->Dimencion }}</option>
                      @endforeach
                      </select>
                    </div>
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table class="table-bordered table" style="width: 100%; margin-bottom: 8px;">
                      <tr>
                        <th class="badge bg-success" style="width: 33.3%; padding: 5px;">SABER = 45</th>
                        <th class="badge bg-warning" style="width: 33.3%; padding: 5px;">HACER = 45</th>
                        <th class="badge bg-primary" style="width: 33.3%; padding: 5px;">SER Y DECIDIR = 10</th>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
							<div class="card-body table-responsive p-0" style="height: 400px;">
                <!--estile  text-nowrap colspan="3" rowspan="2" table-head-fixed-->
                <table class="table table-head-fixed table-bordered table-hover">
                  <thead id="thead">
                    <tr>
                      <th style="padding: 0px; text-align: center; width:40px; max-width: 40px">
                        #
                      </th>
                      <th style="padding: 0px; text-align: center; width:300px; max-width: 300px;">
                        Nombre del Estudiante
                      </th>
									    @foreach($ListaEValuacionesSABER as $Evaluacion)
                      <th style="height: 100px; width:30px; max-width: 30px;  padding: 0px; text-align: center; font-size: 11px; background-color: #28a745;">
                        <span style="writing-mode: tb; transform: rotate(180deg); font-weight: 400;"><a href="" class="Evaluacion" style="color: white;" data-toggle="modal" data-target="#modal-default" value="{{ $Evaluacion->IdEvaluacion }}">{{ $Evaluacion->Evaluacion }}</a></span>
                      </th>
									    @endforeach
                      <th style="height: 100px; width:30px; max-width: 30px;  padding: 0px; text-align: center; font-size: 11px;">
                        <span style="writing-mode: tb; transform: rotate(180deg);">PRODUCTO DEL SABER</span>
                      </th>
									    @foreach($ListaEValuacionesHACER as $Evaluacion)
                      <th style="height: 100px; width:30px; max-width: 30px;  padding: 0px; text-align: center; font-size: 11px; background-color: #ffc107;">
                        <span style="writing-mode: tb; transform: rotate(180deg); font-weight: 400;"><a href="" class="Evaluacion" style="color: black;" data-toggle="modal" data-target="#modal-default" value="{{ $Evaluacion->IdEvaluacion }}">{{ $Evaluacion->Evaluacion }}</a></span>
                      </th>
									    @endforeach
                      <th style="height: 100px; width:30px; max-width: 30px;  padding: 0px; text-align: center; font-size: 11px;">
                        <span style="writing-mode: tb; transform: rotate(180deg);">PRODUCTO DEL HACER</span>
                      </th>
									    @foreach($ListaEValuacionesDECIDIR as $Evaluacion)
                      <th style="height: 100px; width:30px; max-width: 30px;  padding: 0px; text-align: center; font-size: 11px; background-color: #007bff;">
                        <span style="writing-mode: tb; transform: rotate(180deg); font-weight: 400;"><a href="" class="Evaluacion" style="color: white;" data-toggle="modal" data-target="#modal-default" value="{{ $Evaluacion->IdEvaluacion }}">{{ $Evaluacion->Evaluacion }}</a></span>
                      </th>
									    @endforeach
                      <th style="height: 100px; width:30px; max-width: 30px;  padding: 0px; text-align: center; font-size: 11px;">
                        <span style="writing-mode: tb; transform: rotate(180deg);">PRODUCTO DEL SER Y DECIDIR</span>
                      </th>
                      <th style="height: 100px; width:30px; max-width: 30px;  padding: 0px; text-align: center; font-size: 11px; background-color: #6c757d;">
                        <span style="writing-mode: tb; transform: rotate(180deg);">PROMEDIO BIMESTRE</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
									@foreach($ListaEValuacionesEstudiante as $key => $Estudiante)
                    <tr>
                      <td style="padding: 0px; text-align: center;">{{ $key+1 }}</td>
                      <td style="padding: 0px; text-align: center;">{{ $Estudiante["PrimerNombre"] }} {{ $Estudiante["SegundoNombre"] }} {{ $Estudiante["ApellidoPaterno"] }} {{ $Estudiante["ApellidoMaterno"] }}</td>
                      @for ($j=0; $j < $CantidadNotas; $j++)
                        <td style="padding: 0px; text-align: center;">{!! $Estudiante[$j] !!}</td>
                      @endfor
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

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="NombreEvaluacionGrande">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('ActualizarNotasPorEvaluacion') }}" method="POST">
            @csrf
            <div class="modal-body">
              <!-- <p>One fine body&hellip;</p> -->
              <div class="card-body table-responsive p-0" style="height: 400px;">
                <table class="table table-head-fixed table-bordered table-hover">
                  <THead>
                    <tr>
                      <th>#</th>
                      <th>Estudiante</th>
                      <th>Nota</th>
                    </tr>
                  </THead>
                  <tbody id="TblaModalEvaluacion">
                    <!-- <tr>
                      <td></td>
                      <td>Daniel Delgado Camacho</td>
                      <td><input type="number" value="10" style="text-align: center; width: 40px;"></td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar o Cancelar</button>
              <button type="sudmit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="NombreEvaluacionPequenio">Small Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('ActualizarNota') }}" method="POST">
            @csrf
            <div class="modal-body">
              <!-- <p>One fine body&hellip;</p> -->
							<div class="card-body table-responsive p-0" style="height: 100px;">
                <table class="table table-head-fixed table-bordered table-hover">
                  <THead>
                    <tr>
                      <th>Estudiante</th>
                      <th>Nota</th>
                    </tr>
                  </THead>
                  <tbody id="TblaModalEvaluacionPeque">
                    <!-- <tr>
                      <td>Daniel Delgado Camacho</td>
                      <td><input type="number" value="10" style="text-align: center; width: 40px;"></td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar o Cancelar</button>
              <button type="sudmit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    </section>
    <!-- /.content -->
  </div>
	<!-- /.content-wrapper -->
	
<!-- jQuery -->
<!-- <script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script> -->
@endsection