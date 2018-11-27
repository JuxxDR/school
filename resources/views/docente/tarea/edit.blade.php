@extends('template.aaron.plantilla')
@section('title', 'Docente | Registro de Tarea')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <a id="regresar" name="regresar" class="btn btn-info" style="float: right"
               href="{{ route('tarea_inicio') }}">Regresar</a>
            <br><br>
            @if(session('warning_tarea'))
                <div class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Alerta! </strong><br>
                    {{ session('warning_tarea') }}
                </div>
            @endif
            <div class="card">
                <div class="container">
                    <br>
                    <h1 style="text-align: center;">Registro de Tarea <img src="{{ asset('img/registro.png') }}"
                                                                           alt="Card image"
                                                                           style="width:110px"></h1>
                    <h2 style="text-align: center;">Jardin de Niños: "Profa. Ma. Luisa Ballina Escartin" </h2>
                    <br>
                    <div class="card-body">
                        <h5 style="float:right;"><i class="fa fa-calendar"></i><span> {{ date('d/M/Y') }}</span></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Codigo de Tarea </h5>
                                <p>{{ $tarea->id }}</p>
                            </div>
                            <div class="col-md-3 col-md-offset-4">
                                <h5>Nombre de Tarea: </h5>
                                <p>{{ $tarea->nombre }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <h5>Descripción: </h5>
                                <p>{{ $tarea->descripcion }}</p>
                            </div>
                            <div class="col-md-3">
                                <h5>Fecha de Entrega: </h5>
                                <p>{{ $tarea->fecha_entrega }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(session('notification'))
                <div class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Alerta! </strong><br>
                    {{ session('notification') }}
                </div>
            @endif
            @if( !\App\Model\EntregaTarea::where('tarea_id',$tarea->id)->first() )
                <br>
                <div class="card">
                    <form action="registro" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="tarea_id" value="{{ $tarea->id }}" id="tarea_id">
                        <table class="table" id="lista_asistencias">
                            <thead class="thead-dark">
                            <tr>
                                <th>No. Control</th>
                                <th>Nombre Completo</th>
                                <th style="text-align: center">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->alumnos->no_control }}</td>
                                    <td>{{ $student->alumnos->nombre .' '. $student->alumnos->apellidoP .' '. $student->alumnos->apellidoM }}</td>
                                    <input type="hidden" name="student_id{{ $student->alumnos->id }}"
                                           value="{{ $student->alumnos->id }}"
                                           id="student_id">
                                    <td style="text-align: center">
                                        <select class="form-control" name="entrega{{ $student->alumnos->id }}">
                                            <option>Selecciona una opción</option>
                                            <option value="1">Aceptable</option>
                                            <option value="2">Medio</option>
                                            <option value="3">Deficiente</option>
                                            <option value="4">No entregado</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="container">
                            <button class="btn btn-success" style="float: right;" type="submit">Guardar</button>
                        </div>
                        <br><br>
                    </form>
                </div>
            @else
                <div class="alert alert-dismissible alert-info text-center">
                    <h2>Ya registraste esta tarea</h2>
                </div>
            @endif
        </div>
    </div>
@endsection