@extends('template.aaron.plantilla')
@section('title', 'Docente | Asistencia')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            @if(session('notification'))
                <div class="alert alert-dismissible alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Información </strong><br>
                    {{ session('notification') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-8">
                    <h2>Lista de asistencia</h2>
                </div>
            </div>
            <p>Recuerda pasar lista todos los dias de clase.</p>
            <a href="" class="btn btn-info" style="float: right">Consultar fechas anteriores</a>
            <br><br>
            <div class="card">
                <div class="container">
                    <div class="card-body">
                        <h5 style="float:right;"><i class="fa fa-calendar"></i><span> {{ date('d/M/Y') }}</span></h5>
                        <div class="row">
                            <div class="col-md-5">
                                <h5>Escuela </h5>
                                <p>Jardin de Niños: "Profa. Ma. Luisa Ballina Escartin" </p>
                            </div>
                            <div class="col-md-3">
                                <h5>Grupo: </h5>
                                <p>{{ $docente->grupo->id }}</p>
                            </div>
                            <div class="col-md-3">
                                <h5>No. Alumnos: </h5>
                                <p>{{ $numero_alumnos }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <h5>Nombre de Docente: </h5>
                                <p>{{ $docente->nombre.' '.$docente->apellidoP.' '.$docente->apellidoM }}</p>
                            </div>
                            <div class="col-md-3">
                                <h5>No. Docente: </h5>
                                <p>{{ $docente->id }}</p>
                            </div>
                            <div class="col-md-2">
                                <h5>Aula: </h5>
                                <p>{{ $docente->grupo->aula }}</p>
                            </div>
                            <div class="col-md-2">
                                <h5>Grado: </h5>
                                <p>{{ $docente->grupo->grado }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if( $realizada == 0 )
                <table class="table" id="lista_asistencias">
                    <thead class="thead-dark">
                    <tr>
                        <th>No. Control</th>
                        <th>Nombre Completo</th>
                        <th>Asistencia</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->alumnos->no_control }}</td>
                            <td>{{ $student->alumnos->nombre .' '. $student->alumnos->apellidoP .' '. $student->alumnos->apellidoM }}</td>
                            <td>
                                @if( !\App\Model\Asistencia::where('alumno_id',$student->alumnos->id)->where('fecha',date('Y-m-d'))->first() )
                                    <a href="{{ $student->alumnos->id }}/asistencia" class="btn btn-sm btn-success"
                                       title="Asistio">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="{{ $student->alumnos->id }}/noAsistencia" class="btn btn-sm btn-danger"
                                       title="No asistio">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                @else
                                    <a href="{{ $student->alumnos->id }}/modificarAsistencia"
                                       class="btn btn-sm btn-info"
                                       title="Modificar">
                                        <i class="fa fa-check"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a class="btn btn-primary" style="float: right;" href="asistencia/guardar">Guardar</a>
            @else
                <div class="alert alert-dismissible alert-info text-center">
                    <h4>Ya pasaste lista el dia de hoy</h4>
                    <p>Recuerda que solo puedes registrar asistencia de tu grupo una vez al dia.</p>
                    <p style="text-align: right;font-size: 11pt;color: black;">Si deseas consultar listas de asistencia
                        de fechas
                        anteriores, puedes hacerlo dando click <strong><a href=""
                                                                          style="color: dodgerblue">aqui</a></strong>.
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection