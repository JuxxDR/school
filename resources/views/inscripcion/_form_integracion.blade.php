<?php
/* @var $familia \App\Model\Familias */

if (Session::has('familia')) {
    $familia = Session::get('familia');
}
?>

<div class="row">
    <div class="col-12 mb-3">
        <h2 class="text-center" style="background-color:#c4e3f3">Integración Familiar</h2>
        <hr>
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('integrantes','Número de integrantes en la familia') !!}
            {{ Form::number('integrantes',isset($familia->integrantes)?$familia->integrantes:"", [
          'class' => $errors->has('integrantes')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('integrantes'))
                <div class="invalid-feedback">
                    {{ $errors->first('integrantes') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-1">
        <!--espacio enre campos-->
    </div>
    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('numero_hermanos','Número de hijos') !!}
            {{ Form::number('numero_hermanos',isset($familia->numero_hermanos)?$familia->numero_hermanos:"", [
          'class' => $errors->has('numero_hermanos')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('numero_hermanos'))
                <div class="invalid-feedback">
                    {{ $errors->first('numero_hermanos') }}
                </div>
            @endif
        </div>
    </div>


    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('lugar_hermanos','Lugar que ocupa el niño entre los hermanos') !!}
            {{ Form::number('lugar_hermanos',isset($familia->lugar_hermanos)?$familia->lugar_hermanos:"", [
          'class' => $errors->has('lugar_hermanos')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('lugar_hermanos'))
                <div class="invalid-feedback">
                    {{ $errors->first('lugar_hermanos') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col-1">
        <!--espacio enre campos-->
    </div>

    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('padres_juntos','¿Los padres viven juntos?') !!}
            {{ Form::select('padres_juntos',
            [
            true=>"Si",
            false=>"No"
            ],
            isset($familia->padres_juntos)?$familia->padres_juntos:false, [
          'class' => $errors->has('padres_juntos')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('padres_juntos'))
                <div class="invalid-feedback">
                    {{ $errors->first('padres_juntos') }}
                </div>
            @endif
        </div>
    </div>
</div>