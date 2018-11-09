@extends('template.aaron.plantilla')
@section('title', 'Administrativo | Docentes')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <h2>Reportes de Evaluación</h2>
            <br>
            <div class="card">
                <div class="card-body">
                    @foreach($grupos as $grupo)
                        <h3>{{ 'Grupo: '.$grupo->id }}</h3>
                        <h4>{{ 'Aula: '.$grupo->aula }}</h4>
                        <p>{{ 'No. Alumnos: '.$grupo->grupoAlumno->count() }}</p>
                        <table class="table" id="lista_asistencias">
                            <thead class="thead-dark">
                            <tr>
                                <th>No. Control</th>
                                <th>Nombre Completo</th>
                                <th>Reporte de Evaluación</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($grupo->grupoAlumno as $student)
                                <tr>
                                    <td>{{ $student->alumnos->no_control }}</td>
                                    <td>{{ $student->alumnos->nombre .' '. $student->alumnos->apellidoP .' '. $student->alumnos->apellidoM }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" title="Anuncio"
                                                data-anuncio="{{ $student->alumno_id }}">
                                            <span class="fa fa-pencil"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection