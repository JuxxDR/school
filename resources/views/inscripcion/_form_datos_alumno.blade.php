<?php
/* @var $alumno \App\Model\Alumno */
?>

<div class="row">
    <div class="col-12 mb-3">
        <h2 class="text-center" style="background-color:#c4e3f3">Información del Alumno</h2>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-3">
        <!--Encabezado Pantalla verificación-->
        <h2 class="text-left">Datos del Alumno</h2>
        <hr>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('nombre','Nombre') !!}
            {{ Form::text('nombre',isset($alumno->nombre)?$alumno->nombre:"", [
          'class' => $errors->has('nombre')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('nombre'))
                <div class="invalid-feedback">
                    {{ $errors->first('nombre') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('apellidoP','Apellido Paterno') !!}
            {{ Form::text('apellidoP',isset($alumno->apellidoP)?$alumno->apellidoP:"", [
          'class' => $errors->has('apellidoP')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('apellidoP'))
                <div class="invalid-feedback">
                    {{ $errors->first('apellidoP') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('apellidoM','Apellido Materno') !!}
            {{ Form::text('apellidoM',isset($alumno->apellidoM)?$alumno->apellidoM:"", [
          'class' => $errors->has('apellidoM')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('apellidoM'))
                <div class="invalid-feedback">
                    {{ $errors->first('apellidoM') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('curp','CURP') !!}
            {{ Form::text('curp',isset($alumno->curp)?$alumno->curp:"", [
          'class' => $errors->has('curp')?'is-invalid form-control':'form-control',
          "maxlength"=>18
            ])}}
            @if($errors->has('curp'))
                <div class="invalid-feedback">
                    {{ $errors->first('curp') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-2">
        <div class="form-group text-left">
            {!! Form::label('fecha_nacimiento','Fecha de Nacimiento') !!}
            {{ Form::date('fecha_nacimiento',isset($alumno->fecha_nacimiento)?$alumno->fecha_nacimiento:"", [
          'class' => $errors->has('fecha_nacimiento')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('fecha_nacimiento'))
                <div class="invalid-feedback">
                    {{ $errors->first('fecha_nacimiento') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-2">
        <div class="form-group text-left">
            {!! Form::label('edad','Edad') !!}
            {{ Form::number('edad',isset($alumno->edad)?$alumno->edad:"", [
          'class' => $errors->has('edad')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('edad'))
                <div class="invalid-feedback">
                    {{ $errors->first('edad') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col-2">
        <div class="form-group text-left">
            {!! Form::label('meses','Meses') !!}
            {{ Form::number('meses',isset($alumno->meses)?$alumno->meses:"", [
          'class' => $errors->has('meses')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('meses'))
                <div class="invalid-feedback">
                    {{ $errors->first('meses') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-2">
        <div class="form-group text-left">
            {!! Form::label('grado','Grado al que ingresa') !!}
            {{ Form::select('grado',['1'=>1,'2'=>2,'3'=>3],isset($alumno->grado)?$alumno->grado:"",[
                'class' => $errors->has('grado')?'is-invalid form-control':'form-control',
                'disabled'=>Session::has("reinscripcion")
            ])}}
            @if($errors->has('grado'))
                <div class="invalid-feedback">
                    {{ $errors->first('grado') }}
                </div>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3">
        <h2 class="text-left">Domicilio del Alumno</h2>
        <hr>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('estado','Entidad de Nacimiento') !!}
            {{ Form::text('estado',isset($alumno->estado)?$alumno->estado:"", [
          'class' => $errors->has('estado')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('estado'))
                <div class="invalid-feedback">
                    {{ $errors->first('estado') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('municipio','Municipio') !!}
            {{ Form::text('municipio',isset($alumno->municipio)?$alumno->municipio:"", [
          'class' => $errors->has('municipio')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('municipio'))
                <div class="invalid-feedback">
                    {{ $errors->first('municipio') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('calle','Calle') !!}
            {{ Form::text('calle',isset($alumno->calle)?$alumno->calle:"", [
          'class' => $errors->has('calle')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('calle'))
                <div class="invalid-feedback">
                    {{ $errors->first('calle') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col-2">
        <div class="form-group text-left">
            {!! Form::label('no_ext','No. Exterior') !!}
            {{ Form::number('no_ext',isset($alumno->no_ext)?$alumno->no_ext:"", [
          'class' => $errors->has('no_ext')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('no_ext'))
                <div class="invalid-feedback">
                    {{ $errors->first('no_ext') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-2">
        <div class="form-group text-left">
            {!! Form::label('no_int','No. Interior') !!}
            {{ Form::number('no_int',isset($alumno->no_int)?$alumno->no_int:"", [
          'class' => $errors->has('no_int')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('no_int'))
                <div class="invalid-feedback">
                    {{ $errors->first('no_int') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('colonia','Colonia') !!}
            {{ Form::text('colonia',isset($alumno->colonia)?$alumno->colonia:"", [
          'class' => $errors->has('colonia')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('colonia'))
                <div class="invalid-feedback">
                    {{ $errors->first('colonia') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('entre_calle1','Entre la calle') !!}
            {{ Form::text('entre_calle1',isset($alumno->entre_calle1)?$alumno->entre_calle1:"", [
          'class' => $errors->has('entre_calle1')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('entre_calle1'))
                <div class="invalid-feedback">
                    {{ $errors->first('entre_calle1') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('entre_calle2','Y la calle') !!}
            {{ Form::text('entre_calle2',isset($alumno->entre_calle2)?$alumno->entre_calle2:"", [
          'class' => $errors->has('entre_calle2')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('entre_calle2'))
                <div class="invalid-feedback">
                    {{ $errors->first('entre_calle2') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('cp','Código Postal') !!}
            {{ Form::number('cp',isset($alumno->cp)?$alumno->cp:"", [
          'class' => $errors->has('cp')?'is-invalid form-control':'form-control',
          'maxlength'=>5
            ])}}
            @if($errors->has('cp'))
                <div class="invalid-feedback">
                    {{ $errors->first('cp') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('punto_referencia','Punto de referencia') !!}
            {{ Form::text('punto_referencia',isset($alumno->punto_referencia)?$alumno->punto_referencia:"", [
          'class' => $errors->has('punto_referencia')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('punto_referencia'))
                <div class="invalid-feedback">
                    {{ $errors->first('punto_referencia') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('tel_casa','Telefóno de casa') !!}
            {{ Form::text('tel_casa',isset($alumno->tel_casa)?$alumno->tel_casa:"", [
          'class' => $errors->has('tel_casa')?'is-invalid form-control':'form-control',
                    "maxlength"=>10
            ])}}
            @if($errors->has('tel_casa'))
                <div class="invalid-feedback">
                    {{ $errors->first('tel_casa') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('cel','Celular') !!}
            {{ Form::text('cel',isset($alumno->cel)?$alumno->cel:"", [
          'class' => $errors->has('cel')?'is-invalid form-control':'form-control',
            "maxlength"=>10
            ])}}
            @if($errors->has('cel'))
                <div class="invalid-feedback">
                    {{ $errors->first('cel') }}
                </div>
            @endif
        </div>
    </div>


</div>

