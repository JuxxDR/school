<?php
?>

@extends('template.main')
@section('title', 'Reinscripción')

@section('content')
    <div class="container">
        <div class="row" style="height: 614px">
            <div class="col-6 offset-3 mt-5">
                <div class="card">
                    <div class="card-header text-center card bg-secondary" style="color: white">
                        <h3>Reinscripción</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open()!!}
                        <div class="row">
                            <div class="col-8 offset-2">
                                <div class="form-group text-left">
                                    {!! Form::label('no_control','Ingrese su número de control') !!}
                                    {{ Form::text('no_control',null, [
                                  'class' => $errors->has('no_control')?'is-invalid form-control':'form-control',
                                    ])}}
                                    @if($errors->has('no_control'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('no_control') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 text-center ">
                                {!!
                                    Form::submit('Continuar',
                                    [
                                    'class' => 'btn btn-success btn-md '
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