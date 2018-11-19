@php
    /* @var $alumno \App\Model\Alumno*/
    /* @var $salud \App\model\InfSalud*/
    /* @var $enfermedades \App\model\Enfermedades*/
    /* @var $antecedentes \App\model\AntecedesntesHereditarios*/
    /* @var $detectado \App\model\Detectado */
    /* @var $inscripcion  \App\model\Inscripciones*/

$enfermedadesDef=[];
$enfermedadesDef[]="Sobre peso u obesidad";
$enfermedadesDef[]="Enfermedades del corazón";
$enfermedadesDef[]="Bronquitis";
$enfermedadesDef[]="Hemorragias";
$enfermedadesDef[]="Epilepsia";
$enfermedadesDef[]="Fiebre reumática";
$enfermedadesDef[]="Cáncer";
$enfermedadesDef[]="Diabetes";
$enfermedadesDef[]="Amigdalitis";
$enfermedadesDef[]="Anémia";
$enfermedadesDef[]="Hepatitis";
$enfermedadesDef[]="Neoplasias";
$enfermedadesDef[]="Enfermedades cónicas";
$enfermedadesDef[]=" ";

$enfermedadesVal=$enfermedades->attributesToArray();
unset($enfermedadesVal['salud_id']);
unset($enfermedadesVal['updated_at']);
unset($enfermedadesVal['created_at']);
unset($enfermedadesVal['id']);

$detectadoDef[]="¿Duerme bien durante la noche?";
$detectadoDef[]="¿Le da fiebre con frecuencia?";
$detectadoDef[]="¿Le falta aire despues de hacer ejercicio?";
$detectadoDef[]="¿Es alergico a algun medicamento?";
$detectadoDef[]="¿Presenta hemorragias?";
$detectadoDef[]="¿Cuenta con algun antecedente médico que le impida a su hijo realizar actividades fisicas?";
$detectadoDef[]="¿Le duelen las piernas por la noche?";
$detectadoDef[]="¿Se desmaya con frecuencia?";
$detectadoDef[]="¿Es alergico a algun medicamento y/o bebida?";
$detectadoDef[]="¿Ha recibido alguna vez tranfusión sanguínea?";
$detectadoDef[]="¿Tiene impedimento para realizar actividades físicas?";
$detectadoDef[]="¿Ha sido intervenido quírurgicamente?";

$detectadoVal=$detectado->attributesToArray();
unset($detectadoVal['salud_id']);
unset($detectadoVal['updated_at']);
unset($detectadoVal['created_at']);
unset($detectadoVal['id']);


$antecedentesDef[]="¿Tiene algun familiar diabético?";
$antecedentesDef[]="¿Tiene algun familiar enfermo del corazón?";
$antecedentesDef[]="¿Tiene algun familiar hipertenso?";
$antecedentesDef[]="¿Tiene algun familiar enfermo de cáncer?";

$antecedentesVal=$antecedentes->attributesToArray();
unset($antecedentesVal['salud_id']);
unset($antecedentesVal['updated_at']);
unset($antecedentesVal['created_at']);
unset($antecedentesVal['id']);
unset($antecedentesVal['fam_diab']);
unset($antecedentesVal['fam_cor']);
unset($antecedentesVal['fam_hip']);
unset($antecedentesVal['fam_can']);

