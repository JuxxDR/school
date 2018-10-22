<?php
?>

<div class="row">
    <div class="col-12 mb-3">
        <h2 class="text-center">Datos del alumno</h2>
        <hr>
    </div>

    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('name','Nombre') !!}
            {{ Form::text('name',null, [
          'class' => $errors->has('name')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('apellidoP','Apellido Paterno') !!}
            {{ Form::text('apellidoP',null, [
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
            {{ Form::text('apellidoM',null, [
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
            {{ Form::text('curp',null, [
          'class' => $errors->has('curp')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('curp'))
                <div class="invalid-feedback">
                    {{ $errors->first('curp') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('fecha_nacimiento','Fecha de nacimiento') !!}
            {{ Form::date('fecha_nacimiento',null, [
          'class' => $errors->has('fecha_nacimiento')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('fecha_nacimiento'))
                <div class="invalid-feedback">
                    {{ $errors->first('fecha_nacimiento') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('edad','Edad') !!}
            {{ Form::number('edad',null, [
          'class' => $errors->has('edad')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('edad'))
                <div class="invalid-feedback">
                    {{ $errors->first('edad') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('meses','Meses') !!}
            {{ Form::number('meses',null, [
          'class' => $errors->has('meses')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('meses'))
                <div class="invalid-feedback">
                    {{ $errors->first('meses') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('peso','Peso') !!}
            {{ Form::number('peso',null, [
          'class' => $errors->has('peso')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('peso'))
                <div class="invalid-feedback">
                    {{ $errors->first('peso') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('talla','Talla') !!}
            {{ Form::number('talla',null, [
          'class' => $errors->has('talla')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('talla'))
                <div class="invalid-feedback">
                    {{ $errors->first('talla') }}
                </div>
            @endif
        </div>
    </div>

</div>

<div class="row">
    <div class="col-12 mb-3">
        <h2 class="text-center">Datos domiciliarios</h2>
        <hr>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('estado','Entidad de nacimiento') !!}
            {{ Form::text('estado',null, [
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
            {{ Form::text('municipio',null, [
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
            {{ Form::text('calle',null, [
          'class' => $errors->has('calle')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('calle'))
                <div class="invalid-feedback">
                    {{ $errors->first('calle') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('no_ext','No. Exterior') !!}
            {{ Form::number('no_ext',null, [
          'class' => $errors->has('no_ext')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('no_ext'))
                <div class="invalid-feedback">
                    {{ $errors->first('no_ext') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('no_int','No. Interior') !!}
            {{ Form::number('no_int',null, [
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
            {{ Form::text('colonia',null, [
          'class' => $errors->has('colonia')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('colonia'))
                <div class="invalid-feedback">
                    {{ $errors->first('no_int') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('entre_calle1','Entre la calle') !!}
            {{ Form::text('entre_calle1',null, [
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
            {{ Form::text('entre_calle2',null, [
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
            {!! Form::label('cp','Código postal') !!}
            {{ Form::number('cp',null, [
          'class' => $errors->has('cp')?'is-invalid form-control':'form-control',
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
            {{ Form::text('punto_referencia',null, [
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
            {{ Form::text('tel_casa',null, [
          'class' => $errors->has('tel_casa')?'is-invalid form-control':'form-control',
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
            {{ Form::text('cel',null, [
          'class' => $errors->has('cel')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('cel'))
                <div class="invalid-feedback">
                    {{ $errors->first('cel') }}
                </div>
            @endif
        </div>
    </div>
</div>

