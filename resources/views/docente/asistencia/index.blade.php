@extends('template.aaron.plantilla')
@section('title', 'Docente | Asistencia')

@section('content')
    @if(count(\App\Model\Grupo::all())>0)
        <!-- Page Content  -->
        <div id="content">
            <div class="container">
                <button id="consultar" name="consultar" class="btn btn-info" style="float: right">Consultar fechas
                    anteriores
                </button>
                <br><br>
                <div class="card">
                    <div class="container">
                        <br>
                        @if(session('notification'))
                            <div class="alert alert-dismissible alert-warning" style="margin-bottom: 0px">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Alerta! </strong><br>
                                {{ session('notification') }}
                            </div>
                        @endif
                        @if(session('asistencia_warning'))
                            <div class="alert alert-dismissible alert-warning" style="margin-bottom: 0px">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Alerta! </strong><br>
                                {{ session('asistencia_warning') }}
                            </div>
                        @endif
                        <h1 style="text-align: center;">Lista de asistencia</h1>
                        <h2 style="text-align: center;">Jardin de Niños: "Profa. Ma. Luisa Ballina Escartin" </h2>
                        <img class="card-img-top" src="{{ asset('img/niños.png') }}" alt="Card image"
                             style="width:100%">
                        <div class="card-body">
                            <h5 style="float:right;"><i class="fa fa-calendar"></i><span> {{ date('d/M/Y') }}</span>
                            </h5>
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


                    @if( $realizada == 0 )
                        <form action="asistencia/guardar" method="POST">
                            {{ csrf_field() }}
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
                                            <select class="form-control" name="asistencia{{ $student->alumnos->id }}">
                                                <option value="0">Selecciona una opción</option>
                                                <option value="1">Asistio</option>
                                                <option value="2">No asistio</option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="container">
                                <button class="btn btn-success" style="float: right;" type="submit">Guardar</button>
                            </div>
                            <br>
                            <br>
                        </form>
                    @else
                        <div class="alert alert-dismissible alert-info text-center" style="margin-bottom: 0px">
                            <h4>Ya pasaste lista el dia de hoy</h4>
                            <p style="color: black">Recuerda que solo puedes registrar asistencia de tu grupo una vez al
                                dia.</p>
                        </div>
                    @endif
                </div>
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
    @endif
@endsection

@section('scripts')
    <script src="{{ asset('js/aaron.js') }}"></script>
@endsection