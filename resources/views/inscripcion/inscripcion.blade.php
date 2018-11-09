@php


        @endphp
@extends('template.main')
@section('title', 'Inscripcion')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 mt-5 ml-5 pr-0">
                <div class="nav flex-column nav-pills list-group" role="tablist" aria-orientation="vertical">
                    <a class="list-group-item nav-link {{$select==1?'active':''}}" href="#v-pills-home" role="tab"
                       aria-selected="true">Alumno</a>
                    <a class="list-group-item nav-link {{$select==3?'active':''}}" href="#v-pills-profile" role="tab"
                       aria-selected="false">Padre</a>
                    <a class="list-group-item nav-link {{$select==4?'active':''}}" href="#v-pills-messages" role="tab"
                       aria-selected="false">Madre</a>
                    <a class="list-group-item nav-link {{$select==2?'active':''}}" href="#v-pills-settings" role="tab"
                       aria-selected="false">Salud</a>
                    <a class="list-group-item nav-link {{$select==5?'active':''}}" href="#v-pills-settings" role="tab"
                       aria-selected="false">Emergencia</a>
                    <a class="list-group-item nav-link {{$select==6?'active':''}}" href="#v-pills-settings" role="tab"
                       aria-selected="false">Eventos</a>
                    <a class="list-group-item nav-link {{$select==7?'active':''}}" href="#v-pills-settings" role="tab"
                       aria-selected="false">Personas
                        autorizadas</a>
                </div>
            </div>
            <div class="col mt-5 ml-0 pl-0">
                <div class="card">
                    @if(isset($alumno))
                        <div class="card-body">
                            {!! Form::open(['url'=>route('inscripcion_datos_salud_post',
                                            ['folioId'=>$folio->id,
                                            'inscripcionId'=>$inscripcion->id])])!!}
                            <div>
                                @include('inscripcion._form_salud')
                            </div>
                            <div hidden>
                                @include ('inscripcion._form_datos_alumno',['alumno'=>$alumno])
                            </div>
                            <div class="col-12 text-center" style="text-align: center">
                                <button class="btn btn-primary" type="submit">Continuar</button>
                            </div>
                            {!! Form::close()!!}
                        </div>
                    @else
                        <div class="card-body">
                            {!! Form::open(['url'=>route('inscripcion_datos_alumno_post',
                            [
                            'folioId'=>$folio->id,
                            'inscripcionId'=>$inscripcion->id])])!!}
                            @include ('inscripcion._form_datos_alumno')
                            <div class="col-12 text-center" style="text-align: center">
                                <button class="btn btn-primary" type="submit">Continuar</button>
                            </div>
                            {!! Form::close()!!}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection