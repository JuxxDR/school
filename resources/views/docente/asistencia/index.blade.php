@extends('template.aaron.plantilla')
@section('title', 'Docente | Asistencia')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h2>Lista de asistencia</h2>
                </div>
                <div class="col-md-2">
                    <h5 style="float: right;"><i class="fa fa-calendar"></i><span> {{ date('d/M/Y') }}</span></h5>
                </div>
            </div>
            <p>Recuerda pasar lista todos los dias de clase.</p>

            <br>
            @if( $chidos == 0 )
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
                <a class="btn btn-primary" style="float: right;" href="">Guardar</a>
            @else
                <h3>Ya pasaste lista el dia de hoy</h3>
            @endif
            <br><br><br>
            <div class="card">
                <div class="card-body">
                    <form>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alumno_name">Alumno:</label>
                                    <input type="text" class="form-control" id="alumno_name"
                                           placeholder="Introduce nombre de alumno"
                                           name="alumno_name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="asistio_opcion">Opción:</label>
                                    <select class="form-control" name="asistio_opcion">
                                        <option>Selecciona una opción</option>
                                        <option>Asistio</option>
                                        <option>No Asistio</option>
                                        <option>Sin especificar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="asistio_opcion" style="color: white;">Opción:</label>
                                <button class="btn btn-info" style="float: right;">Consultar dias anteriores</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection