@php

        @endphp
@extends('template.main')
@section('title', Session::has('reinscripcion')?'Reinscripcion':"Inscripcion")

@push('scripts')
    @if($confirmation || Session::has('reinscripcion'))
        <script src="{{ asset('js/inscripcion/inscripcion_general.js') }}"></script>
    @endif
@endpush

@section('content')
    <div class="container-fluid">
        <div id="wait" class="row mt-5" hidden>
            <div class="col-12 text-center">
                <i class="fas fa-spinner fa-spin" style="font-size: 4em"></i>
                <h5 class="mt-3"><b>Espere mientras se genera su comprobante, esto puede tardar unos minutos...</b></h5>
            </div>
        </div>
        <div id="form_events" class="row">
            <div class="col-12">
                <div class="row mt-3">
                    @if($confirmation || Session::has('reinscripcion'))
                        <div class="col-12" style="padding-left: 75px">
                            <div class="alert alert-success text-center" role="alert">
                                @if(!Session::has('reinscripcion'))
                                    <b> Sus datos han sido registrados, por favor vuelva a confirmar que sus datos esten
                                        correctos,
                                        da
                                        click
                                        en el siguiente boton
                                        cuando verifiques todos tus datos.
                                        <br>
                                    </b>
                                @else
                                    <b>
                                        Para concluir la reinscripcion verifique que todos sus datos son correctos
                                        y haga click en el siguiente boton.
                                        <br>
                                        <br>
                                    </b>
                                @endif
                                <button
                                        id="btn-confirm-all"
                                        class="btn btn-success">Finalizar
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-2 mt-3 ml-5 pr-0">
                <div class="nav flex-column nav-pills list-group" role="tablist" aria-orientation="vertical">
                    <a class="list-group-item nav-link {{$select==1?'active':''}}"
                       href="{{($confirmation||Session::has('reinscripcion'))?route('inscripcion_datos_alumno',
                       [
                        'inscripcionId'=>$inscripcion->id,
                        'folioId'=>$folio->id,
                        'confirmation'=>$confirmation
                       ]):"#"}}"
                       role="tab"
                       aria-selected="true"><i class="fas fa-user"></i> &nbsp;Alumno</a>
                    <a class="list-group-item nav-link {{$select==2?'active':''}}"
                       href="{{($confirmation||Session::has('reinscripcion'))?
                       route('inscripcion_datos_salud',
                         [
                        'inscripcionId'=>$inscripcion->id,
                        'folioId'=>$folio->id,
                        'confirmation'=>$confirmation
                       ]):
                       "#"}}"
                       role="tab"
                       aria-selected="false"><i class="fas fa-medkit"></i> &nbsp;Salud</a>
                    <a class="list-group-item nav-link {{$select==3?'active':''}}"
                       href="{{($confirmation||Session::has('reinscripcion'))?
                       route('inscripcion_datos_integracion',
                        [
                        'inscripcionId'=>$inscripcion->id,
                        'folioId'=>$folio->id,
                        'confirmation'=>$confirmation
                       ]):
                       "#"}}"
                       role="tab"
                       aria-selected="false"><i class="fas fa-users"></i>  Integración familiar</a>
                    <a class="list-group-item nav-link {{$select==4?'active':''}}"
                       href="{{($confirmation||Session::has('reinscripcion'))?
                       route('inscripcion_datos_padres',
                        [
                        'folioId'=>$inscripcion->id,
                        'inscripcionId'=>$folio->id,
                        'confirmation'=>$confirmation
                       ]):
                       "#"}}"
                       role="tab"
                       aria-selected="false"><i class="fas fa-user-friends"></i>  Padres</a>

                    <a class="list-group-item nav-link {{$select==5?'active':''}}"
                       href="{{($confirmation||Session::has('reinscripcion'))?
                       route('inscripcion_datos_emergencia',
                         [
                        'inscripcionId'=>$inscripcion->id,
                        'folioId'=>$folio->id,
                        'confirmation'=>$confirmation
                       ]):
                       "#"}}"
                       role="tab"
                       aria-selected="false"><i class="fas fa-hospital"></i> &nbsp;Emergencia</a>
                    <a class="list-group-item nav-link {{$select==6?'active':''}}"
                       href="{{($confirmation||Session::has('reinscripcion'))?
                       route('inscripcion_datos_personas_aut',
                         [
                        'inscripcionId'=>$folio->id,
                        'folioId'=>$inscripcion->id,
                        'confirmation'=>$confirmation
                       ]):
                       "#"}}"
                       role="tab"
                       aria-selected="false"><i class="fas fa-id-badge"></i> &nbsp;Personas autorizadas</a>
                    <a class="list-group-item nav-link {{$select==7?'active':''}}"
                       href="{{($confirmation||Session::has('reinscripcion'))?
                       route('inscripcion_datos_eventos',
                            [
                        'inscripcionId'=>$inscripcion->id,
                        'folioId'=>$folio->id,
                        'confirmation'=>$confirmation
                       ]):
                       "#"}}"
                       role="tab"
                       aria-selected="false"><i class="fas fa-calendar-alt"></i> &nbsp;Eventos</a>
                </div>
            </div>
            <div class="col mt-3 ml-0 pl-0">
                <div class="card">
                    @if($confirmation || Session::has('reinscripcion'))
                        <div class="col-12 mt-3 text-right">
                            <button id="btn-save-changes" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    @endif
                    @switch($select)
                        @case(1)
                        <div class="card-body">
                            {!! Form::model($alumno,['url'=>route('inscripcion_datos_alumno_post',
                            [
                            'folioId'=>$folio->id,
                            'inscripcionId'=>$inscripcion->id])])!!}
                            @include ('inscripcion._form_datos_alumno')
                            <div class="col-12 text-center" style="text-align: center">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                            <input type="hidden" name="confirmation" value="{{$confirmation}}">
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
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                            <input type="hidden" name="confirmation" value="{{$confirmation}}">
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
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                            <input type="hidden" name="confirmation" value="{{$confirmation}}">
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
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                            <input type="hidden" name="confirmation" value="{{$confirmation}}">
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
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                            <input type="hidden" name="confirmation" value="{{$confirmation}}">
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
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                            <input type="hidden" name="confirmation" value="{{$confirmation}}">
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
                            @if(!$confirmation && !Session::has("reinscripcion"))
                                <div class="col-12 text-center" style="text-align: center">
                                    <button id="btn-end" class="btn btn-primary" type="submit">Guardar</button>
                                </div>
                            @endif
                            <input type="hidden" name="confirmation" value="{{$confirmation}}">
                            {!! Form::close()!!}
                        </div>
                        @break
                    @endswitch
                </div>
            </div>
        </div>
    </div>
@endsection