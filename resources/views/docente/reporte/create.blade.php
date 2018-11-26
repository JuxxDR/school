@extends('template.aaron.plantilla')
@section('title', 'Docente | Reportes')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <a id="regresar" name="regresar" class="btn btn-info" style="float: right"
               href="{{ route('docente_reportes') }}">Regresar</a>
            <br><br>
            <div class="card">
                <div class="card-body">
                    <h3>Reportes de Evaluación</h3>
                    @if(session('notification'))
                        <div class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Alerta! </strong><br>
                            {{ session('notification') }}
                        </div>
                    @endif
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
                    <br>
                    <form action="evaluacionAlumno" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $alumno_id }}" name="alumno_id" id="alumno_id">
                        <input type="hidden" value="{{ $trimestre }}" name="trimestre" id="trimestre">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="lenguaje">Lenguaje y Comunicación:</label>
                                    <textarea class="form-control" id="lenguaje"
                                              name="lenguaje" required
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="matematico">Pensamiento matematico:</label>
                                    <textarea class="form-control" id="matematico"
                                              name="matematico" required
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exploracion">Exploración y Conocimiento del Mundo:</label>
                                    <textarea class="form-control" id="exploracion"
                                              name="exploracion" required
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fisico">Desarrollo Fisico y Salud:</label>
                                    <textarea class="form-control" id="fisico"
                                              name="fisico" required
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="social">Desarrollo Personal y Social:</label>
                                    <textarea class="form-control" id="social"
                                              name="social" required
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" style="float: right">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection