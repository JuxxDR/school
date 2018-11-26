@php
    /* @var $alumno \App\Model\Alumno*/
    /* @var $salud \App\model\InfSalud*/
    /* @var $enfermedades \App\model\Enfermedades*/
    /* @var $antecedentes \App\model\AntecedesntesHereditarios*/
    /* @var $detectado \App\model\Detectado */
    /* @var $inscripcion  \App\model\Inscripciones*/
    /* @var $familia  \App\model\Familias*/
    /* @var $madre  \App\model\Padre*/
    /* @var $padre\App\model\Padre*/
    /* @var $emergencia\App\model\Emergencia*/
    /* @var $eventos\App\model\Eventos*/
    /* @var $personasAut\App\model\PersonasAut*/





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
$enfermedadesDef[]=" ";

$enfermedadesVal=$enfermedades->attributesToArray();
unset($enfermedadesVal['salud_id']);
unset($enfermedadesVal['updated_at']);
unset($enfermedadesVal['created_at']);
unset($enfermedadesVal['remember_token']);
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
unset($detectadoVal['remember_token']);
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
unset($antecedentesVal['remember_token']);

@endphp
<div style="text-align: justify; font: menu">
    <div id="cabecera" style="text-align: right">
        <p style="">
            @if(Session::has('reinscripcion'))
                <b>No. Control del alumno: {{$alumno->no_control}}</b>
            @else
                <b>Ficha : {{$inscripcion->folio->folio}}</b>
            @endif
        </p>
        <p style="">
            Ciclo Escolar 2018-2019
        </p>
        <p style="">
            Grado: {{$alumno->grado}} Grupo:______
        </p>
    </div>
    <div id="datos_alumno">
        <h5><b>Datos del alumno</b></h5>
        <p style="font-size: 1em; text-align: justify;">
            {{----}}
            Nombre:
            <b>{{$alumno->nombre}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}</b>
            <br>
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
            Código Postal:
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
    </div>
    <div id="datos_padres">
        <h5><b>Núcleo familiar</b></h5>
        <h6 style="margin-left: 10%"><b>•Madre</b></h6>
        <p style="font-size: 1em; text-align: justify;">
            {{----}}
            Nombre:
            <b>{{$madre->nombre_completo}}</b>
            {{----}}
            C.U.R.P.:
            <b>{{$madre->curp}}</b>
            {{----}}
            Nivel de estudios:
            <b>{{$madre->nivel_estudios}}</b>
            {{----}}
            Ocupación:
            <b>{{$madre->ocupacion}}</b>
            {{----}}
            Lugar de trabajo:
            <b>{{$madre->lugar_trabajo}}</b>
            {{----}}
            Estádo civil:
            <b>{{$madre->edo_civil}}</b>
            {{----}}
            Teléfono fijo:
            <b>{{$madre->tel_fijo}}</b>
            {{----}}
            Teléfono celular:
            <b>{{$madre->celular}}</b>
            {{----}}
            Correo :
            <b>{{$madre->email}}</b>
            {{----}}
            Red social :
            <b>{{$madre->red_social}}</b>
        </p>
        <h6 style="margin-left: 10%"><b>Dirección</b></h6>
        <p style="font-size: 1em; text-align: justify;">
            {{----}}
            Calle:
            <b>{{$madre->calle}}</b>
            {{----}}
            No.Ext:
            <b>{{$madre->no_ext}}</b>
            {{----}}
            No.Int:
            <b>{{$madre->no_int}}</b>
            {{----}}
            Colonia:
            <b>{{$madre->colonia}}</b>

            {{----}}
            Entre la calle:
            <b>{{$madre->entre_calle1}}</b>
            {{----}}
            Y la calle:
            <b>{{$madre->entre_calle2}}</b>
            {{----}}
            Código Postal:
            <b>{{$madre->cp}}</b>

        </p>
        {{--PADRE--}}
        <h6 style="margin-left: 10%"><b>•Padre</b></h6>
        <p style="font-size: 1em; text-align: justify;">
            {{----}}
            Nombre:
            <b>{{$padre->nombre_completo}}</b>
            {{----}}
            C.U.R.P.:
            <b>{{$padre->curp}}</b>
            {{----}}
            Nivel de estudios:
            <b>{{$padre->nivel_estudios}}</b>
            {{----}}
            Ocupación:
            <b>{{$padre->ocupacion}}</b>
            {{----}}
            Lugar de trabajo:
            <b>{{$padre->lugar_trabajo}}</b>
            {{----}}
            Estádo civil:
            <b>{{$padre->edo_civil}}</b>
            {{----}}
            Teléfono fijo:
            <b>{{$padre->tel_fijo}}</b>
            {{----}}
            Teléfono celular:
            <b>{{$padre->celular}}</b>
            {{----}}
            Correo :
            <b>{{$padre->email}}</b>
            {{----}}
            Red social :
            <b>{{$padre->red_social}}</b>
        </p>
        <h6 style="margin-left: 10%"><b>Dirección</b></h6>
        <p style="font-size: 1em; text-align: justify;">
            {{----}}
            Calle:
            <b>{{$padre->calle}}</b>
            {{----}}
            No.Ext:
            <b>{{$padre->no_ext}}</b>
            {{----}}
            No.Int:
            <b>{{$padre->no_int}}</b>
            {{----}}
            Colonia:
            <b>{{$padre->colonia}}</b>

            {{----}}
            Entre la calle:
            <b>{{$padre->entre_calle1}}</b>
            {{----}}
            Y la calle:
            <b>{{$padre->entre_calle2}}</b>
            {{----}}
            Código Postal:
            <b>{{$padre->cp}}</b>

        </p>
    </div>
    <div id="datos-familia" style="text-align: justify; font: menu">
        <h5><b>Integración familiar</b></h5>
        <p style="font-size: 1em; text-align: justify;">
            Número de integrantes de la familia:
            <b>{{$familia->integrantes}}</b>
            {{----}}
            Número de hijos:
            <b>{{$familia->numero_hermanos}}</b>
            {{----}}
            Número que ocupa entre hermanos:
            <b>{{$familia->lugar_hermanos}}</b>
            {{----}}
            Los padres viven juntos:
            <b>{{$familia->padres_juntos?"Si":"No"}}</b>
            {{----}}
        </p>
    </div>

    <div class="header"></div>
    <div id="datos-emergencia" class="new_page">
        <h5><b>Contactos de emergencia</b></h5>
        <p style="font-size: 1em; text-align: justify;">
            1 )
            Nombre:
            <b>{{$emergencia->nombre1}}</b>
            Patentezco:
            <b>{{$emergencia->parentesco1}}</b>
            Teléfono fijo:
            <b>{{$emergencia->tel_fijo1}}</b>
            Celular
            <b>{{$emergencia->celular1}}</b>
        </p>
        <p style="font-size: 1em; text-align: justify;">
            2 )
            Nombre:
            <b>{{$emergencia->nombre2}}</b>
            Patentezco:
            <b>{{$emergencia->parentesco2}}</b>
            Teléfono fijo:
            <b>{{$emergencia->tel_fijo2}}</b>
            Celular
            <b>{{$emergencia->celular2}}</b>
        </p>
    </div>
    <div id="leyenda-1">
        <p style="font-size: 1em; text-align: justify;">
        <p>
            Me comprometo que en caso de algún cambio en mi número telefónico y/o domicilio, informaré inmediatamente
            por escrito a la autoridad educativa”. Atendiendo al protocolo de atención en caso de emergencia y de seguro
            escolar.
            <br>Nombre del padre o tutor:_____________________________________
            <br>
            <br>FIRMA DE ENTERADO ____________________________________________
        </p>
    </div>
    <div id="datos-eventos">
        <p style="font-size: 1em; text-align: justify;">
        <h5><b>Posibilidad de participar en eventos</b></h5>
        Culturales:
        <b>{{$eventos->cultural?"Si":"No"}}</b>
        Deportivos:
        <b>{{$eventos->deportivo?"Si":"No"}}</b>
        Excursiones:
        <b>{{$eventos->excursion?"Si":"No"}}</b>
        Recreativos:
        <b>{{$eventos->recreativo?"Si":"No"}}</b>
        Convivencia familiar:
        <b>{{$eventos->conv_fam?"Si":"No"}}</b>
        Clases abiertas:
        <b>{{$eventos->clase_abierta?"Si":"No"}}</b>
        Cívicos:
        <b>{{$eventos->civicos?"Si":"No"}}</b>
        ¿Cuantas veces puede asisir?
        <b>{{$eventos->pos_asistir}}</b>
        </p>
        <p style="font-size: 1em; text-align: justify;">
        <br>
        <h6><b>1) ¿Como sugiere que se realice el mantenimiento y equipamiento de la escuela?</b></h6>
        {{$eventos->manto_equip}}
        </p>
        <p style="font-size: 1em; text-align: justify;">
        <h6><b>2) ¿Como seria su participación para lograr un espacio educativo digno?</b></h6>
        {{$eventos->participacion}}
        </p>
        <p style="font-size: 1em; text-align: justify;">
        <h6><b>3) ¿De que manera comprende mejor usted, acerca  de los avances en los logros del aprendizaje de su hijo(a)?</b></h6>
        {{$eventos->avances}}
        </p>
        <p style="font-size: 1em; text-align: justify;">
        <h6><b>4) ¿Esta de acuerdo que la docente de su hijo(a) lo premie en algunas ocasiones con una etiqueta adherible o con un dulce?</b></h6>
        {{$eventos->premio}}
        </p>
        <p style="font-size: 1em; text-align: justify;">
        <h6><b>5) ¿A que me comprometo con el nuevo modelo educativo?</b></h6>
        {{$eventos->compromiso}}
        </p>
        <p style="font-size: 1em; text-align: justify;">
        <h6><b>6) ¿De que manera considera que se debe dar la comunicación entre padres de familia y escuela?</b></h6>
        {{$eventos->comunicacion}}
        </p>
        <p style="font-size: 1em; text-align: justify;">
        <h6><b>7) ¿Cuales son sus expectativas de la Institución para este ciclo escolar?</b></h6>
        {{$eventos->espectativa}}
        </p>

    </div>
    <div class="footer"></div>

    <div id="datos-autorizadas" class="new_page">
        <h5><b>Datos administrativos</b></h5>
        <p style="font-size: 1em; text-align: justify;">
            PERSONAS AUTORIZADAS PARA RECOGER AL NIÑO:
            <br>
            <br>
            ME COMPROMETO A DAR AISO A LA INSTITUCIÓN EN DADO CASO QUE NO PUEDA ASISTIR A RECOER A MI HIJO POR ALGUNA
            SITUACIÓN, SIENDO ESTAS LAS PERSONAS AUTORIZADAS ÚNICAMENTE PARA LLEVÁRSELO.
            <br>
            1.-{{$personasAut->nombre1}}
            <br>
            2.-{{$personasAut->nombre2}}
            <br>
            3.-{{$personasAut->nombre3}}
            <br>
            4.-{{$personasAut->nombre4}}
            <br>
            NOMBRE DEL PADRE O TUTOR: _________________________
            <br>
            <br>
            FIRMA DE AUORIZACIÓN: _______________________

        </p>
    </div>
    <div id="documentos-entregados">
        <table>
            <thead>
            <tr style="text-align: center">
                <th colspan="4"><b>Documentos entregados()</b></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Acta de nacimiento</td>
                <td>&nbsp;</td>
                <td>Cartilla de vacunación</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Fotografías</td>
                <td>&nbsp;</td>
                <td>CURP</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Comprobante Dom</td>
                <td>&nbsp;</td>
                <td>Identificación Padres</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Certificado Médico</td>
                <td>&nbsp;</td>
                <td>CURP papá, mamá</td>
                <td>&nbsp;</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="leyenda-3">
        <p style="font-size: 1em; text-align: justify;">
            BAJO PROTESTA DECIR VERDAD, CONOZCO Y ACEPTO LAS “NORMAS DE CONTROL ESCOLAR RELATIVAS A LA INSCRIPCIÓN,
            REINSCRIPCIÓN, ACREDITACIÓN, PROMOCIÓN, REGULARIZACIÓN Y CERTIFICACIÓN EN LA EDUCACIÓN BÁSICA”, VIGENTES
            EMITIDAS POR LA “DIRECCIÓN GENERAL DE ACREDITACIÓN, INCORPORACIÓN Y REVALIDACIÓN” DE LA SECRETARÍA DE
            EDUCACIÓN PÚBLICA.
        </p>
        <p style="font-size: 1em; text-align: justify;">
            LOS DATOS PERSONALES SERÁN PROTEGIDOS INCORPORADOS Y TRATADOS SEGÚN CORRESPONDA EN EL SISTEMA DE DATOS
            PERSONALES QUE ADMINISTRARÁN LA AUTORIDAD EDUCATIVA FEDERAL Y LAS AUTORIDADES EDUCATIVAS LOCALES DENOMINADO
            “REGISTRO NACIONAL DE ALUMNOS (RNA) Y EL REGISTRO NACIONAL DE EMISIÓN, VALIDACIÓN E INSCRIPCIÓN DE
            DOCUMENTOS ACADÉMICOS (RODAC), SISTEMAS QUE HAN SIDO DEBIDAMENTE INSCRITOS EN EL LISTADO DE SISTEMAS DE
            DATOS PERSONALES ANTE EL INSTITUTO FEDERAL DE ACCESO A LA INFORMACION PUBLICA (IFAI) CON FECHA 8 DE JULIO DE
            2009. www.ifai.org.mx http://www.controlescolar.sep.gob.mx ”
        </p>
    </div>


    <div id="datos-salud" class="new_page">
        <h5><b>Historia Medica del Alumno</b></h5>
        {{----}}
        <p style="font-size: 1em; text-align: justify;">
            Enfermedades que ha padecido:
            <b>{{$salud->enfermedad}}</b>
            {{----}}
            Vacunas Aplicadas:
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
    </div>
    <div id="datos-enfermedades" >
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
    <div id="datos-detectado">
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
    <div id="datos-antecedentes">
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <div id="leyenda-4" class="new_page">
        <p style="font-size: 1em; text-align: justify;">
            BAJO PROTESTA DE DECIR LA VERDAD MANIFIESTO QUE LAS RESPUESTAS DEL CUESTIONARIO CORRESPONDE A MI
            HIJO(A)<b> {{$alumno->nombre}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}</b>
            QUE CURSARA EL <b>{{$alumno->grado}} er.</b> GRADO DE PREESCOLAR EN LA ESCUELA MA.LUISA
            BALLINA ESCARTIN DEL MUNICIPIO DE TOLUCA. ASIMISMO, AL FIRMAR ESTE DOCUMENTO AUTORIZO A LA INSTITUCIÓN QUE
            PUEDA HACER USO DE LA INFORMACION CUANDO SEA NECESARIO Y EN EL CASO DE QUE DURANTE EL CICLO ESCOLAR, MI
            HIJO(A) PRESENTARÁ ALGUNA SINTOMATOLOGÍA O ENFERMEDAD QUE LIMITE SI DESEMPEÑO EN ALGUNA ACTIVIDAD A REALIZAR
            EN LA ESCUELA, ME COMPROMETO A INFÓRMALE INMEDIATAMENTE POR ESCRITO.
        </p>
        <table style="border: none;width: 100%">
            <thead>
            <tr>
                <th style="text-align: center;border: none">

                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align: center;border: none">____________________________________</td>
            </tr>
            <tr>
                <td style="text-align: center;border: none">NOMBRE Y FIRMA DEL PADRE O TUTOR</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="leyenda-5">
        <p style="font-size: 1em; text-align: justify;">
            CONSIDERANDO QUE LA INSTITUCIÓN, PROMUEVE EL DESARROLLO INTEGRAL Y PERTINENTE A LAS CAPACIDADES FÍSICAS E
            INTELECTUALES D ELLOS ALUMNOS; ASI COMO DE SUS ACTITUDES Y VALORES, SE REQUIERE DETERMINE SI AUTORIZA QUE SU
            HIJO REALICE ACTIVIDADES ESCOLARES PROGRAMADAS
        </p>
        <span style="font-size: 1em; text-align: justify;">
            <table style="border: none">
                <thead>
                <tr>
                    <th style="text-align: center;border: none">
                        SI AUTORIZO
                    </th>
                    <th style="text-align: center;border: none">
                        NO AUTORIZO
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="text-align: center;border: none">______________________________</td>
                    <td style="text-align: center;border: none">______________________________</td>
                </tr>
                <tr>
                    <td style="text-align: center;border: none">NOMBRE Y FIRMA</td>
                    <td style="text-align: center;border: none">NOMBRE Y FIRMA</td>
                </tr>
                </tbody>
            </table>

            <table style="border: none;width: 100%">
                <thead>
                <tr>
                    <th style="text-align: center;border: none">

                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="text-align: center;border: none">Toluca,Méx______________________</td>
                </tr>
                <tr>
                    <td style="text-align: center;border: none">LUGAR Y FECHA</td>
                </tr>
                </tbody>
            </table>
        <br>
        </span>
    </div>


    <div id="leyenda-6" class="new_page">
        <h6><b>AUTORIZACION DE REPRODUCCIÓN DE IMAGEN POR PARTE DEL PADRE O TUTOR DEL ALUMNO</b></h6>

        <p style="font-size: 1em; text-align: right;">
            Toluca Méx a ____fecha: {{\Carbon\Carbon::now()->format('d-m-Y')}}
        </p>
        <p style="font-size: 1em; text-align: justify;">
            CLa (el) que suscribe,_________________________________en calidad de padre o tutor del (a)
            menor <b>{{$alumno->nombre}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}</b>
            estando en pleno goce y ejercicio de mis derechos civiles,

            autorizo a la Secretaria de Educación Pública (SEP) del Gobierno Federal la reproducción de la imágenes y
            videos del(a)menor <b>{{$alumno->nombre}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}</b>
            para los materiales educativos a cargo de la SEP.
        </p>
        <p style="font-size: 1em; text-align: justify;">
            Por lo anterior, esa dependencia podrá fijar, editar, reproducir, publicar y distribuir las imágenes y
            videos del (a) menor
            <b>{{$alumno->nombre}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}</b>
            en la edición de los materiales educativos, asi como las
            subsecuentes ediciones y/o reimpresiones y en cualquier tipo de material, de conformidad con los artículos
            27 fracción 1 y 87 de la Ley Federal de Derecho de Autor vigente. Se anexa para conocimiento del firmante.
        </p>

        <p style="font-size: 1em; text-align: justify;">
            Asi mismo autorizo que la Profra. __________________________ pueda hacer uso de fotografías y videos para la
            evaluación y seguimiento de mi hijo(a), misma que integraran en el expediente personal y portafolio de
            evidencias, presentaciones en rendición de cuentas, durante el ciclo escolar 2017-2018.
        </p>
        <table style="border: none;width: 100%">
            <thead>
            <tr>
                <th style="text-align: center;border: none">

                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align: center;border: none">____________________________________</td>
            </tr>
            <tr>
                <td style="text-align: center;border: none">NOMBRE Y FIRMA DEL PADRE O TUTOR</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div id="leyenda-8" class="new_page">
        <p style="font-size: 1em; text-align: justify;">
            Una vez se ha completado el proceso de Inscripción/reinscripción, se ha otorgado un Numero de Alumno y
            Contraseña, los cuales permitirán acceder a la plataforma para lograr visualizar el seguimiento del alumno,
            como también diversos avisos o notificaciones por parte de la institución. Esta informacion (No.Alumno y
            Contraseña) deberá guardarla en un lugar seguro ,pues se le solicitará en caso de acceder a la plataforma en
            línea, siendo único para cada alumno.
            <br>
            <br>
            Datos de ingreso a plataforma web:
        </p>
        <h5><b>No. Alumno: {{$alumno->no_control}}</b></h5>
        <h5><b>Contraseña: {{$alumno->password}}</b></h5>
    </div>

    <div id="leyenda-7" style="border: 1px black solid; margin-top: 20px">
        <h6 style="text-align: center"><b>Tarjeta de emergencia</b></h6>
        <table style="border: none;width: 100%">
            <thead>
            <tr>
                <th style="text-align: center;border: none">

                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="border: none">Nombre del alumno</td>
                <td colspan="3" style="border: none">
                    <b>{{$alumno->nombre}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}</b></td>
            </tr>
            <tr>
                <td style="border: none">Tipo de Sangre</td>
                <td style="border: none"><b>{{$salud->tipo_sangre}}</b></td>
                <td style="border: none">Teléfono</td>
                <td style="border: none"><b>{{$alumno->tel_casa}}</b></td>
            </tr>
            <tr>
                <td style="border: none">Enfermedades que padece</td>
                <td colspan="3" style="border: none">
                    ______________________________
                </td>
            </tr>
            <tr>
                <td style="border: none">Direccion</td>
                <td colspan="3" style="border: none">
                    <b>{{$alumno->calle}}, {{$alumno->no_int}}, {{$alumno->no_ext}}, {{$alumno->colonia}}
                        {{$alumno->municipio}}, {{$alumno->estado}}
                    </b></td>
            </tr>
            <tr>
                <td style="border: none">Nombre del padre</td>
                <td style="border: none"><b>{{$padre->nombre_completo}}</b></td>

                <td style="border: none">Celuar</td>
                <td style="border: none"><b>{{$padre->celular}}</b></td>
            </tr>
            <tr>
                <td style="border: none">Nombre de la madre</td>
                <td style="border: none"><b>{{$madre->nombre_completo}}</b></td>

                <td style="border: none">Celuar</td>
                <td style="border: none"><b>{{$madre->celular}}</b></td>
            </tr>
            <tr>
                <td style="border: none">En caso de emergencia llamar a:</td>
                <td colspan="3" style="border: none">______________________________</td>
            </tr>
            <tr>
                <td style="border: none">Hospital en caso de emergencia:</td>
                <td colspan="3" style="border: none">______________________________</td>
            </tr>
            </tbody>
        </table>
        <p style="font-size: 1em; text-align: justify;">
            “ME COMPROMETO A QUE EN CASO DE ALGUN CAMBIO EN MI NUMERO TELEFÓNICO Y/O DOMICILIO, INFORMARÉ INMEDIATAMENTE
            POR ESCRITO A LA
            AUTORIDAD EDUCATIVA”, ATENDIENDO AL PROTOCOLO DE ATENCIÓN EN CASO DE EMERGENCIA Y DE SEGURO ESCOLAR”
        </p>
    </div>
    <div id="leyenda-8" class="new_page">
        <p style="font-size: 1em; text-align: justify; font-family: Arial,serif; font-style: normal">
            “ME COMPROMETO A QUE EN CASO DE ALGUN CAMBIO EN MI NUMERO TELEFÓNICO Y/O DOMICILIO, INFORMARÉ INMEDIATAMENTE
            POR ESCRITO A LA AUTORIDAD EDUCATIVA”, ATENDIENDO AL PROTOCOLO DE ATENCIÓN EN CASO DE EMERGENCIA Y DE SEGURO
            ESCOLAR”
        </p>
        @if(!Session::has('reinscripcion'))
            <h5><b>No. Alumno: {{$alumno->no_control}}</b></h5>
            <h5><b>Contraseña: {{$alumno->password}}</b></h5>
        @endif
    </div>

</div>