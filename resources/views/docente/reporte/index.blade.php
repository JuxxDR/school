@extends('template.aaron.plantilla')
@section('title', 'Docente | Reportes')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <h2><img src="{{ asset('img/reporte.png') }}" style="width: 90px;"> Reportes de Evaluación</h2>
            <br>
            <div class="card">
                <div class="card-body">
                    @if(session('notification'))
                        <div class="alert alert-dismissible alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Correcto</strong> <a href="#" class="alert-link">La acción se ha ejecutado de manera
                                correcta </a>
                            {{ session('notification') }}
                        </div>
                    @endif
                        @if(session('warning_reporte'))
                            <div class="alert alert-dismissible alert-warning">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Incorrecto</strong> <a href="#" class="alert-link">La acción no se ha ejecutado de manera
                                    correcta </a><br>
                                {{ session('warning_reporte') }}
                            </div>
                        @endif
                    @if(count($errors)>0)
                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Oh no!</strong> <a href="#" class="alert-link">Comprueba si los datos
                                introducidos son
                                correctos </a> e intentalo de nuevo.
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="reporte/alumno" method="POST">
                        {{ csrf_field() }}
                        <div class="row" style="color: black">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="alumnos">Alumnos:</label>
                                    <select class="form-control" name="alumnos">
                                        <option value="0">Selecciona un alumno</option>
                                        @foreach($students as $student)
                                            <option value="{{ $student->alumnos->id }}">{{ $student->alumnos->nombre.' '.$student->alumnos->apellidoP.' '.$student->alumnos->apellidoM }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="trimestre">Trimestre:</label>
                                    <select class="form-control" id="trimestre" name="trimestre">
                                        <option value="0">Trimestre</option>
                                        @if(count(\App\model\Trimestre::all())!=0)
                                            @if(count(\App\model\Trimestre::where('trimestre',3)->get())!=0)
                                                <option value="1">Primer Trimestre</option>
                                                <option value="2">Segundo Trimestre</option>
                                                <option value="3">Tercer Trimestre</option>
                                            @elseif(count(\App\model\Trimestre::where('trimestre',2)->get())!=0)
                                                <option value="1">Primer Trimestre</option>
                                                <option value="2">Segundo Trimestre</option>
                                            @elseif(count(\App\model\Trimestre::where('trimestre',1)->get())!=0)
                                                <option value="1">Primer Trimestre</option>
                                            @endif
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-info" style="float: right" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
            <br>
            <br>
            <div class="card">
                <table class="table" id="lista_asistencias">
                    <thead class="thead-dark">
                    <tr>
                        <th>No. Control</th>
                        <th>Nombre Completo</th>
                        <th>PDF</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->alumnos->no_control }}</td>
                            <td>{{ $student->alumnos->nombre .' '. $student->alumnos->apellidoP .' '. $student->alumnos->apellidoM }}</td>
                            <td>
                                <a href="reporte/{{ $student->alumnos->id }}" class="btn btn-sm btn-danger"
                                   title="PDF"><i class="fa fa-file-pdf"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection