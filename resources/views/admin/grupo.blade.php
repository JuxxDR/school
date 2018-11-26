@extends('template.aaron.plantilla')
@section('title', 'Administrativo | Docentes')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <h2>Administrar Grupos</h2>
            <br>
            <div class="card">
                <table class="table" id="lista_docentes">
                    <thead class="thead-dark">
                    <tr>
                        <th>No. Grupo</th>
                        <th>Aula</th>
                        <th>Grado</th>
                        <th>Docente</th>
                        <th>Alumnos</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($grupos as $grupo)
                        <tr>
                            <td>{{ $grupo->id }}</td>
                            <td>{{ $grupo->aula }}</td>
                            <td>{{ $grupo->grado }}</td>
                            <td>{{ \App\Model\Docente::where('id',$grupo->docente_id)->first()->nombre.' '.\App\Model\Docente::where('id',$grupo->docente_id)->first()->apellidoP.' '.\App\Model\Docente::where('id',$grupo->docente_id)->first()->apellidoM }}</td>
                            <td>{{ $grupo->grupoAlumno->count() }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info" title="Editar"
                                        data-grupo="{{ $grupo->id }}">
                                    <span class="fa fa-pencil"></span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="GrupoModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Docente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <form action="asistencia/consultarFecha" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Continuar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('scripts')
    <script src="{{ asset('js/aaron.js') }}"></script>
@endsection