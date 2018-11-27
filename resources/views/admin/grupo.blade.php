@extends('template.aaron.plantilla')
@section('title', 'Administrativo | Docentes')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <h2><img class="" src="{{ asset('img/grupos.png') }}"
                     style="width:105px"> Grupos</h2>
            <a class="btn btn-info" title="Regresar" href="{{ route('admin_docentes') }}"
               style="float: right">Regresar</a>
            <br><br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><i class="fa fa-user-circle-o"></i>
                                Docente: {{ $docente->nombre.' '.$docente->apellidoP.' '.$docente->apellidoM }}</h5>
                        </div>
                        <div class="col-md-3">
                            <h5><i class="fa fa-group"></i>
                                Grupo: {{ \App\Model\Grupo::where('docente_id',$docente->id)->first()->id }}</h5>
                        </div>
                        <div class="col-md-3">
                            <h5><i class="fa fa-book"></i> No. Alumnos: {{ count($students) }}</h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            <h6>Reporte de Asistencias</h6>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-sm btn-info" title="Reporte de Asistencia" id="asistenciaG" name="asistenciaG">
                                <span class="fa fa-address-book"></span>
                            </button>
                        </div>
                        <div class="col-md-2">
                            <h6>Reporte de Tareas</h6>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-sm btn-success" title="Reporte de Tareas" id="tareaG" name="tareaG">
                                <span class="fa fa-bar-chart"></span>
                            </button>
                        </div>
                    </div>
                    @if(count($errors)>0)
                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Oh no! Comprueba si los datos
                                introducidos son
                                correctos  e intentalo de nuevo.</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <br>
            <div class="card">
                <table class="table" id="lista_docentes">
                    <thead class="thead-dark">
                    <tr>
                        <th>No. Control</th>
                        <th>Nombre Completo</th>
                        <th>Evaluación</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->alumnos->no_control }}</td>
                            <td>{{ $student->alumnos->nombre .' '. $student->alumnos->apellidoP .' '. $student->alumnos->apellidoM }}</td>
                            <td>
                                <a href="reporte/{{ $student->alumnos->id }}" class="btn btn-sm btn-danger"
                                   title="Reporte de Evaluación"><i class="fa fa-file-pdf"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="FechaModalG">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Fechas anteriores</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <form action="asistencia/consultarFecha" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $docente->id }}" name="docente_id" id="docente_id">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="fecha">Fecha:</label>
                            <select name="fecha" id="fecha" class="form-control">
                                <option value="0">Selecciona una fecha anterior</option>
                                @foreach($fechas as $fecha)
                                    <option value="{{ $fecha->fecha_entrega }}">{{ $fecha->fecha_entrega }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Continuar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="TareaModalG">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tareas Registradas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <form action="tarea/registro" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $docente->id }}" name="docente_id" id="docente_id">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="fecha">Tarea:</label>
                            <select name="tarea_id" id="tarea_id" class="form-control">
                                <option value="0">Selecciona una tarea</option>
                                @foreach($tareas as $tarea)
                                    <option value="{{ $tarea->id }}">{{ $tarea->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Continuar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endsection