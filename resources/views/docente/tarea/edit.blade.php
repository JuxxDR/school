@extends('template.aaron.plantilla')
@section('title', 'Docente | Registro de Tarea')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <div class="card">
                <div class="container">
                    <br>
                    <h1 style="text-align: center;">Registro de Tarea</h1>
                    <h2 style="text-align: center;">Jardin de Niños: "Profa. Ma. Luisa Ballina Escartin" </h2>
                    <br>
                    <img class="card-img-overlay" src="{{ asset('img/registro.png') }}" alt="Card image"
                         style="width:170px">
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
            @if(session('confirmation'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Información </strong><br>
                    {{ session('confirmation') }}
                </div>
            @endif
            @if( true )
                <form>
                    <table class="table" id="lista_asistencias">
                        <thead class="thead-dark">
                        <tr>
                            <th>No. Control</th>
                            <th>Nombre Completo</th>
                            <th style="text-align: center">Aceptable</th>
                            <th style="text-align: center">Medio</th>
                            <th style="text-align: center">Deficiente</th>
                            <th style="text-align: center">No Entregado</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->alumnos->no_control }}</td>
                                <td>{{ $student->alumnos->nombre .' '. $student->alumnos->apellidoP .' '. $student->alumnos->apellidoM }}</td>
                                <td style="text-align: center">
                                    <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="">
                                    </div>
                                </td>
                                <td style="text-align: center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" value="">
                                    </div>
                                </td>
                                <td style="text-align: center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" value="">
                                    </div>
                                </td>
                                <td style="text-align: center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" value="">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-success" style="float: right;" type="submit">Guardar</button>
                </form>
            @else
                <div class="alert alert-dismissible alert-info text-center">

                </div>
            @endif
        </div>
    </div>
@endsection