@endphp
<div style="text-align: justify; font: menu">
    <h5><b>Datos del alumno</b></h5>
    <p style="font-size: 1em; text-align: justify; font-family: Arial,serif; font-style: normal">
        {{----}}
        Nombre:
        <b>{{$alumno->nombre}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}</b>
        {{----}}
        CURP:
        <b>{{$alumno->curp}}</b>

        {{----}}
        Fecha de nacimiento:
        <b>{{\App\Model\Alumno::setDateAttribute($alumno->fecha_nacimiento)}}</b>
        {{----}}
        Entidad de nacimiento:
        <b>{{$alumno->estado}}</b>
        {{----}}
        Edad:
        <b>{{$alumno->edad}}</b>

        {{----}}
        Calle:
        <b>{{$alumno->calle}}</b>
        {{----}}
        No.Ext:
        <b>{{$alumno->no_ext}}</b>
        {{----}}
        No.Int:
        <b>{{$alumno->no_int}}</b>
        {{----}}
        Colonia:
        <b>{{$alumno->colonia}}</b>

        {{----}}
        Entre la calle:
        <b>{{$alumno->entre_calle1}}</b>
        {{----}}
        Y la calle:
        <b>{{$alumno->entre_calle2}}</b>
        {{----}}
        Código postal:
        <b>{{$alumno->cp}}</b>

        {{----}}
        Punto de referencia:
        <b>{{$alumno->punto_referencia}}</b>

        {{----}}
        Municipio:
        <b>{{$alumno->municipio}}</b>
        {{----}}
        Teléfono de casa:
        <b>{{$alumno->tel_casa}}</b>
        {{----}}
        Teléfono celular:
        <b>{{$alumno->cel}}</b>

        {{----}}
        Edad años:
        <b>{{$alumno->edad}}</b>
        {{----}}
        Meses:
        <b>{{$alumno->meses}}</b>
        {{----}}
        Sexo:
        <b>{{$alumno->sexo}}</b>
        {{----}}
        Talla:
        <b>{{$salud->talla}}</b>
        {{----}}
        Peso:
        <b>{{$salud->peso}}</b>
    </p>
    <h5><b>Datos de salud</b></h5>
    {{----}}
    <p style="font-size: 1em; text-align: justify ">
        Enfermedades que ha padecido:
        <b>{{$salud->enfermedad}}</b>
        {{----}}
        Vacunas aplicadas:
        <b>{{$salud->vacunas_aplicadas}}</b>
        {{----}}
        Alergias:
        <b>{{$salud->ban_alergia === 0 ?"No" :"Si"}}</b>

        {{----}}
        <b>{{$salud->alergia}}</b>
        {{----}}
        Caracteristicas especiales del niño:
        <b>{{$salud->carac_especial}}</b>
        {{----}}
        Enfermedades que ha padecido el niño en los últimos 12 meses
        <b>{{$salud->enfermedad_ult_mes}}</b>

        {{----}}
        Enfermedades que padece con mayor frecuencia:
        <b>{{$salud->enfermedad_frecuente}}</b>
        {{----}}
        Alergias:
        <b>{{$salud->ban_alergia ===0 ? "No":"Si" }}</b>
        {{----}}
        <b>{{$salud->alergia}}</b>

        {{----}}
        Médico familiar:
        <b>{{$salud->medico_familiar}}</b>
        {{----}}
        Recomendaciónes especiales:
        <b>{{isset($salud->recomendaciones_especiales)?:'S/n'}}</b>
    </p>

    <div id="div-enfermedades">
        <table>
            <thead>
            <tr style="text-align: center">
                <th colspan="4"> Enfermedades que presenta el infante</th>
            </tr>
            </thead>
            <tbody>
            @foreach($enfermedadesVal as $enfermedad)
                @if($loop->index %2 ===0)
                    <tr>
                        <td>
                            {{$enfermedadesDef[$loop->index]}}
                        </td>
                        <td style="text-align: center">
                            {{$enfermedad==1?"Si":"No"}}
                        </td>
                        @else
                            @if($loop->index === 13)
                                <td colspan="2">
                                    {{$enfermedad}}
                                </td>
                            @else
                                <td>
                                    {{$enfermedadesDef[$loop->index]}}
                                </td>
                                <td style="text-align: center">
                                    {{$enfermedad==1?"Si":"No"}}
                                </td>
                            @endif
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
    <div id="div-detectado">
        <table>
            <thead>
            <tr style="text-align: center">
                <th colspan="4">Insidencias presentadas en el infante</th>
            </tr>
            </thead>
            <tbody>
            @foreach($detectadoVal as $detectado)
                @if($loop->index %2 ===0)
                    <tr>
                        <td>
                            {{$detectadoDef[$loop->index]}}
                        </td>
                        <td style="text-align: center">
                            {{$detectado==1?"Si":"No"}}
                        </td>
                        @else
                            <td>
                                {{$detectadoDef[$loop->index]}}
                            </td>
                            <td style="text-align: center">
                                {{$detectado==1?"Si":"No"}}
                            </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
    <div id="div-antecedentes">
        <table>
            <thead>
            <tr style="text-align: center">
                <th colspan="2">Antecedentes del infante</th>
            </tr>
            </thead>
            <tbody>
            @foreach($antecedentesVal as $antecedentes)
                <tr>
                    <td>
                        {{$antecedentesDef[$loop->index]}}
                    </td>
                    <td style="text-align: center">
                        {{$antecedentes?:"No"}}
                    </td>
                    </td>
            @endforeach
            </tbody>
        </table>
    </div>


</div>