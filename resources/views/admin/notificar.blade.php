@extends('template.aaron.plantilla')
@section('title', 'Administrativo | Notificaciones')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <h2><img src="{{ asset('img/bell.png') }}" style="width: 95px;"> Notificaciones a Padres</h2>
            <br>
            <a href="HistorialNotificaciones" class="btn btn-info" style="float: right">Historial de Anuncios</a>
            <br>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#general">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#alumno">Alumno</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#grupo">Grupo</a>
                </li>
            </ul>
            @if(session('notification'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ session('notification') }}! </strong>
                </div>
            @endif

        <!-- Tab panes -->
            <div class="tab-content">
                <div id="general" class="container tab-pane active"><br>
                    <h3>Anuncio General</h3>
                    <p>Este anuncio sera publicado en todos lo grupos de cualquier grado.</p>
                    <div class="card">
                        <div class="card-body">
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
                            <form action="anuncio/general" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="titulo">Titulo:</label>
                                            <input type="text" class="form-control" id="titulo"
                                                   placeholder="Introduce el nombre del anuncio"
                                                   name="titulo">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="importancia">Importancia:</label>
                                            <select class="form-control" name="importancia">
                                                <option>Selecciona una opción</option>
                                                <option value="1">Alta</option>
                                                <option value="2">Media</option>
                                                <option value="3">Baja</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción:</label>
                                            <textarea class="form-control" id="descripcion"
                                                      name="descripcion"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones:</label>
                                            <textarea class="form-control" id="observaciones"
                                                      name="observaciones"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" style="float: right;" @if(count($grupos)==0) disabled @endif>Publicar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="alumno" class="container tab-pane fade"><br>
                    <h3>Anuncio Especifico</h3>
                    <p>Este anuncio puede ser publicado a un alumno en especifico.</p>
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="nav nav-pills flex-column">
                                    @foreach($grupos as $grupo)
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill"
                                               href="#grupo{{ $grupo->id }}">Grupo: {{ $grupo->id }}
                                                Aula: {{ $grupo->aula }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="container tab-pane active">
                                            <div class="alert alert-dismissible alert-primary">
                                                <strong>Selecciona un grupo! </strong><br>
                                            </div>
                                        </div>
                                        @foreach($grupos as $grupo)
                                            <div id="grupo{{ $grupo->id }}" class="container tab-pane fade">
                                                <h3>{{ 'Grupo: '.$grupo->id }}</h3>
                                                <h4>{{ 'Aula: '.$grupo->aula }}</h4>
                                                <p>{{ 'No. Alumnos: '.$grupo->grupoAlumno->count() }}</p>
                                                <table class="table" id="lista_asistencias">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th>No. Control</th>
                                                        <th>Nombre Completo</th>
                                                        <th>Anuncio</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($grupo->grupoAlumno as $student)
                                                        <tr>
                                                            <td>{{ $student->alumnos->no_control }}</td>
                                                            <td>{{ $student->alumnos->nombre .' '. $student->alumnos->apellidoP .' '. $student->alumnos->apellidoM }}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-info"
                                                                        title="Anuncio"
                                                                        data-anuncio="{{ $student->alumno_id }}">
                                                                    <span class="fa fa-pencil"></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="grupo" class="container tab-pane fade"><br>
                    <h3>Anuncio por Grupo</h3>
                    <p>Este anuncio es publicado por grupo.</p>
                    <div class="card">
                        <div class="card-body">
                            <form action="anuncio/grupo" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="grupo">Grupo:</label>
                                    <select class="form-control" name="grupo" id="grupo">
                                        <option value="0">Selecciona el grupo</option>
                                        @foreach($grupos as $grupo)
                                            <option value="{{ $grupo->id }}">{{ $grupo->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="titulo">Titulo:</label>
                                            <input type="text" class="form-control" id="titulo"
                                                   placeholder="Introduce el nombre del anuncio"
                                                   name="titulo">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="importancia">Importancia:</label>
                                            <select class="form-control" name="importancia">
                                                <option>Selecciona una opción</option>
                                                <option value="1">Alta</option>
                                                <option value="2">Media</option>
                                                <option value="3">Baja</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción:</label>
                                            <textarea class="form-control" id="descripcion"
                                                      name="descripcion"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones:</label>
                                            <textarea class="form-control" id="observaciones"
                                                      name="observaciones"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" style="float: right;">Publicar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="AnuncioAlumnoModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Publicar Anuncio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <form action="anuncio/alumno" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="student_id" value="" id="student_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="titulo">Titulo:</label>
                                    <input type="text" class="form-control" id="titulo"
                                           placeholder="Introduce el nombre del anuncio"
                                           name="titulo">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="importancia">Importancia:</label>
                                    <select class="form-control" name="importancia">
                                        <option>Selecciona una opción</option>
                                        <option value="1">Alta</option>
                                        <option value="2">Media</option>
                                        <option value="3">Baja</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <textarea class="form-control" id="descripcion"
                                              name="descripcion"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="observaciones">Observaciones:</label>
                                    <textarea class="form-control" id="observaciones"
                                              name="observaciones"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Publicar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('scripts')
    <script src="{{ asset('js/aaron2.js') }}"></script>
@endsection