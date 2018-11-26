@php
        @endphp
<?php
/* @var $emergencia \App\Model\Emergencia */
    if (Session::has('emergencia')){
        $emergencia=Session::get('emergencia');
    }
?>

<div class="row">
    <div class="col-12 mb-3">
        <h2 class="text-center" style="background-color:#c4e3f3">Datos de Contacto en Caso de Emergencia</h2>
        <hr>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-12 text-center">
                <h4 style="text-align: left">Datos Familiar 1</h4>
                <hr>
            </div>
            <div class="col-3">
                <div class="form-group text-left">
                    {!! Form::label('nombre1','Nombre Completo') !!}
                    {{ Form::text('nombre1',isset($emergencia->nombre1)?$emergencia->nombre1:"", [
                  'class' => $errors->has('nombre1')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('nombre1'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nombre1') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-3">
                <div class="form-group text-left">
                    {!! Form::label('tel_fijo1','Teléfono Fijo') !!}
                    {{ Form::number('tel_fijo1',isset($emergencia->tel_fijo1)?$emergencia->tel_fijo1:"", [
                  'class' => $errors->has('tel_fijo1')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('tel_fijo1'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tel_fijo1') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-3">
                <div class="form-group text-left">
                    {!! Form::label('celular1','Celular') !!}
                    {{ Form::number('celular1',isset($emergencia->celular1)?$emergencia->celular1:"", [
                  'class' => $errors->has('celular1')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('celular1'))
                        <div class="invalid-feedback">
                            {{ $errors->first('celular1') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-3">
                <div class="form-group text-left">
                    {!! Form::label('parentesco1','Parentesco') !!}
                    {{ Form::text('parentesco1',isset($emergencia->parentesco1)?$emergencia->parentesco1:"", [
                  'class' => $errors->has('parentesco1')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('parentesco1'))
                        <div class="invalid-feedback">
                            {{ $errors->first('parentesco1') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row">

            <div class="col-12 text-center">
                <br><br>
                <h4 style="text-align: left">Datos Familiar 2</h4>
                <hr>
            </div>
            <div class="col-3">
                <div class="form-group text-left">
                    {!! Form::label('nombre2','Nombre Completo') !!}
                    {{ Form::text('nombre2',isset($emergencia->nombre2)?$emergencia->nombre2:"", [
                  'class' => $errors->has('nombre2')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('nombre2'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nombre2') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-3">
                <div class="form-group text-left">
                    {!! Form::label('tel_fijo2','Teléfono Fijo') !!}
                    {{ Form::number('tel_fijo2',isset($emergencia->tel_fijo2)?$emergencia->tel_fijo2:"", [
                  'class' => $errors->has('tel_fijo2')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('tel_fijo2'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tel_fijo2') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-3">
                <div class="form-group text-left">
                    {!! Form::label('celular2','Celular') !!}
                    {{ Form::number('celular2',isset($emergencia->celular2)?$emergencia->celular2:"", [
                  'class' => $errors->has('celular2')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('celular2'))
                        <div class="invalid-feedback">
                            {{ $errors->first('celular2') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-3">
                <div class="form-group text-left">
                    {!! Form::label('parentesco2','Parentesco') !!}
                    {{ Form::text('parentesco2',isset($emergencia->parentesco2)?$emergencia->parentesco2:"", [
                  'class' => $errors->has('parentesco2')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('parentesco2'))
                        <div class="invalid-feedback">
                            {{ $errors->first('parentesco2') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-6">
                <div class="form-group text-left">
                    {!! Form::label('hospital_emergencia','Hospital sugerido en caso de emergencia') !!}
                    {{ Form::text('hospital_emergencia',isset($emergencia->hospital_emergencia)?$emergencia->hospital_emergencia:"", [
                  'class' => $errors->has('hospital_emergencia')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('hospital_emergencia'))
                        <div class="invalid-feedback">
                            {{ $errors->first('hospital_emergencia') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>






