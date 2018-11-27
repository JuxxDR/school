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
        <div class="container">
            <a id="regresar" name="regresar" class="btn btn-info" style="float: right"
               href="{{ route('padre_login') }}">Regresar</a>
            <br><br>
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <h3>Datos del alumno <img class="" src="{{ asset('img/datos.png') }}"
                                                          style="width:95px">
                                </h3>
                                <h5><i class="fa fa-user-circle-o"></i> Nombre del
                                    Alumno: {{ $tutor->nombre.' '.$tutor->apellidoP.' '.$tutor->apellidoM }}</h5>
                                <h5><i class="fa fa-user-circle"></i> Numero de Control: {{ $tutor->no_control }}</h5>
                                <h5><i class="fa fa-group"></i> Grupo: {{ $tutor->grupoAlumno->first()->grupo->id }}
                                </h5>
                                <h5><i class="fa fa-book"></i> Grado: {{ $tutor->grado }}</h5>
                                <h5><i class="fa fa-database"></i> CURP: {{ $tutor->curp }}</h5>
                                <h5><i class="fa fa-address-book"></i> Dirección:</h5>
                                <p> {{ $tutor->calle.' No. '.$tutor->no_ext.', '.$tutor->colonia.', '.$tutor->municipio }}</p>
                                <br><br>
                                <h5>Reporte de Evaluación <img class="" src="{{ asset('img/reporte.png') }}"
                                                               style="width:95px"></h5>
                                <form action="descargaReporteEvaluacion" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $tutor->id }}" id="alumno_id" name="alumno_id">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-file-pdf"></i><span> Generar PDF</span>
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-7">
                                <h3>Anuncios <img class="" src="{{ asset('img/anuncio.png') }}"
                                                  style="width:105px"></h3>
                                @if(count($anuncios_generales)==0&&count($anuncios_especificos)==0&&count($anuncios_grupales)==0)
                                    <div class="alert alert-dismissible alert-primary">
                                        <strong>No tienes ningún anuncio! </strong><br>
                                    </div>
                                @else
                                    <table class="table" id="anuncios_alumno">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>Anuncio</th>
                                            <th>Información</th>
                                            <th>Observaciones</th>
                                            <th>Publicación</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($anuncios_generales as $anuncio)
                                            <tr>
                                                <td>{{ $anuncio->nombre }}</td>
                                                <td>{{ $anuncio->informacion }}</td>
                                                <td>@if($anuncio->observaciones) {{ $anuncio->observaciones }} @else No
                                                    existen observaciones @endif</td>
                                                <td>{{ $anuncio->created_at }}</td>
                                                <td>@if($anuncio->importancia==1)
                                                        <button class="btn-sm btn-danger" disabled><i
                                                                    class="fa fa-info"></i>
                                                        </button> @elseif($anuncio->importancia==2)
                                                        <button class="btn-sm btn-warning" disabled><i
                                                                    class="fa fa-info"></i></button> @else
                                                        <button class="btn-sm btn-info" disabled><i
                                                                    class="fa fa-info"></i></button> @endif</td>
                                            </tr>
                                        @endforeach
                                        @foreach($anuncios_especificos as $anuncio)
                                            <tr>
                                                <td>{{ $anuncio->nombre }}</td>
                                                <td>{{ $anuncio->informacion }}</td>
                                                <td>@if($anuncio->observaciones) {{ $anuncio->observaciones }} @else No
                                                    existen observaciones @endif</td>
                                                <td>{{ $anuncio->created_at }}</td>
                                                <td>@if($anuncio->importancia==1)
                                                        <button class="btn-sm btn-danger" disabled><i
                                                                    class="fa fa-info"></i>
                                                        </button> @elseif($anuncio->importancia==2)
                                                        <button class="btn-sm btn-warning" disabled><i
                                                                    class="fa fa-info"></i></button> @else
                                                        <button class="btn-sm btn-info" disabled><i
                                                                    class="fa fa-info"></i></button> @endif</td>
                                            </tr>
                                        @endforeach
                                        @foreach($anuncios_grupales as $anuncio)
                                            <tr>
                                                <td>{{ $anuncio->nombre }}</td>
                                                <td>{{ $anuncio->informacion }}</td>
                                                <td>@if($anuncio->observaciones) {{ $anuncio->observaciones }} @else No
                                                    existen observaciones @endif</td>
                                                <td>{{ $anuncio->created_at }}</td>
                                                <td>@if($anuncio->importancia==1)
                                                        <button class="btn-sm btn-danger" disabled><i
                                                                    class="fa fa-info"></i>
                                                        </button> @elseif($anuncio->importancia==2)
                                                        <button class="btn-sm btn-warning" disabled><i
                                                                    class="fa fa-info"></i></button> @else
                                                        <button class="btn-sm btn-info" disabled><i
                                                                    class="fa fa-info"></i></button> @endif</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection