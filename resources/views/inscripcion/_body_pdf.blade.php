@php
    /* @var $alumno \App\Model\Alumno*/
    /* @var $salud \App\model\InfSalud*/
    /* @var $enfermedade \App\model\Enfermedades*/
    /* @var $antecedente \App\model\AntecedesntesHereditarios*/
    /* @var $detectado \App\model\Detectado */
    /* @var $inscripcion  \App\model\Inscripciones*/
@endphp
<div style="text-align: justify; font: menu">
    <h5><b>Datos del alumno</b></h5>
    <p style="font-size: 1.5em" style="font-size: 1.5em">
        {{----}}
        Nombre:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->nombre}}">
            <input type="text" class="pdf-input" value="{{$alumno->apellidoP}}">
            <input type="text" class="pdf-input" value="{{$alumno->apellidoM}}">
        @else
            <b> {{$alumno->nombre}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}</b>
        @endif
        {{----}}
        CURP:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->curp}}">
        @else
            <b> {{$alumno->curp}}</b>
        @endif
    </p>
    <p style="font-size: 1.5em">
        {{----}}
        Fecha de nacimiento:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->fecha_nacimiento}}">
        @else
            <b> {{$alumno->fecha_nacimiento}}</b>
        @endif
        {{----}}
        Entidad de nacimiento:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->estado}}">
        @else
            <b> {{$alumno->estado}}</b>
        @endif
        {{----}}
        Edad:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->edad}}">
        @else
            <b> {{$alumno->edad}}</b>
        @endif
    </p>
    <p style="font-size: 1.5em">
        {{----}}
        Calle:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->calle}}">
        @else
            <b> {{$alumno->calle}}</b>
        @endif
        {{----}}
        No.Ext:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->no_ext}}">
        @else
            <b> {{$alumno->no_ext}}</b>
        @endif
        {{----}}
        No.Int:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->no_int}}">
        @else
            <b> {{$alumno->no_int}}</b>
        @endif
        {{----}}
        Colonia:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->colonia}}">
        @else
            <b> {{$alumno->colonia}}</b>
        @endif
    </p>
    <p style="font-size: 1.5em">
        {{----}}
        Entre la calle:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->entre_calle1}}">
        @else
            <b> {{$alumno->entre_calle1}}</b>
        @endif
        {{----}}
        Y la calle:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->entre_calle2}}">
        @else
            <b> {{$alumno->entre_calle2}}</b>
        @endif
        {{----}}
        Código postal:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->cp}}">
        @else
            <b> {{$alumno->cp}}</b>
        @endif
    </p>
    <p style="font-size: 1.5em">
        {{----}}
        Punto de referencia:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->punto_referencia}}">
        @else
            <b> {{$alumno->punto_referencia}}</b>
        @endif
    </p>
    <p style="font-size: 1.5em">
        {{----}}
        Municipio:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->municipio}}">
        @else
            <b> {{$alumno->municipio}}</b>
        @endif
        {{----}}
        Teléfono de casa:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->tel_casa}}">
        @else
            <b> {{$alumno->tel_casa}}</b>
        @endif
        {{----}}
        Teléfono celular:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->cel}}">
        @else
            <b> {{$alumno->cel}}</b>
        @endif
    </p>
    <p style="font-size: 1.5em">
        {{----}}
        Edad años:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->edad}}">
        @else
            <b> {{$alumno->edad}}</b>
        @endif
        {{----}}
        Meses:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->meses}}">
        @else
            <b> {{$alumno->meses}}</b>
        @endif
        {{----}}
        Sexo:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$alumno->sexo}}">
        @else
            <b> {{$alumno->sexo}}</b>
        @endif
        {{----}}
        Talla:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$salud->talla}}">
        @else
            <b> {{$salud->talla}}</b>
        @endif
        {{----}}
        Peso:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$salud->peso}}">
        @else
            <b> {{$salud->peso}}</b>
        @endif
    </p>
    <h5><b>Datos de salud</b></h5>
    {{----}}
    <p style="font-size: 1.5em">
        Enfermedades que ha padecido:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$salud->enfermedad}}">
        @else
            <b> {{$salud->enfermedad}}</b>
        @endif
        {{----}}
        Vacunas aplicadas:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$salud->vacunas_aplicadas}}">
        @else
            <b> {{$salud->vacunas_aplicadas}}</b>
        @endif
        {{----}}
        Alergias:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$salud->ban_alergia === 0 ?"No" :"Si"}}">
        @else
            <b> {{$salud->ban_alergia === 0 ?"No" :"Si"}}</b>
        @endif
    </p>
    <p style="font-size: 1.5em">
        {{----}}
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$salud->alergia}}">
        @else
            <b> {{$salud->alergia}}</b>
        @endif
        {{----}}
        Caracteristicas especiales del niño:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$salud->carac_especial}}">
        @else
            <b> {{$salud->carac_especial}}</b>
        @endif
        {{----}}
        Enfermedades que ha padecido el niño en los últimos 12 meses
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$salud->enfermedad_ult_mes}}">
        @else
            <b> {{$salud->enfermedad_ult_mes}}</b>
        @endif
    </p>
    <p style="font-size: 1.5em">
        {{----}}
        Enfermedades que padece con mayor frecuencia;
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$salud->enfermedad_frecuente}}">
        @else
            <b> {{$salud->enfermedad_frecuente}}</b>
        @endif
        {{----}}
        Alergias;
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$salud->ban_alergia ===0 ? "No":"Si" }}">
        @else
            <b> {{$salud->ban_alergia ===0 ? "No":"Si" }}</b>
        @endif
        {{----}}
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$salud->alergia}}">
        @else
            <b> {{$salud->alergia}}</b>
        @endif
    </p>
    <p style="font-size: 1.5em">
        {{----}}
        Médico familiar:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$salud->medico_familiar}}">
        @else
            <b> {{$salud->medico_familiar}}</b>
        @endif
        {{----}}
        Recomendaciónes especiales:
        @if(!isset($pdfOk))
            <input type="text" class="pdf-input" value="{{$salud->recomendaciones_especiales}}">
        @else
            <b> {{$salud->recomendaciones_especiales}}</b>
        @endif
    </p>

</div>