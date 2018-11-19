@extends('template.aaron.plantilla')
@section('title', 'Docente | Reportes')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3>Reportes de Evaluación</h3>
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
                                        @if(\App\model\Trimestre::all()->first()->trimestre==3)
                                            <option value="1">Primer Trimestre</option>
                                            <option value="2">Segundo Trimestre</option>
                                            <option value="3">Tercer Trimestre</option>
                                        @endif
                                        @if(\App\model\Trimestre::all()->first()->trimestre==2)
                                            <option value="1">Primer Trimestre</option>
                                            <option value="2">Segundo Trimestre</option>
                                        @endif
                                        @if(\App\model\Trimestre::all()->first()->trimestre==1)
                                            <option value="1">Primer Trimestre</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-info" style="float: right" type="submit">Buscar</button>
                    </form>
                    <br>
                    <br>
                    <table class="table" id="lista_asistencias">
                        <thead class="thead-dark">
                        <tr>
                            <th>No. Control</th>
                            <th>Nombre Completo</th>
                            <th>Editar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->alumnos->no_control }}</td>
                                <td>{{ $student->alumnos->nombre .' '. $student->alumnos->apellidoP .' '. $student->alumnos->apellidoM }}</td>
                                <td>
                                    <a>Ver Reporte</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection