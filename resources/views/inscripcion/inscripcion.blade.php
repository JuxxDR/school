<?php
?>

@extends('template.main')
@section('title', 'Inscripcion')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 mt-5 ml-5 pr-0">
                <div class="nav flex-column nav-pills list-group" role="tablist" aria-orientation="vertical">
                    <a class="list-group-item nav-link active" href="#v-pills-home" role="tab" aria-selected="true">Alumno</a>
                    <a class="list-group-item nav-link" href="#v-pills-profile" role="tab" aria-selected="false">Padre</a>
                    <a class="list-group-item nav-link" href="#v-pills-messages" role="tab" aria-selected="false">Madre</a>
                    <a class="list-group-item nav-link" href="#v-pills-settings" role="tab" aria-selected="false">Integración y salud</a>
                    <a class="list-group-item nav-link" href="#v-pills-settings" role="tab" aria-selected="false">Emergencia</a>
                    <a class="list-group-item nav-link" href="#v-pills-settings" role="tab" aria-selected="false">Eventos</a>
                    <a class="list-group-item nav-link" href="#v-pills-settings" role="tab" aria-selected="false">Personas autorizadas</a>
                </div>
            </div>
            <div class="col mt-5 ml-0 pl-0">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open()!!}
                            @include ('inscripcion._form_datos_alumno')
                            {!! Form::close()!!}
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection