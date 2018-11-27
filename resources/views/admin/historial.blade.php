@extends('template.aaron.plantilla')
@section('title', 'Administrativo | Historial')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <h3><img src="{{ asset('img/historial.png') }}" style="width: 95px;"> Historial de Anuncios</h3>
            <a id="regresar" name="regresar" class="btn btn-info" style="float: right"
               href="{{ route('admin_notificar') }}">Regresar</a>
            <br>
            <br>
            <div class="card">
                <div class="card-body">
                    <h5>Anuncios Generales</h5>
                    @if(count($anuncios)!=0)
                        <table class="table" id="lista_anuncios">
                            <thead class="thead-dark">
                            <tr>
                                <th>Anuncio</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($anuncios as $anuncio)
                                <tr>
                                    <td>{{ $anuncio->nombre }}</td>
                                    <td>{{ $anuncio->informacion }}</td>
                                    <td>{{ $anuncio->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-dismissible alert-primary">
                            <strong>No has publicado ningun anuncio general! </strong><br>
                        </div>
                    @endif
                    <h5>Anuncios Grupales</h5>
                    @if(count($anuncios_grupales)!=0)
                        <table class="table" id="lista_anuncios_grupales">
                            <thead class="thead-dark">
                            <tr>
                                <th>Anuncio</th>
                                <th>Descripción</th>
                                <th>Grupo</th>
                                <th>Fecha</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($anuncios_grupales as $anuncio)
                                <tr>
                                    <td>{{ $anuncio->nombre }}</td>
                                    <td>{{ $anuncio->informacion }}</td>
                                    <td>{{ $anuncio->grupo_id }}</td>
                                    <td>{{ $anuncio->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-dismissible alert-primary">
                            <strong>No has publicado ningun anuncio grupal! </strong><br>
                        </div>
                    @endif
                    <h5>Anuncios Especificos</h5>
                    @if(count($anuncios_especificos)!=0)
                        <table class="table" id="lista_anuncios_especificos">
                            <thead class="thead-dark">
                            <tr>
                                <th>Anuncio</th>
                                <th>Descripción</th>
                                <th>Alumno</th>
                                <th>Fecha</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($anuncios_especificos as $anuncio)
                                <tr>
                                    <td>{{ $anuncio->nombre }}</td>
                                    <td>{{ $anuncio->informacion }}</td>
                                    <td>{{ \App\Model\Alumno::find($anuncio->alumno_id)->no_control }}</td>
                                    <td>{{ $anuncio->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-dismissible alert-primary">
                            <strong>No has publicado ningun anuncio especifico! </strong><br>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection