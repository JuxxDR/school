@php
    /* @var $alumno \App\Model\Alumno*/
    /* @var $salud \App\model\InfSalud*/
    /* @var $enfermedade \App\model\Enfermedades*/
    /* @var $antecedente \App\model\AntecedesntesHereditarios*/
    /* @var $detectado \App\model\Detectado */
    /* @var $inscripcion  \App\model\Inscripciones*/
@endphp
@extends('template.main')
@section('title', 'Confirmación')

@section('content')
    <div class="container-fluid">
        <div class="container border mt-3 " style="font-size: 1.5em;">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="text-center">Por favor verifique que sus datos son los correctos</h3>
                    {!! Form::open(['url'=>route('inscripcion_confirm_pdf',
                                       ['folioId'=>$inscripcion->folio_id,
                                       'inscripcionId'=>$inscripcion->id])])!!}

                    @include('inscripcion._form_salud',[
                    'salud'=>$salud,
                    'enfermedades'=>$enfermedades,
                    'detectado'=>$detectado,
                    'antecedente'=>$antecedentes
                    ])

                    @include ('inscripcion._form_datos_alumno',['alumno'=>$alumno])
                    {!! Form::close()!!}

                </div>
            </div>
        </div>
    </div>
@endsection