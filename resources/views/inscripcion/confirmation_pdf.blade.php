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

@push('scripts')
    <script src="{{ asset('js/inscripcion/modal.js') }}"></script>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="container border mt-3 " style="font-size: 1.5em;">
            <div class="row">
                <div class="col-12 text-center">
                    {!! Form::open(['url'=>route('inscripcion_confirm_pdf',
                                       ['folioId'=>$inscripcion->folio_id,
                                       'inscripcionId'=>$inscripcion->id])])!!}

                    @include('inscripcion._form_datos_alumno',[
                    'alumno'=>$alumno
                    ])

                    @include('inscripcion._form_salud',[
                    'salud'=>$salud,
                    'enfermedades'=>$enfermedades,
                    'detectado'=>$detectado,
                    'antecedente'=>$antecedentes
                    ])

                    <div class="col-12 text-center" style="text-align: center">
                        <button class="btn btn-primary" type="submit">Continuar</button>
                    </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Aviso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Por favor verifique que sus datos son los correctos</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary close-modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
@endsection