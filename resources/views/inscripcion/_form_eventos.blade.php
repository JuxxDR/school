@php
        @endphp
<?php
/* @var $eventos \App\Model\Eventos */
if (Session::has('eventos')) {
    $eventos = Session::get('eventos');
}

?>
<div class="row">
    <div class="col-12 mb-3">
        <h2 class="text-center" style="background-color:#c4e3f3">Información Adicional</h2>
        <hr>

    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-12 text-left">
                <h5 style="font-size: 20px"><b>¿Desea participar en alguno de los siguientes eventos?</b></h5><br>
            </div>
            <div class="col-2">
                <div class="form-group text-left">
                    {!! Form::label('civicos','Cívicos') !!}
                    {{ Form::select('civicos',
                      [
                      true=>"Si",
                      false=>"No",
                      ],
                      isset($eventos->civicos)?$eventos->civicos:false, [
                              'class' => $errors->has('excursion')?'is-invalid form-control':'form-control',
                      ])}}
                </div>
            </div>

            <div class="col-2">
                <div class="form-group text-left">
                    {!! Form::label('cultural','Culturales') !!}
                    {{ Form::select('cultural',
                      [
                      true=>"Si",
                      false=>"No",
                      ],
                      isset($eventos->cultural)?$eventos->cultural:false, [
                              'class' => $errors->has('cultural')?'is-invalid form-control':'form-control',
                      ])}}
                </div>
            </div>

            <div class="col-2">
                <div class="form-group text-left">
                    {!! Form::label('deportivo','Deportivos') !!}
                    {{ Form::select('deportivo',
                      [
                      true=>"Si",
                      false=>"No",
                      ],
                      isset($eventos->deportivo)?$eventos->deportivo:false, [
                              'class' => $errors->has('deportivo')?'is-invalid form-control':'form-control',
                      ])}}
                </div>
            </div>

            <div class="col-2">
                <div class="form-group text-left">
                    {!! Form::label('excursion','Excursiones') !!}
                    {{ Form::select('excursion',
                      [
                      true=>"Si",
                      false=>"No",
                      ],
                      isset($eventos->excursion)?$eventos->excursion:false, [
                              'class' => $errors->has('excursion')?'is-invalid form-control':'form-control',
                      ])}}
                </div>
            </div>
            <div class="col-2">
                <div class="form-group text-left">
                    {!! Form::label('recreativo','Recreativos') !!}
                    {{ Form::select('recreativo',
                      [
                      true=>"Si",
                      false=>"No",
                      ],
                      isset($eventos->recreativo)?$eventos->recreativo:false, [
                              'class' => $errors->has('excursion')?'is-invalid form-control':'form-control',
                      ])}}
                </div>
            </div>
            <div class="col-1"><!--Espacio--></div>
            <div class="col-2">
                <div class="form-group text-left">
                    {!! Form::label('conv_fam','Convivencia familiar') !!}
                    {{ Form::select('conv_fam',
                      [
                      true=>"Si",
                      false=>"No",
                      ],
                      isset($eventos->conv_fam)?$eventos->conv_fam:false, [
                              'class' => $errors->has('excursion')?'is-invalid form-control':'form-control',
                      ])}}
                </div>
            </div>
            <div class="col-2">
                <div class="form-group text-left">
                    {!! Form::label('clase_abierta','Clases abiertas') !!}
                    {{ Form::select('clase_abierta',
                      [
                      true=>"Si",
                      false=>"No",
                      ],
                      isset($eventos->clase_abierta)?$eventos->clase_abierta:false, [
                              'class' => $errors->has('excursion')?'is-invalid form-control':'form-control',
                      ])}}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    {!! Form::label('pos_asistir','¿A cúantos eventos puede asistir durante el año?') !!}
                    {{ Form::number('pos_asistir',isset($eventos->pos_asistir)?$eventos->pos_asistir:"", [
                  'class' => $errors->has('pos_asistir')?'is-invalid form-control':'form-control',
                    ])}}
                    @if($errors->has('pos_asistir'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pos_asistir') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="form-group text-left">
                    <br>
                    {!! Form::label('manto_equip','1) ¿Cómo sugiere que se realice el mantenimiento y equipamiento de la escuela?') !!}
                    {{ Form::textarea ('manto_equip',isset($eventos->manto_equip)?$eventos->manto_equip:"", [
                  'class' => $errors->has('manto_equip')?'is-invalid form-control':'form-control',
                  'rows'=>3
                    ])}}
                    @if($errors->has('manto_equip'))
                        <div class="invalid-feedback">
                            {{ $errors->first('manto_equip') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="form-group text-left">
                    {!! Form::label('participacion','2) ¿Cómo seria su participación para lograr un espacio educativo digno?') !!}
                    {{ Form::textarea ('participacion',isset($eventos->participacion)?$eventos->participacion:"", [
                  'class' => $errors->has('participacion')?'is-invalid form-control':'form-control',
                  'rows'=>3
                    ])}}
                    @if($errors->has('participacion'))
                        <div class="invalid-feedback">
                            {{ $errors->first('participacion') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-12">
                <div class="form-group text-left">
                    {!! Form::label('avances','3) ¿De qué manera comprende mejor usted, acerca  de los avances en los logros del aprendizaje de su hijo(a)?') !!}
                    {{ Form::textarea ('avances',isset($eventos->avances)?$eventos->avances:"", [
                  'class' => $errors->has('avances')?'is-invalid form-control':'form-control',
                  'rows'=>3
                    ])}}
                    @if($errors->has('avances'))
                        <div class="invalid-feedback">
                            {{ $errors->first('avances') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="form-group text-left">
                    {!! Form::label('premio','4) ¿Está de acuerdo que la docente de su hijo(a) lo premie en algunas ocasiones con una etiqueta adherible o con un dulce?') !!}
                    {{ Form::textarea ('premio',isset($eventos->premio)?$eventos->premio:"", [
                  'class' => $errors->has('premio')?'is-invalid form-control':'form-control',
                  'rows'=>3
                    ])}}
                    @if($errors->has('premio'))
                        <div class="invalid-feedback">
                            {{ $errors->first('premio') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="form-group text-left">
                    {!! Form::label('compromiso','5) ¿A que me comprometo con el nuevo modelo educativo?') !!}
                    {{ Form::textarea ('compromiso',isset($eventos->compromiso)?$eventos->compromiso:"", [
                  'class' => $errors->has('compromiso')?'is-invalid form-control':'form-control',
                  'rows'=>3
                    ])}}
                    @if($errors->has('compromiso'))
                        <div class="invalid-feedback">
                            {{ $errors->first('compromiso') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="form-group text-left">
                    {!! Form::label('comunicacion','6) ¿De qué manera considera que se debe dar la comunicación entre padres de familia y escuela?') !!}
                    {{ Form::textarea ('comunicacion',isset($eventos->comunicacion)?$eventos->comunicacion:"", [
                  'class' => $errors->has('comunicacion')?'is-invalid form-control':'form-control',
                  'rows'=>3
                    ])}}
                    @if($errors->has('comunicacion'))
                        <div class="invalid-feedback">
                            {{ $errors->first('comunicacion') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="form-group text-left">
                    {!! Form::label('espectativa','7) ¿Cuáles son sus expectativas de la Institución para este ciclo escolar?') !!}
                    {{ Form::textarea ('espectativa',isset($eventos->espectativa)?$eventos->espectativa:"", [
                  'class' => $errors->has('espectativa')?'is-invalid form-control':'form-control',
                  'rows'=>3
                    ])}}
                    @if($errors->has('espectativa'))
                        <div class="invalid-feedback">
                            {{ $errors->first('espectativa') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
