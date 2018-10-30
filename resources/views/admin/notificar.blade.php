@extends('template.aaron.plantilla')
@section('title', 'Administrativo | Notificaciones')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <h2>Notificaciones a Padres</h2>
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
                                <button type="submit" class="btn btn-success" style="float: right;">Publicar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="alumno" class="container tab-pane fade"><br>
                    <h3>Anuncio Especifico</h3>
                    <p>Este anuncio puede ser publicado a un alumno en especifico.</p>
                    <div class="card">
                        <div class="card-body">
                            <form>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="grupo">Grupo:</label>
                                    <select class="form-control" name="grupo">
                                        <option>Selecciona el grupo</option>
                                    </select>
                                </div>
                            </form>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th>No. Control</th>
                                    <th>Nombre Completo</th>
                                    <th>Asistencia</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
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
                                        <option>Selecciona el grupo</option>
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
    </div>
@endsection