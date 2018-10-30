@extends('template.aaron.plantilla')
@section('title', 'Docente | Asistencia')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <button id="consultar" name="consultar" class="btn btn-info" style="float: right">Consultar fechas anteriores</button>
            <br><br>
            <div class="card">
                <div class="container">
                    <br>
                    <h1 style="text-align: center;">Lista de asistencia</h1>
                    <h2 style="text-align: center;">Jardin de Niños: "Profa. Ma. Luisa Ballina Escartin" </h2>
                    <img class="card-img-top" src="{{ asset('img/niños.png') }}" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h5 style="float:right;"><i class="fa fa-calendar"></i><span> {{ date('d/M/Y') }}</span></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Codigo de Grupo </h5>
                                <p>{{ $docente->grupo->id }}</p>
                            </div>
                            <div class="col-md-3 col-md-offset-4">
                                <h5>No. Alumnos: </h5>
                                <p>{{ $numero_alumnos }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <h5>Nombre de Docente: </h5>
                                <p>{{ $docente->nombre.' '.$docente->apellidoP.' '.$docente->apellidoM }}</p>
                            </div>
                            <div class="col-md-3">
                                <h5>No. Docente: </h5>
                                <p>{{ $docente->id }}</p>
                            </div>
                            <div class="col-md-2">
                                <h5>Aula: </h5>
                                <p>{{ $docente->grupo->aula }}</p>
                            </div>
                            <div class="col-md-2">
                                <h5>Grado: </h5>
                                <p>{{ $docente->grupo->grado }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if(session('notification'))
                    <div class="alert alert-dismissible alert-warning" style="margin-bottom: 0px">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Alerta! </strong><br>
                        {{ session('notification') }}
                    </div>
                @endif
                @if( $realizada == 0 )
                    <table class="table" id="lista_asistencias">
                        <thead class="thead-dark">
                        <tr>
                            <th>No. Control</th>
                            <th>Nombre Completo</th>
                            <th>Asistencia</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->alumnos->no_control }}</td>
                                <td>{{ $student->alumnos->nombre .' '. $student->alumnos->apellidoP .' '. $student->alumnos->apellidoM }}</td>
                                <td>
                                    @if( !\App\Model\Asistencia::where('alumno_id',$student->alumnos->id)->where('fecha',date('Y-m-d'))->first() )
                                        <a href="{{ $student->alumnos->id }}/asistencia" class="btn btn-sm btn-success"
                                           title="Asistio">
                                            <i class="fa fa-check"></i>
                                        </a>
                                        <a href="{{ $student->alumnos->id }}/noAsistencia" class="btn btn-sm btn-danger"
                                           title="No asistio">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    @else
                                        <a href="{{ $student->alumnos->id }}/modificarAsistencia"
                                           class="btn btn-sm btn-info"
                                           title="Modificar">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-dismissible alert-info text-center" style="margin-bottom: 0px">
                        <h4>Ya pasaste lista el dia de hoy</h4>
                        <p style="color: black">Recuerda que solo puedes registrar asistencia de tu grupo una vez al
                            dia.</p>
                        <p style="text-align: right;font-size: 11pt;color: black;">Si deseas consultar las listas de
                            asistencia, puedes hacerlo dando click <strong><a href=""
                                                                              style="color: dodgerblue">aqui</a></strong>.
                        </p>
                    </div>
                @endif
            </div>
            @if( $realizada == 0 )
                <a class="btn btn-primary" style="float: right;" href="asistencia/guardar">Guardar</a>
            @endif
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="FechaModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Fechas anteriores</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <form action="asistencia/consultarFecha" method="POST">
                    {{ csrf_field() }}
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
@endsection

@section('scripts')
    <script src="{{ asset('js/aaron.js') }}"></script>
@endsection