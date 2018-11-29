@extends('template.aaron.plantilla')
@section('title', 'Administrativo | Docentes')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <h2><img src="{{ asset('img/manage.png') }}" style="width: 115px;"> Administración de Docentes y Grupos</h2>
            @if(count(\App\Model\Grupo::all())!=count(\App\Model\Docente::where('role',1)->get()))
                <br>
                <a class="btn btn-info" title="Crear Grupo" href="grupos/crear" style="float: right">Crear Grupos</a>
                <br>
            @endif
            <br>
            <div class="card">
                @if(session('warning'))
                    <div class="alert alert-dismissible alert-warning" style="margin-bottom: 0px;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Advertencia! </strong> <a href="#" class="alert-link">La acción no se ha ejecutado de
                            manera
                            correcta </a><br>
                        {{ session('warning') }}
                    </div>
                @endif
                @if(session('notification'))
                    <div class="alert alert-dismissible alert-success" style="margin-bottom: 0px;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Informacion! </strong> <a href="#" class="alert-link">La acción se ha ejecutado de
                            manera
                            correcta </a><br>
                        {{ session('notification') }}
                    </div>
                @endif
                @if(count($errors)>0)
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Oh no!</strong> <a href="#" class="alert-link">Comprueba si los datos introducidos son
                            correctos </a> e intentalo de nuevo.
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <table class="table" id="lista_docentes" style="margin-top: 0px;">
                    <thead class="thead-dark">
                    <tr>
                        <th>Nombre del Docente</th>
                        <th>Email</th>
                        <th>Grupo</th>
                        <th>Aula</th>
                        <th>Grado</th>
                        <th>Alumnos</th>
                        <th style="width: 150px;">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($docentes as $docente)
                        <tr>
                            <td>{{ $docente->id }}
                                .- {{ $docente->nombre .' '. $docente->apellidoP .' '. $docente->apellidoM }}</td>
                            <td>{{ $docente->email }}</td>
                            @if(\App\Model\Grupo::where('docente_id',$docente->id)->first())
                                <td>{{ \App\Model\Grupo::where('docente_id',$docente->id)->first()->id }}</td>
                                <td>{{ \App\Model\Grupo::where('docente_id',$docente->id)->first()->aula }}</td>
                                <td>{{ \App\Model\Grupo::where('docente_id',$docente->id)->first()->grado }}</td>
                                <td>{{ count(\App\Model\GrupoAlumno::where('grupo_id',\App\Model\Grupo::where('docente_id',$docente->id)->first()->id)->get()) }}</td>
                            @else
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                            @endif
                            <td>
                                <button type="button" class="btn btn-sm btn-info" title="Editar"
                                        data-docente="{{ $docente->id }}">
                                    <span class="fa fa-pencil"></span>
                                </button>
                                <a class="btn btn-sm btn-danger" title="Eliminar"
                                   href="eliminarD/{{ $docente->id }}"><span class="fa fa-remove"></span></a>
                                @if(count(\App\Model\Grupo::all())==count(\App\Model\Docente::where('role',1)->get()))
                                    <a class="btn btn-sm btn-success" title="Ver Grupo"
                                       href="grupo/{{ $docente->id }}"><span class="fa fa-group"></span></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            @if(count(\App\Model\Grupo::all())==0)
                <h2><img src="{{ asset('img/add.png') }}" style="width: 90px;"> Agregar Docente</h2>
                <br>
                <div class="card">
                    <div class="card-body">
                        @if(session('notification_crear'))
                            <div class="alert alert-dismissible alert-info" style="margin-bottom: 0px;">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Correcto</strong> <a href="#" class="alert-link">La acción se ha ejecutado de
                                    manera
                                    correcta </a><br>
                                {{ session('notification_crear') }}
                            </div>
                        @endif
                        <form action="docentes/crear" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="name">Nombre:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Introduce Nombre"
                                           name="name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="apellidoP">Apellido Paterno:</label>
                                    <input type="text" class="form-control" id="apellidoP"
                                           placeholder="Introduce Apellido Paterno"
                                           name="apellidoP">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="apellidoM">Apellido Materno:</label>
                                    <input type="text" class="form-control" id="apellidoM"
                                           placeholder="Introduce Apellido Materno"
                                           name="apellidoM">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email2">Email:</label>
                                    <input type="text" class="form-control" id="email2" placeholder="Introduce email"
                                           name="email2">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password2">Contraseña:</label>
                                    <input type="text" class="form-control" id="password2"
                                           placeholder="Introduce Contraseña"
                                           name="password2" value="{{ str_random(8) }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" style="float: right">Guardar Docente</button>
                        </form>
                    </div>
                </div>
            @endif
            <br>
            <h2><img src="{{ asset('img/reporte.png') }}" style="width: 90px;"> Reportes de Evaluacion</h2>
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            @if(count(\App\model\Trimestre::all())!=0)
                                @if(\App\model\Trimestre::where('trimestre',3)->first())

                                @elseif(\App\model\Trimestre::where('trimestre',2)->first())
                                    <a class="btn btn-success" href="tercerTrimestre">Habilitar Tercer Trimestre</a>
                                @elseif(\App\model\Trimestre::where('trimestre',1)->first())
                                    <a class="btn btn-success" href="segundoTrimestre">Habilitar Segundo Trimestre</a>
                                @endif
                            @else
                                <a class="btn btn-success" href="primerTrimestre">Habilitar Primer Trimestre</a>
                            @endif
                        </div>
                        <div class="col-md-9">
                            @if(count(\App\model\Trimestre::all())!=0)
                                @if(\App\model\Trimestre::where('trimestre',3)->first())
                                    <div class="alert alert-dismissible alert-info" style="margin-bottom: 0px;">
                                        <strong>Tercer trimestre habilitado</strong>
                                    </div>
                                @elseif(\App\model\Trimestre::where('trimestre',2)->first())
                                    <div class="alert alert-dismissible alert-info" style="margin-bottom: 0px;">
                                        <strong>Segundo trimestre habilitado</strong>
                                    </div>
                                @elseif(\App\model\Trimestre::where('trimestre',1)->first())
                                    <div class="alert alert-dismissible alert-info" style="margin-bottom: 0px;">
                                        <strong>Primer trimestre habilitado</strong>
                                    </div>
                                @endif
                            @else
                                <div class="alert alert-dismissible alert-info" style="margin-bottom: 0px;">
                                    <strong>No has habilitado ningun trimestre para evaluación!</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="DocenteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Docente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <form action="actualizar/docente" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="col-md-12">
                            <input type="hidden" name="docente_id" value="" id="docente_id">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email"
                                       name="email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Contraseña<em style="font-size: 8pt;">(Opcional)</em> :</label>
                                <input type="password" class="form-control" id="password"
                                       placeholder="Introduce la nueva contraseña"
                                       name="password">
                            </div>
                        </div>
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
    <script src="{{ asset('js/docente.js') }}"></script>
@endsection