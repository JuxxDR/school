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
            <button class="btn btn-info" style="float: right">Agregar Tarea</button>
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
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis tellus
                                        pulvinar, convallis nisi et, posuere mauris. Etiam posuere gravida feugiat.
                                        Maecenas in porta massa. Donec tempor bibendum faucibus. Nullam et tempor felis,
                                        nec dictum turpis. Vestibulum sed imperdiet mauris, non vestibulum nisi. Nam
                                        ultrices accumsan ultrices. Donec consectetur fringilla diam vitae dapibus.
                                        Integer ullamcorper, arcu non condimentum tristique, diam odio sodales ex, ut
                                        imperdiet nisi nunc at velit. Aenean quis eleifend enim. Pellentesque habitant
                                        morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris
                                        quis sodales augue. In pulvinar massa fringilla tortor consequat dignissim.
                                        Proin ullamcorper fringilla eros. Sed finibus sed lectus accumsan posuere.
                                        Maecenas in molestie orci.</p>
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
                                                <a class="btn btn-success" href="tareas/entregas/{{ $tarea->id }}"
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
@endsection