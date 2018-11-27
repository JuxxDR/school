<?php
/* @var $salud \App\Model\InfSalud */
/* @var $enfermedades \App\Model\Enfermedades */
/* @var $detectado \App\Model\Detectado */
/* @var $antecedente \App\Model\AntecedesntesHereditarios */
if (Session::has('salud')) {
    $session = Session::get('salud');
    $salud = $session['infSalud'];
    $enfermedades = $session['enfermedades'];
    $detectado = $session['detectado'];
    $antecedente = $session['antecedente'];
}
?>
@push('scripts')
    <script src="{{ asset('js/inscripcion/_form_salud.js') }}"></script>
@endpush
<div class="row">
    <div class="col-12 mb-3">
        <h2 class="text-center" style="background-color:#c4e3f3">Datos de Salud del Alumno</h2>
        <hr>
    </div>

    <div class="col-2">
        <div class="form-group text-left">
            {!! Form::label('inf_salud[sexo]','Sexo') !!}
            {{ Form::select('inf_salud[sexo]',
            [
            'H'=>"Hombre",
            'M'=>"Mujer",
            ],
            isset($salud->sexo)?$salud->sexo:"", [
          'class' => $errors->has('inf_salud.sexo')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('inf_salud.sexo'))
                <div class="invalid-feedback">
                    {{ $errors->first('inf_salud.sexo') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-2">
        <div class="form-group text-left">
            {!! Form::label('inf_salud[ban_alergia]','¿Alergias?') !!}
            {{ Form::select('inf_salud[ban_alergia]',
            [
            true=>"Si",
            false=>"No"
            ],
            isset($salud->ban_alergia)?$salud->ban_alergia:false, [
          'class' => $errors->has('inf_salud.ban_alergia')?'is-invalid form-control':'form-control',
          'id'=>"select-alergia"
            ])}}
            @if($errors->has('inf_salud.ban_alergia'))
                <div class="invalid-feedback">
                    {{ $errors->first('inf_salud.ban_alergia') }}
                </div>
            @endif
        </div>
    </div>

    <div id="inp-alergia" class="col-4">
        <div class="form-group text-left">
            {!! Form::label('inf_salud[alergia]','¿Que alergia?') !!}
            {{ Form::text('inf_salud[alergia]',
                            isset($salud->alergia)?$salud->alergia:"", [
                          'class' => $errors->has('inf_salud.alergia')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('inf_salud.alergia'))
                <div class="invalid-feedback">
                    {{ $errors->first('inf_salud.alergia') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('inf_salud[enfermedad]','Enfermedad que ha padecido') !!}
            {{ Form::text('inf_salud[enfermedad]',
            isset($salud->enfermedad)?$salud->enfermedad:"", [
          'class' => $errors->has('inf_salud.enfermedad')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('inf_salud.enfermedad'))
                <div class="invalid-feedback">
                    {{ $errors->first('inf_salud.enfermedad') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('inf_salud[vacunas_aplicadas]','Vacunas aplicadas') !!}
            {{ Form::text('inf_salud[vacunas_aplicadas]',
            isset($salud->vacunas_aplicadas)?$salud->vacunas_aplicadas:"", [
          'class' => $errors->has('inf_salud.vacunas_aplicadas')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('inf_salud.vacunas_aplicadas'))
                <div class="invalid-feedback">
                    {{ $errors->first('inf_salud.vacunas_aplicadas') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('inf_salud[carac_especial]','¿Alguna característica especial del niño?') !!}
            {{ Form::text('inf_salud[carac_especial]',
                            isset($salud->carac_especial)?$salud->carac_especial:"", [
                          'class' => $errors->has('inf_salud.carac_especial')?'is-invalid form-control':'form-control',
            ])}}
            @if($errors->has('inf_salud.carac_especial'))
                <div class="invalid-feedback">
                    {{ $errors->first('inf_salud.carac_especial') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('inf_salud[enfermedad_frecuente]','Enfermedades que padece con frecuencia') !!}
            {{ Form::text ('inf_salud[enfermedad_frecuente]',
                            isset($salud->enfermedad_frecuente)?$salud->enfermedad_frecuente:"", [
                          'class' => $errors->has('inf_salud.enfermedad_frecuente')?'is-invalid form-control':'form-control'
            ])}}
            @if($errors->has('inf_salud.enfermedad_frecuente'))
                <div class="invalid-feedback">
                    {{ $errors->first('inf_salud.enfermedad_frecuente') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col-4">
        <div class="form-group text-left">
            {!! Form::label('inf_salud[medico_familiar]','Institución de derechohabiente del alumno') !!}
            {{ Form::text ('inf_salud[medico_familiar]',
                            isset($salud->medico_familiar)?$salud->medico_familiar:"", [
                          'class' => $errors->has('inf_salud.medico_familiar')?'is-invalid form-control':'form-control'
            ])}}
            @if($errors->has('inf_salud.medico_familiar'))
                <div class="invalid-feedback">
                    {{ $errors->first('inf_salud.medico_familiar') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col">
                        <div class="form-group text-left">
                            {!! Form::label('inf_salud[enfermedad_ult_mes]','¿Escriba las enfermedades que ha tenido su hijo(a) durante los últimos 12 meses?') !!}
                            {{ Form::textarea ('inf_salud[enfermedad_ult_mes]',
                                            isset($salud->enfermedad_ult_mes)?$salud->enfermedad_ult_mes:"", [
                                          'class' => $errors->has('inf_salud.enfermedad_ult_mes')?'is-invalid form-control':'form-control',
                                          'rows'=>3
                            ])}}
                            @if($errors->has('inf_salud.enfermedad_ult_mes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('inf_salud.enfermedad_ult_mes') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group text-left">
                    {!! Form::label('inf_salud[tipo_sangre]','Tipo de sangre') !!}
                    {{ Form::text ('inf_salud[tipo_sangre]',
                                    isset($salud->tipo_sangre)?$salud->tipo_sangre:"", [
                                  'class' => $errors->has('inf_salud.tipo_sangre')?'is-invalid form-control':'form-control'
                    ])}}
                    @if($errors->has('inf_salud.tipo_sangre'))
                        <div class="invalid-feedback">
                            {{ $errors->first('inf_salud.tipo_sangre') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-2">
                <div class="form-group text-left">
                    {!! Form::label('inf_salud[talla]','Talla(cm)') !!}
                    {{ Form::text ('inf_salud[talla]',
                                    isset($salud->talla)?$salud->talla:"", [
                                  'class' => $errors->has('inf_salud.talla')?'is-invalid form-control':'form-control',
                                  'maxlength'=>3
                    ])}}
                    @if($errors->has('inf_salud.talla'))
                        <div class="invalid-feedback">
                            {{ $errors->first('inf_salud.talla') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-2">
                <div class="form-group text-left">
                    {!! Form::label('inf_salud[peso]','Peso(kg)') !!}
                    {{ Form::text ('inf_salud[peso]',
                                    isset($salud->peso)?$salud->peso:"", [
                                  'class' => $errors->has('inf_salud.peso')?'is-invalid form-control':'form-control'
                    ])}}
                    @if($errors->has('inf_salud.peso'))
                        <div class="invalid-feedback">
                            {{ $errors->first('inf_salud.peso') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-12">
        <h2 class="text-center" style="background-color:#c4e3f3">Historial Médico del Alumno</h2>
    </div>
    <div class="col-12">
        <div>
            <table class="table table-striped">
                <thead>
                <tr align="left">
                    <th  colspan="4" style="font-size: 20px"> ¿Su hijo(a) padece alguna de las siguientes enfermedades?</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Sobre peso u obesidad</td>
                    <td width="10%">
                        {{ Form::select('enfermedades[e1]',
                            [
                            true=>"Si",
                            false=>"No",
                            ],
                            isset($enfermedades->e1)?$enfermedades->e1:false, [
                                    'class' => $errors->has('enfermedades.e1')?'is-invalid form-control':'form-control',
                            ])}}
                    </td>
                    <td>Enfermedades del corazón</td>
                    <td width="10%">
                        {{ Form::select('enfermedades[e2]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($enfermedades->e2)?$enfermedades->e2:false, [
                                'class' => $errors->has('enfermedades.e2')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                </tr>
                <tr>
                    <td>Bronquitis</td>
                    <td>
                        {{ Form::select('enfermedades[e3]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($enfermedades->e3)?$enfermedades->e3:false, [
                                'class' => $errors->has('enfermedades.e3]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>

                    <td>Hemorragias</td>
                    <td>
                        {{ Form::select('enfermedades[e4]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($enfermedades->e4), [
                                'class' => $errors->has('enfermedades.e4]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                </tr>
                <tr>
                    <td>Epilepsia</td>
                    <td>
                        {{ Form::select('enfermedades[e5]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($enfermedades->e5)?$enfermedades->e5:false, [
                                'class' => $errors->has('enfermedades.e5]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                    <td>Fiebre reumática</td>
                    <td>
                        {{ Form::select('enfermedades[e6]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($enfermedades->e6)?$enfermedades->e6:false, [
                                'class' => $errors->has('enfermedades.e6]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                </tr>
                <tr>
                    <td>Cáncer</td>
                    <td>
                        {{ Form::select('enfermedades[e7]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($enfermedades->e7)?$enfermedades->e7:false, [
                                'class' => $errors->has('enfermedades.e7]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                    <td>Diabetes</td>
                    <td>
                        {{ Form::select('enfermedades[e8]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($enfermedades->e8)?$enfermedades->e8:false, [
                                'class' => $errors->has('enfermedades.e8]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                </tr>
                <tr>
                    <td>Amigdalitis</td>
                    <td>
                        {{ Form::select('enfermedades[e9]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($enfermedades->e9)?$enfermedades->e9:false, [
                                'class' => $errors->has('enfermedades.e9]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                    <td>Anémia</td>
                    <td>
                        {{ Form::select('enfermedades[e10]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($enfermedades->e10)?$enfermedades->e10:false, [
                                'class' => $errors->has('enfermedades.e10]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                </tr>
                <tr>
                    <td>Hepatitis</td>
                    <td>
                        {{ Form::select('enfermedades[e11]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($enfermedades->e11)?$enfermedades->e11:false, [
                                'class' => $errors->has('enfermedades.e11]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                    <td>Neoplasias</td>
                    <td>
                        {{ Form::select('enfermedades[e12]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($enfermedades->e12)?$enfermedades->e12:false, [
                                'class' => $errors->has('enfermedades.e12]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                </tr>
                <tr>
                    <td>¿Otras enfermedades crónicas?</td>
                    <td>
                        {{ Form::select('enfermedades[e13]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($enfermedades->e13)?$enfermedades->e13:false, [
                                'class' => $errors->has('enfermedades.e13]')?'is-invalid form-control':'form-control',
                                'id'=>'select-cronicas'
                        ])}}
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr id="tr-cronicas">

                    <td>Especifique</td>
                    <td colspan="3">
                        {{Form::text('enfermedades[especifique]',
                   isset($enfermedades->especifique)?$enfermedades->especifique:"", [
                  'class' => $errors->has('enfermedades[especifique]')?'is-invalid form-control':'form-control',
                   ])}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12">
        <div>
            <table class="table table-striped">
                <thead>
                <tr align="left">
                    <th colspan="4" style="font-size: 20px"> ¿Ha detectado en el niño (a) que...?<br><br></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>¿Duerme bien durante la noche?</td>
                    <td width="10%">
                        {{ Form::select('detectado[d1]',
                            [
                            true=>"Si",
                            false=>"No",
                            ],
                            isset($detectado->d1)?$detectado->d1:false, [
                                    'class' => $errors->has('detectado[d1]')?'is-invalid form-control':'form-control',
                            ])}}
                    </td>

                    <td>¿Le da fiebre con frecuencia?</td>
                    <td width="10%">
                        {{ Form::select('detectado[d2]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($detectado->d2)?$detectado->d2:false, [
                                'class' => $errors->has('detectado[d2]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                </tr>
                <tr>
                    <td>¿Le falta aire después de hacer ejercicio?</td>
                    <td>
                        {{ Form::select('detectado[d3]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($detectado->d3)?$detectado->d3:false, [
                                'class' => $errors->has('detectado[d3]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>

                    <td>¿Es alérgico a algun medicamento?</td>
                    <td>
                        {{ Form::select('detectado[d4]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($detectado->d4)?$detectado->d4:false, [
                                'class' => $errors->has('detectado[d4]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                </tr>
                <tr>
                    <td>¿Presenta hemorragias? (sangrados frecuentes)</td>
                    <td>
                        {{ Form::select('detectado[d5]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($detectado->d5)?$detectado->d5:false, [
                                'class' => $errors->has('detectado[d5]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>

                    <td>¿Cuenta con algún antecedente médico que le impida a su hijo realizar actividades físicas?</td>
                    <td>
                        {{ Form::select('detectado[d6]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($detectado->d6)?$detectado->d6:false, [
                                'class' => $errors->has('detectado[d6]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                </tr>
                <tr>
                    <td>¿Le duelen las piernas por la noche?</td>
                    <td>
                        {{ Form::select('detectado[d7]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($detectado->d7)?$detectado->d7:false, [
                                'class' => $errors->has('detectado[d7]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>

                    <td>¿Se desmaya con frecuencia?</td>
                    <td>
                        {{ Form::select('detectado[d8]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($detectado->d8)?$detectado->d8:false, [
                                'class' => $errors->has('detectado[d8]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                </tr>
                <tr>
                    <td>¿Es alérgico a algún medicamento y/o bebida?</td>
                    <td>
                        {{ Form::select('detectado[d9]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($detectado->d9)?$detectado->d9:false, [
                                'class' => $errors->has('detectado[d9]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>

                    <td>¿Ha recibido alguna vez transfusión sanguínea?</td>
                    <td>
                        {{ Form::select('detectado[d10]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($detectado->d10)?$detectado->d10:false, [
                                'class' => $errors->has('detectado[d10]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                </tr>
                <tr>
                    <td>¿Tiene impedimento para realizar actividades físicas y/o deportivas?</td>
                    <td>
                        {{ Form::select('detectado[d11]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($detectado->d11)?$detectado->d11:false, [
                                'class' => $errors->has('detectado[d11]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>

                    <td>¿Ha sido intervenido quírurgicamente?</td>
                    <td>
                        {{ Form::select('detectado[d12]',
                        [
                        true=>"Si",
                        false=>"No",
                        ],
                        isset($detectado->d12)?$detectado->d12:false, [
                                'class' => $errors->has('detectado[d12]')?'is-invalid form-control':'form-control',
                        ])}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12">
        <div>
            <table class="table table-striped">
                <thead>
                <tr align="left">
                    <th colspan="4" style="font-size: 20px"> Antecedentes Hereditarios del Alumno</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>¿Tiene algún familiar diabético?</td>
                    <td width="10%">
                        {{ Form::select('antecedente[fam_diab]',
                            [
                            true=>"Si",
                            false=>"No",
                            ],
                            isset($antecedente->fam_diab)?$antecedente->fam_diab:false, [
                                    'class' => $errors->has('antecedente.fam_diab]')?'is-invalid form-control':'form-control',
                                    'id'=>'select-p1'
                            ])}}
                    </td>
                    <td>Parentesco:</td>
                    <td>
                        {{ Form::text('antecedente[parentesco_diab]',
                            isset($antecedente->parentesco_diab)?$antecedente->parentesco_diab:false, [
                                    'class' => $errors->has('antecedente.parentesco_diab]')?'is-invalid form-control':'form-control',
                                    'id'=>'inp-p1'
                            ])}}
                    </td>
                </tr>
                <tr>
                    <td>¿Tiene algún familiar enfermo del corazón?</td>
                    <td width="10%">
                        {{ Form::select('antecedente[fam_cor]',
                            [
                            true=>"Si",
                            false=>"No",
                            ],
                            isset($antecedente->fam_cor)?$antecedente->fam_cor:false, [
                                    'class' => $errors->has('antecedente.fam_cor]')?'is-invalid form-control':'form-control',
                                    'id'=>'select-p2'
                            ])}}
                    </td>

                    <td>Parentesco:</td>
                    <td>
                        {{ Form::text('antecedente[parentesco_cor]',
                            isset($antecedente->parentesco_cor)?$antecedente->parentesco_cor:false, [
                                    'class' => $errors->has('antecedente.parentesco_cor]')?'is-invalid form-control':'form-control',
                                    'id'=>'inp-p2'
                            ])}}
                    </td>
                </tr>

                <tr>
                    <td>¿Tiene algún familiar hipertenso?</td>
                    <td width="10%">
                        {{ Form::select('antecedente[fam_hip]',
                            [
                            true=>"Si",
                            false=>"No",
                            ],
                            isset($antecedente->fam_hip)?$antecedente->fam_hip:false, [
                                    'class' => $errors->has('antecedente.fam_hip]')?'is-invalid form-control':'form-control',
                                    'id'=>'select-p3'
                            ])}}
                    </td>

                    <td>Parentesco:</td>
                    <td>
                        {{ Form::text('antecedente[parentesco_hip]',
                            isset($antecedente->parentesco_hip)?$antecedente->parentesco_hip:false, [
                                    'class' => $errors->has('antecedente.parentesco_hip]')?'is-invalid form-control':'form-control',
                                    'id'=>'inp-p3'
                            ])}}
                    </td>
                </tr>

                <tr>
                    <td>¿Tiene algún familiar enfermo de cáncer?</td>
                    <td width="10%">
                        {{ Form::select('antecedente[fam_can]',
                            [
                            true=>"Si",
                            false=>"No",
                            ],
                            isset($antecedente->fam_can)?$antecedente->fam_can:false, [
                                    'class' => $errors->has('antecedente.fam_can]')?'is-invalid form-control':'form-control',
                                    'id'=>'select-p4'
                            ])}}
                    </td>

                    <td>Parentesco:</td>
                    <td>
                        {{ Form::text('antecedente[parentesco_can]',
                            isset($antecedente->parentesco_can)?$antecedente->parentesco_can:false, [
                                    'class' => $errors->has('antecedente.parentesco_can]')?'is-invalid form-control':'form-control',
                                    'id'=>'inp-p4'
                            ])}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>