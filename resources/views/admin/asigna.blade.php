@extends('template.aaron.plantilla')
@section('title', 'Administrativo | Historial')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <a id="regresar" name="regresar" class="btn btn-info" style="float: right"
           href="{{ route('admin_notificar') }}">Regresar</a>
        <br><br>
        <div class="card">
            <div class="container">
                <div class="card-body">
                    <h2>Creacion de Grupos</h2>
                    @if(session('warning'))
                        <div class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Advertencia!</strong> <a href="#" class="alert-link">La acción no se ha ejecutado de
                                manera
                                correcta </a><br>
                            {{ session('warning') }}
                        </div>
                    @endif
                    @if(count(\App\Model\Grupo::all())==0)
                        <form action="asignarDocentes" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $grupo1 }}" name="grupo1" id="grupo1">
                            <input type="hidden" value="{{ $grupo2 }}" name="grupo2" id="grupo2">
                            <input type="hidden" value="{{ $grupo3 }}" name="grupo3" id="grupo3">
                            <h5>Grupos de 1° Grado</h5>
                            @for ($i = 0; $i < $grupo1; $i++)
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label for="grado1{{ $i }}">Grado:</label>
                                        <input type="text" class="form-control" id="grado1{{ $i }}" value="1"
                                               name="grado1{{ $i }}" disabled="true">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="aula1{{ $i }}">Aula:</label>
                                        <input type="text" class="form-control" id="aula1{{ $i }}"
                                               placeholder="Introduce Aula del Grupo" required
                                               name="aula1{{ $i }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="docente1{{ $i }}">Docente:</label>
                                        <select class="form-control" name="docente1{{ $i }}">
                                            <option value="0">Selecciona un docente</option>
                                            @foreach($docente as $docent)
                                                <option value="{{ $docent->id }}">{{ $docent->nombre.' '.$docent->apellidoP.' '.$docent->apellidoM }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>
                            @endfor
                            <br>
                            <h5>Grupos de 2° Grado</h5>
                            @for ($i = 0; $i < $grupo2; $i++)
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label for="grado2{{ $i }}">Grado:</label>
                                        <input type="text" class="form-control" id="grado2{{ $i }}" value="2"
                                               name="grado2{{ $i }}" disabled="true">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="aula2{{ $i }}">Aula:</label>
                                        <input type="text" class="form-control" id="aula2{{ $i }}"
                                               placeholder="Introduce Aula del Grupo"
                                               name="aula2{{ $i }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="docente2{{ $i }}">Docente:</label>
                                        <select class="form-control" name="docente2{{ $i }}">
                                            <option value="0">Selecciona un docente</option>
                                            @foreach($docente as $docent)
                                                <option value="{{ $docent->id }}">{{ $docent->nombre.' '.$docent->apellidoP.' '.$docent->apellidoM }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>
                            @endfor
                            <br>
                            <h5>Grupos de 3° Grado</h5>
                            @for ($i = 0; $i < $grupo3; $i++)
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label for="grado3{{ $i }}">Grado:</label>
                                        <input type="text" class="form-control" id="grado3{{ $i }}" value="3"
                                               name="grado3{{ $i }}" disabled="true">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="aula3{{ $i }}">Aula:</label>
                                        <input type="text" class="form-control" id="aula3{{ $i }}"
                                               placeholder="Introduce Aula del Grupo"
                                               name="aula3{{ $i }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="docente3{{ $i }}">Docente:</label>
                                        <select class="form-control" name="docente3{{ $i }}">
                                            <option value="0">Selecciona un alumno</option>
                                            @foreach($docente as $docent)
                                                <option value="{{ $docent->id }}">{{ $docent->nombre.' '.$docent->apellidoP.' '.$docent->apellidoM }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endfor
                            <button type="submit" class="btn btn-success" style="float: right">Asignar Grupos</button>
                            <br><br>
                        </form>
                    @else
                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div style="text-align: center">
                                <strong>Advertencia!</strong> <br>La acción no se ha ejecutado de
                                manera
                                correcta<br><br>
                                <h5>Los Grupos ya han sido creados</h5>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection