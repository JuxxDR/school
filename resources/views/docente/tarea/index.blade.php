@extends('template.aaron.plantilla')
@section('title', 'Docente | Tareas')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <div class="card">
                <div class="container">
                    <br>
                    <h1 style="text-align: center">Tareas
                        <img class="" src="{{ asset('img/tarea.png') }}" style="width:95px">
                    </h1>
                    <br>
                    <h2 style="text-align: center">Jardin de Niños: "Profa. Ma. Luisa Ballina Escartin" </h2>
                    <br>
                    <h5 style="float:right;"><i class="fa fa-calendar"></i><span> {{ date('d/M/Y') }}</span></h5>
                </div>
            </div>
            <br>
            <button class="btn btn-info" style="float: right" id="creartarea" name="creartarea">Agregar Tarea</button>
            <br><br>
            <div class="card">
                @if(session('notification'))
                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Alerta! </strong><br>
                        {{ session('notification') }}
                    </div>
                @endif
                @if(session('confirmation'))
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Información </strong><br>
                        {{ session('confirmation') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-3">
                        <div class="list-group">
                            <a href="#principal" class="list-group-item active nav-link"
                               data-toggle="tab">Tareas</a>
                            @foreach($tareas as $tarea)
                                <a href="#tarea{{ $tarea->id }}" class="list-group-item nav-link"
                                   data-toggle="tab">{{ $tarea->nombre}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="container">
                            <div class="tab-content">
                                <div id="principal" class="container tab-pane active"><br>
                                    <h2>Programa de Valores</h2>
                                    <p style="text-align: justify;">El programa de valores en preescolar consiste en
                                        sensibilizar a los niños y
                                        concientizarlos acerca de las reglas que se siguen en la escuela, en la calle,
                                        en el hogar. Se les leen cuentos, anécdotas, fábulas que tratan del respeto, la
                                        honestidad, amistad, responsabilidad, la solidaridad, la tolerancia. El reto
                                        pedagógico actual de la escuela sesitúa principalmente en la formación
                                        del pensamiento y en el desarrollo de lasactitudes y capacidades para
                                        actuarracionalmente.<br><br>

                                        Los valores deben estar presentes en el currículum formal y en las prácticas
                                        educativas. Sin embargo, la sociedad no permanece estática, sino que seencuentra
                                        en constante transformación y por ello provoca que las necesidades educativas de
                                        los estudiantes no sean siempre las mismas. Las docentes deben estar adoptando
                                        y renovando los contenidos de planes y programas, así como las estrategias de
                                        enseñanza, para brindar una educación pertinente con los valores sociales y las
                                        necesidades de sus estudiantes.<br><br>

                                        La figura del docente representa una “autoridad moral” para sus estudiantes,ya
                                        que tiene un poder de influencia muy grande sobre ellos que va más allá de los
                                        conocimientos que imparte. También es compromiso de las docentes asumir un
                                        papel de preocupación e interés por las cuestiones emocionales y personales de
                                        sus alumnas y alumnos..</p>
                                </div>
                                @foreach($tareas as $tarea)
                                    <div id="tarea{{ $tarea->id }}" class="container tab-pane"><br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h3>Nombre:</h3>
                                                <h5>{{ $tarea->nombre }}</h5>
                                            </div>
                                            <div class="col-md-3">
                                                <h4>Fecha de Entrega:</h4>
                                                <h5>{{ $tarea->fecha_entrega }}</h5>
                                            </div>
                                            <div class="col-md-3">
                                                <h4>Codigo de Tarea:</h4>
                                                <h5>{{ $tarea->id }}</h5>
                                            </div>
                                            <div class="col-md-3">
                                                @if(!\App\Model\EntregaTarea::where('tarea_id',$tarea->id)->first())
                                                    <a class="btn btn-success" href="tarea/entregas/{{ $tarea->id }}"
                                                       style="float: right">Registrar</a>
                                                @else

                                                @endif
                                            </div>
                                        </div>
                                        <br>
                                        <h3>Descripción: </h3>
                                        <p style="text-align: justify">{{ $tarea->descripcion }}</p>
                                        @if(!\App\Model\EntregaTarea::where('tarea_id',$tarea->id)->first())
                                            <div class="alert alert-dismissible alert-info">
                                                <strong>Aun no registras entregas de esta tarea </strong><br>
                                            </div>
                                        @else
                                            <div class="row">
                                                <table class="table" id="registro_tarea">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th>No. Control</th>
                                                        <th>Nombre Completo</th>
                                                        <th style="text-align: center">Tarea</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($students as $student)
                                                        <tr>
                                                            <td>{{ $student->alumnos->no_control }}</td>
                                                            <td>{{ $student->alumnos->nombre .' '. $student->alumnos->apellidoP .' '. $student->alumnos->apellidoM }}</td>
                                                            <td style="text-align: center">
                                                                @if(\App\Model\EntregaTarea::where('alumno_id',$student->alumnos->id)->where('tarea_id',$tarea->id)->first()->entrego==4)
                                                                    No entrego
                                                                @elseif(\App\Model\EntregaTarea::where('alumno_id',$student->alumnos->id)->where('tarea_id',$tarea->id)->first()->entrego==3)
                                                                    Deficiente
                                                                @elseif(\App\Model\EntregaTarea::where('alumno_id',$student->alumnos->id)->where('tarea_id',$tarea->id)->first()->entrego==2)
                                                                    Medio
                                                                @elseif(\App\Model\EntregaTarea::where('alumno_id',$student->alumnos->id)->where('tarea_id',$tarea->id)->first()->entrego==1)
                                                                    Aceptable
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <canvas id="bar-chart{{ $tarea->id }}"></canvas>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="TareaModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Tarea</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('tarea_agregar') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name" placeholder="Introduce Nombre"
                                   name="name">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion:</label>
                            <textarea name="descripcion" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="start">Fecha de Entrega:</label>
                            <input type="date" class="form-control" id="start" name="start">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('scripts')
    <script src="{{ asset('js/aaron.js') }}"></script>
    <script>
        @foreach($tareas as $tarea)
        @if(\App\Model\EntregaTarea::where('tarea_id',$tarea->id)->first())
        new Chart(document.getElementById("bar-chart{{ $tarea->id }}"), {
            type: 'bar',
            data: {
                labels: ["Aceptable", "Medio", "Deficiente", "No Entregado"],
                datasets: [
                    {
                        label: "Alumnos",
                        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9"],
                        data: [{{ $tarea->entregaTarea->where('entrego',1)->count() }},{{ $tarea->entregaTarea->where('entrego',2)->count() }}, {{ $tarea->entregaTarea->where('entrego',3)->count() }}, {{ $tarea->entregaTarea->where('entrego',4)->count() }}]
                    }
                ]
            },
            options: {
                legend: {display: false},
                title: {
                    display: true,
                    text: 'Registro de tareas'
                }
            }
        });
        @endif
        @endforeach
    </script>
@endsection