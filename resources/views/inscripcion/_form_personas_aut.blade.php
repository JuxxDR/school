@php
        @endphp
<?php
/* @var $personas \App\Model\PersonasAut */

if (Session::has('personasAut')) {
    $personas= Session::get('personasAut');
}
?>
<div class="row">
    <div class="col-12 mb-3">
        <h2 class="text-center" style="background-color:#c4e3f3">Personas Autorizadas para recoger al niño(a)</h2>
        <hr>
        <h5 style="font-size: 17px">Es necesario registrar el nombre de aquellas personas autorizadas para recoger al niño:</h5>

    </div>

    <div class="col-6">
        <div class="form-group text-left">
            {!! Form::label('nombre1','Nombre Completo - (Persona 1)') !!}
            {{ Form::text('nombre1',isset($personas->nombre1)?$personas->nombre1:"", [
            'class' => $errors->has('nombre1')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('nombre1'))
                <div class="invalid-feedback">
                    {{ $errors->first('nombre1') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-6">
        <div class="form-group text-left">
            {!! Form::label('nombre2','Nombre Completo - (Persona 2)') !!}
            {{ Form::text('nombre2',isset($personas->nombre2)?$personas->nombre2:"", [
            'class' => $errors->has('nombre2')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('nombre2'))
                <div class="invalid-feedback">
                    {{ $errors->first('nombre2') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-6">
        <div class="form-group text-left">
            {!! Form::label('nombre3','Nombre Completo - (Persona 3)') !!}
            {{ Form::text('nombre3',isset($personas->nombre3)?$personas->nombre3:"", [
            'class' => $errors->has('nombre3')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('nombre3'))
                <div class="invalid-feedback">
                    {{ $errors->first('nombre3') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-6">
        <div class="form-group text-left">
            {!! Form::label('nombre4','Nombre Completo - (Persona 4)') !!}
            {{ Form::text('nombre4',isset($personas->nombre4)?$personas->nombre4:"", [
            'class' => $errors->has('nombre4')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('nombre4'))
                <div class="invalid-feedback">
                    {{ $errors->first('nombre4') }}
                </div>
            @endif
        </div>
    </div>
</div>
