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
        <h2 class="text-center">Personas autorizadas para recoger al niño</h2>
        <hr>
    </div>
    <div class="col-3">
        <div class="form-group text-left">
            {!! Form::label('nombre1','Nombre de contacto(1)') !!}
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
    <div class="col-3">
        <div class="form-group text-left">
            {!! Form::label('nombre2','Nombre de contacto(2)') !!}
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
    <div class="col-3">
        <div class="form-group text-left">
            {!! Form::label('nombre3','Nombre de contacto(3)') !!}
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
    <div class="col-3">
        <div class="form-group text-left">
            {!! Form::label('nombre4','Nombre de contacto(4)') !!}
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
