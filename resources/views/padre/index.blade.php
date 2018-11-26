@extends('template.aaron.plantilla')
@section('title', 'Tutor | Inicio')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <a id="regresar" name="regresar" class="btn btn-info" style="float: right" href="{{ route('padre_login') }}">Regresar</a>
            <br><br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <h3>Datos del alumno</h3>
                        <h5>Nombre del Alumno: {{ $tutor->nombre.' '.$tutor->apellidoP.' '.$tutor->apellidoM }}</h5>
                        <h5>Numero de Control: {{ $tutor->no_control }}</h5>
                        <h5>Grupo: {{ $tutor->grupoAlumno->first()->grupo->id }}</h5>
                        <h5>Grado: {{ $tutor->grado }}</h5>
                        <h5>CURP: {{ $tutor->curp }}</h5>
                        <h5>Dirección:</h5>
                        <p>{{ $tutor->calle.' No. '.$tutor->no_ext.', '.$tutor->colonia.', '.$tutor->municipio }}</p>
                        <br><br>
                        <h5>Reporte de Evaluación</h5>
                        <form action="descargaReporteEvaluacion" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $tutor->id }}" id="alumno_id" name="alumno_id">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-file-pdf"></i><span> Generar PDF</span>
                            </button>
                        </form>
                    </div>
                    <div class="col-md-7">
                        <h3>Anuncios</h3>
                        <table class="table" id="anuncios_alumno">
                            <thead class="thead-dark">
                            <tr>
                                <th>Anuncio</th>
                                <th>Información</th>
                                <th>Fecha de Publicación</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($anuncios_generales as $anuncio)
                                <tr>
                                    <td>{{ $anuncio->nombre }}</td>
                                    <td>{{ $anuncio->informacion }}</td>
                                    <td>{{ $anuncio->created_at }}</td>
                                </tr>
                            @endforeach
                            @foreach($anuncios_especificos as $anuncio)
                                <tr>
                                    <td>{{ $anuncio->nombre }}</td>
                                    <td>{{ $anuncio->informacion }}</td>
                                    <td>{{ $anuncio->created_at }}</td>
                                </tr>
                            @endforeach
                            @foreach($anuncios_grupales as $anuncio)
                                <tr>
                                    <td>{{ $anuncio->nombre }}</td>
                                    <td>{{ $anuncio->informacion }}</td>
                                    <td>{{ $anuncio->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection