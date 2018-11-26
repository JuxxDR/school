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
                    @if(session('notification'))
                        <div class="alert alert-dismissible alert-info" style="margin-bottom: 0px;">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Correcto</strong> <a href="#" class="alert-link">La acción se ha ejecutado de manera
                                correcta </a><br>
                            {{ session('notification') }}
                        </div>
                    @endif
                    @if(count(\App\model\Trimestre::all())!=0)
                        @if(\App\model\Trimestre::where('trimestre',1)->first())
                            <a class="btn btn-success" href="segundoTrimestre">Habilitar Segundo Trimestre</a>
                        @elseif(\App\model\Trimestre::where('trimestre',2)->first())
                            <a class="btn btn-success" href="tercerTrimestre">Habilitar Tercer Trimestre</a>
                        @endif
                    @else
                        <a class="btn btn-success" href="primerTrimestre">Habilitar Primer Trimestre</a>
                    @endif
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