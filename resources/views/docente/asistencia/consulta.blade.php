@extends('template.aaron.plantilla')
@section('title', 'Asistencia | Consulta')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <a id="regresar" name="regresar" class="btn btn-info" style="float: right"
               href="{{ route('asistencia_inicio') }}">Regresar</a>
            <br><br>
            <div class="card">
                <div class="card-body">
                    <h3>Consulta de Asistencia</h3>
                    <form action="descargaPDF" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $fecha_elegida }}" id="fecha" name="fecha">
                        <button type="submit" class="btn btn-danger" style="float:right;"><i class="fa fa-file-pdf"></i><span> Generar PDF</span>
                        </button>
                    </form>
                    <h5><i class="fa fa-calendar"></i><span> {{ $fecha_elegida }}</span></h5>
                </div>
            </div>
            <br>
            <div class="card">
                <div>
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
                                    @if( $student->alumnos->asistencias->where('fecha',$fecha_elegida)->first()->asistio == "si" )
                                        <button class="btn btn-sm btn-success"
                                                title="Asistio">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-danger"
                                                title="No asistio">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                    @endif
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