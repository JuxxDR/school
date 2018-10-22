<?php
?>

@extends('template.main')
@section('title', 'Inscripcion')

@section('content')
    <div class="container">
        <div class="row" style="height: 614px">
            <div class="col-6 offset-3 mt-5">
                <div class="card">
                    <div class="card-header text-center ">
                        <h3>Inscripción</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open()!!}
                        <div class="row">
                            <div class="col-8 offset-2">
                                <div class="form-group text-left">
                                   {!! Form::label('folio','Ingresa el folio de inscripción') !!}
                                    {{ Form::text('folio',null, [
                                  'class' => $errors->has('folio')?'is-invalid form-control':'form-control',
                                    ])}}
                                    @if($errors->has('folio'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('folio') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 text-center ">
                                {!!
                                    Form::submit('Continuar',
                                    [
                                    'class' => 'btn btn-primary btn-md '
                                    ])
                                !!}
                            </div>
                        </div>
                        {!! Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection