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
                                                <a class="btn btn-success" href="tarea/entregas/{{ $tarea->id }}"
                                                   style="float: right">Registrar Entregas</a>
                                            </div>
                                        </div>
                                        <br>
                                        <h3>Descripción: </h3>
                                        <p style="text-align: justify">{{ $tarea->descripcion }}</p>
                                        @if($tarea->aceptable==0 && $tarea->medio==0 && $tarea->deficiente==0 && $tarea->no_entregado==0)
                                            <div class="alert alert-dismissible alert-info">
                                                <strong>Aun no registras entregas de esta tarea </strong><br>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-6">

                                                </div>
                                                <div class="col-md-6">

                                                </div>
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
@endsection