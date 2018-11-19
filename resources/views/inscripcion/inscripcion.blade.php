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
                       aria-selected="false">Integración</a>
                    <a class="list-group-item nav-link {{$select==4?'active':''}}" href="#v-pills-messages" role="tab"
                       aria-selected="false">Padres</a>
                    <a class="list-group-item nav-link {{$select==2?'active':''}}" href="#v-pills-settings" role="tab"
                       aria-selected="false">Salud</a>
                    <a class="list-group-item nav-link {{$select==5?'active':''}}" href="#v-pills-settings" role="tab"
                       aria-selected="false">Emergencia</a>
                    <a class="list-group-item nav-link {{$select==6?'active':''}}" href="#v-pills-settings" role="tab"
                       aria-selected="false">Personas
                        autorizadas</a>
                    <a class="list-group-item nav-link {{$select==7?'active':''}}" href="#v-pills-settings" role="tab"
                       aria-selected="false">Eventos</a>
                </div>
            </div>
            <div class="col mt-5 ml-0 pl-0">
                <div class="card">

                    @switch($select)
                        @case(1)
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
                        @break
                        @case(2)
                        <div class="card-body">
                            {!! Form::open(['url'=>route('inscripcion_datos_salud_post',
                                            ['folioId'=>$folio->id,
                                            'inscripcionId'=>$inscripcion->id])])!!}
                            <div>
                                @include('inscripcion._form_salud')
                            </div>
                            <div class="col-12 text-center" style="text-align: center">
                                <button class="btn btn-primary" type="submit">Continuar</button>
                            </div>
                            {!! Form::close()!!}
                        </div>
                        @break
                        @case(3)
                        <div class="card-body">
                            {!! Form::open(['url'=>route('inscripcion_datos_integracion_post',
                                            ['folioId'=>$folio->id,
                                            'inscripcionId'=>$inscripcion->id])])!!}
                            <div>
                                @include('inscripcion._form_integracion')
                            </div>
                            <div class="col-12 text-center" style="text-align: center">
                                <button class="btn btn-primary" type="submit">Continuar</button>
                            </div>
                            {!! Form::close()!!}
                        </div>
                        @break
                        @case(4)
                        <div class="card-body">
                            {!! Form::open(['url'=>route('inscripcion_datos_padres_post',
                                            ['folioId'=>$folio->id,
                                            'inscripcionId'=>$inscripcion->id])])!!}
                            <div>
                                @include('inscripcion._form_padres')
                            </div>
                            <div class="col-12 text-center" style="text-align: center">
                                <button class="btn btn-primary" type="submit">Continuar</button>
                            </div>
                            {!! Form::close()!!}
                        </div>
                        @break
                        @case(5)
                        <div class="card-body">
                            {!! Form::open(['url'=>route('inscripcion_datos_emergencia_post',
                                            ['folioId'=>$folio->id,
                                            'inscripcionId'=>$inscripcion->id])])!!}
                            <div>
                                @include('inscripcion._form_emergencia')
                            </div>
                            <div class="col-12 text-center" style="text-align: center">
                                <button class="btn btn-primary" type="submit">Continuar</button>
                            </div>
                            {!! Form::close()!!}
                        </div>
                        @break
                        @case(6)
                        <div class="card-body">
                            {!! Form::open(['url'=>route('inscripcion_datos_personas_aut_post',
                                            ['folioId'=>$folio->id,
                                            'inscripcionId'=>$inscripcion->id])])!!}
                            <div>
                                @include('inscripcion._form_personas_aut')
                            </div>
                            <div class="col-12 text-center" style="text-align: center">
                                <button class="btn btn-primary" type="submit">Continuar</button>
                            </div>
                            {!! Form::close()!!}
                        </div>
                        @break
                        @case(7)
                        <div class="card-body">
                            {!! Form::open(['url'=>route('inscripcion_datos_eventos_post',
                                            ['folioId'=>$folio->id,
                                            'inscripcionId'=>$inscripcion->id])])!!}
                            <div>
                                @include('inscripcion._form_eventos')
                            </div>
                            <div class="col-12 text-center" style="text-align: center">
                                <button class="btn btn-primary" type="submit">Continuar</button>
                            </div>
                            {!! Form::close()!!}
                        </div>
                        @break
                    @endswitch
                </div>
            </div>
        </div>
    </div>
@endsection