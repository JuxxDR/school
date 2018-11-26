<?php
/* @var $padre \App\Model\Padre */
/* @var $madre\App\Model\Padre */
if (Session::has('padres')) {
    $madre = Session::get('padres')['madre'];
    $padre = Session::get('padres')['padre'];
}

?>
<div class="row">
    <div class="col-12 mb-3">
        <h2 class="text-center" style="background-color:#c4e3f3">Información de los Padres</h2>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-12 text-center">
        <h3 style="text-align: left">Datos de la Madre</h3>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="row">

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][nombre_completo]','Nombre Completo') !!}
                    {{ Form::text('padres[0][nombre_completo]',isset($madre->nombre_completo)?$madre->nombre_completo:"", [
                  'class' => $errors->has('padres.0.nombre_completo')?'is-invalid form-control':'form-control',

                    ])}}
                    @if($errors->has('padres.0.nombre_completo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.nombre_completo') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][curp]','CURP') !!}
                    {{ Form::text('padres[0][curp]',isset($madre->curp)?$madre->curp:"", [
                  'class' => $errors->has('padres.0.curp')?'is-invalid form-control':'form-control',
                      "maxlength"=>18
                    ])}}
                    @if($errors->has('padres.0.curp'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.curp') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][nivel_estudios]','Nivel de estudios') !!}
                    {{ Form::text('padres[0][nivel_estudios]',isset($madre->nivel_estudios)?$madre->nivel_estudios:"",[
                        'class' => $errors->has('padres.0.nivel_estudios')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.0.nivel_estudios'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.nivel_estudios') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][edo_civil]','Estado Civil') !!}
                    {{ Form::text('padres[0][edo_civil]',isset($madre->edo_civil)?$madre->edo_civil:"",[
                        'class' => $errors->has('padres.0.edo_civil')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.0.edo_civil'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.edo_civil') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][ocupacion]','Ocupación') !!}
                    {{ Form::text('padres[0][ocupacion]',isset($madre->ocupacion)?$madre->ocupacion:"",[
                        'class' => $errors->has('padres.0.ocupacion')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.0.ocupacion'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.ocupacion') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][lugar_trabajo]','Lugar de trabajo') !!}
                    {{ Form::text('padres[0][lugar_trabajo]',isset($madre->lugar_trabajo)?$madre->lugar_trabajo:"",[
                        'class' => $errors->has('padres.0.lugar_trabajo')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.0.lugar_trabajo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.lugar_trabajo') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][tel_fijo]','Teléfono Fijo') !!}
                    {{ Form::number('padres[0][tel_fijo]',isset($madre->tel_fijo)?$madre->tel_fijo:"",[
                        'class' => $errors->has('padres.0.tel_fijo')?'is-invalid form-control':'form-control',
                            "maxlength"=>10
                    ])}}
                    @if($errors->has('padres.0.tel_fijo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.tel_fijo') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][celular]','Celular') !!}
                    {{ Form::number('padres[0][celular]',isset($madre->celular)?$madre->celular:"",[
                        'class' => $errors->has('padres.0.celular')?'is-invalid form-control':'form-control',
                            "maxlength"=>10
                    ])}}
                    @if($errors->has('padres.0.celular'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.celular') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][email]','Correo Electrónico') !!}
                    {{ Form::text('padres[0][email]',isset($madre->email)?$madre->email:"",[
                        'class' => $errors->has('padres.0.email')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.0.email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.email') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][red_social]','Red social') !!}
                    {{ Form::text('padres[0][red_social]',isset($madre->red_social)?$madre->red_social:"",[
                        'class' => $errors->has('padres.0.red_social')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.0.red_social'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.red_social') }}
                        </div>
                    @endif
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <br>
                <h2 class="text-left">Domicilio</h2>
                <hr>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][calle]','Calle') !!}
                    {{ Form::text('padres[0][calle]',isset($madre->calle)?$madre->calle:"", [
                  'class' => $errors->has('padres.0.calle')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.0.calle'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.calle') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][no_ext]','No. Exterior') !!}
                    {{ Form::number('padres[0][no_ext]',isset($madre->no_ext)?$madre->no_ext:"", [
                  'class' => $errors->has('padres.0.no_ext')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.0.no_ext'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.no_ext') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][no_int]','No. Interior') !!}
                    {{ Form::number('padres[0][no_int]',isset($madre->no_int)?$madre->no_int:"", [
                  'class' => $errors->has('padres.0.no_int')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.0.no_int'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.no_int') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][colonia]','Colonia') !!}
                    {{ Form::text('padres[0][colonia]',isset($madre->colonia)?$madre->colonia:"", [
                  'class' => $errors->has('padres.0.colonia')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.0.colonia'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.colonia') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][entre_calle1]','Entre la calle') !!}
                    {{ Form::text('padres[0][entre_calle1]',isset($madre->entre_calle1)?$madre->entre_calle1:"", [
                  'class' => $errors->has('padres.0.entre_calle1')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.0.entre_calle1'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.entre_calle1') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][entre_calle2]','Y la calle') !!}
                    {{ Form::text('padres[0][entre_calle2]',isset($madre->entre_calle2)?$madre->entre_calle2:"", [
                  'class' => $errors->has('padres.0.entre_calle2')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.0.entre_calle2'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.entre_calle2') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[0][cp]','Código Postal') !!}
                    {{ Form::number('padres[0][cp]',isset($madre->cp)?$madre->cp:"", [
                  'class' => $errors->has('padres.0.cp')?'is-invalid form-control':'form-control',
                      "maxlength"=>5
                    ])}}
                    @if($errors->has('padres.0.cp'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.0.cp') }}
                        </div>
                    @endif
                    <br><br>
                </div>
            </div>


        </div>
    </div>
</div>
<div class="row">
    <h5 style="font-size: 17px">&nbsp; &nbsp;**En caso de ser necesario puede omitir los datos del padre, si la situación actual así lo amerita.</h5>
    <div class="col-12 text-center">
        <br>
        <h3 class="text-left">Datos del Padre</h3>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="row">

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][nombre_completo]','Nombre Completo') !!}
                    {{ Form::text('padres[1][nombre_completo]',isset($padre->nombre_completo)?$padre->nombre_completo:"", [
                  'class' => $errors->has('padres.1.nombre_completo')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.nombre_completo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.nombre_completo') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][curp]','CURP') !!}
                    {{ Form::text('padres[1][curp]',isset($padre->curp)?$padre->curp:"", [
                  'class' => $errors->has('padres.1.curp')?'is-invalid form-control':'form-control',
                      "maxlength"=>18
                    ])}}
                    @if($errors->has('padres.1.curp'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.curp') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][nivel_estudios]','Nivel de estudios') !!}
                    {{ Form::text('padres[1][nivel_estudios]',isset($padre->nivel_estudios)?$padre->nivel_estudios:"",[
                        'class' => $errors->has('padres.1.nivel_estudios')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.nivel_estudios'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.nivel_estudios') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][edo_civil]','Estado Civil') !!}
                    {{ Form::text('padres[1][edo_civil]',isset($padre->edo_civil)?$padre->edo_civil:"",[
                        'class' => $errors->has('padres.1.edo_civil')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.edo_civil'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.edo_civil') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][ocupacion]','Ocupación') !!}
                    {{ Form::text('padres[1][ocupacion]',isset($padre->ocupacion)?$padre->ocupacion:"",[
                        'class' => $errors->has('padres.1.ocupacion')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.ocupacion'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.ocupacion') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][lugar_trabajo]','Lugar de trabajo') !!}
                    {{ Form::text('padres[1][lugar_trabajo]',isset($padre->lugar_trabajo)?$padre->lugar_trabajo:"",[
                        'class' => $errors->has('padres.1.lugar_trabajo')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.lugar_trabajo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.lugar_trabajo') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][tel_fijo]','Teléfono Fijo') !!}
                    {{ Form::number('padres[1][tel_fijo]',isset($padre->tel_fijo)?$padre->tel_fijo:"",[
                        'class' => $errors->has('padres.1.tel_fijo')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.tel_fijo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.tel_fijo') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][celular]','Celular') !!}
                    {{ Form::number('padres[1][celular]',isset($padre->celular)?$padre->celular:"",[
                        'class' => $errors->has('padres.1.celular')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.celular'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.celular') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][email]','Correo Electrónico') !!}
                    {{ Form::text('padres[1][email]',isset($padre->email)?$padre->email:"",[
                        'class' => $errors->has('padres.1.email')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.email') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][red_social]','Red social') !!}
                    {{ Form::text('padres[1][red_social]',isset($padre->red_social)?$padre->red_social:"",[
                        'class' => $errors->has('padres.1.red_social')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.red_social'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.red_social') }}
                        </div>
                    @endif
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <h2 class="text-left">Domicilio</h2>
                <hr>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][calle]','Calle') !!}
                    {{ Form::text('padres[1][calle]',isset($padre->calle)?$padre->calle:"", [
                  'class' => $errors->has('padres.1.calle')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.calle'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.calle') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][no_ext]','No. Exterior') !!}
                    {{ Form::number('padres[1][no_ext]',isset($padre->no_ext)?$padre->no_ext:"", [
                  'class' => $errors->has('padres.1.no_ext')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.no_ext'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.no_ext') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][no_int]','No. Interior') !!}
                    {{ Form::number('padres[1][no_int]',isset($padre->no_int)?$padre->no_int:"", [
                  'class' => $errors->has('padres.1.no_int')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.no_int'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.no_int') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][colonia]','Colonia') !!}
                    {{ Form::text('padres[1][colonia]',isset($padre->colonia)?$padre->colonia:"", [
                  'class' => $errors->has('padres.1.colonia')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.colonia'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.colonia') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][entre_calle1]','Entre la calle') !!}
                    {{ Form::text('padres[1][entre_calle1]',isset($padre->entre_calle1)?$padre->entre_calle1:"", [
                  'class' => $errors->has('padres.1.entre_calle1')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.entre_calle1'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.entre_calle1') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][entre_calle2]','Y la calle') !!}
                    {{ Form::text('padres[1][entre_calle2]',isset($padre->entre_calle2)?$padre->entre_calle2:"", [
                  'class' => $errors->has('padres.1.entre_calle2')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('padres.1.entre_calle2'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.entre_calle2') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('padres[1][cp]','Código postal') !!}
                    {{ Form::number('padres[1][cp]',isset($padre->cp)?$padre->cp:"", [
                  'class' => $errors->has('padres.1.cp')?'is-invalid form-control':'form-control',
                      "maxlength"=>5
                    ])}}
                    @if($errors->has('padres.1.cp'))
                        <div class="invalid-feedback">
                            {{ $errors->first('padres.1.cp') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


