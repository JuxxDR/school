@extends('template.aaron.plantilla')
@section('title', 'Administrativo | Historial')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <a id="regresar" name="regresar" class="btn btn-info" style="float: right" href="{{ route('admin_notificar') }}">Regresar</a>
        <br><br>
        <div class="card">
            <div class="card-header">
                <h2>Historial de Anuncios Publicados</h2>
            </div>
            <div class="card-body">
                <h3>Anuncios Generales</h3>
                <table class="table" id="lista_anuncios">
                    <thead class="thead-dark">
                    <tr>
                        <th>Anuncio</th>
                        <th>Descripción</th>
                        <th>Fecha de Publicación</th>
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
                <h3>Anuncios Grupales</h3>
                <table class="table" id="lista_anuncios_grupales">
                    <thead class="thead-dark">
                    <tr>
                        <th>Anuncio</th>
                        <th>Descripción</th>
                        <th>Grupo</th>
                        <th>Fecha de Publicación</th>
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
                <h3>Anuncios Especificos</h3>
                <table class="table" id="lista_anuncios_especificos">
                    <thead class="thead-dark">
                    <tr>
                        <th>Anuncio</th>
                        <th>Descripción</th>
                        <th>Alumno</th>
                        <th>Fecha de Publicación</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($anuncios_especificos as $anuncio)
                        <tr>
                            <td>{{ $anuncio->nombre }}</td>
                            <td>{{ $anuncio->informacion }}</td>
                            <td>{{ $anuncio->alumno_id }}</td>
                            <td>{{ $anuncio->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection