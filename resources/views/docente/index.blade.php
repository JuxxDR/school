@extends('template.aaron.plantilla')
@section('title', 'Docente | Inicio')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h2>Nuestra Historia</h2>
            </div>
            <div class="card-body">
                <p style="text-align: justify">El Jardín de Niños Profra. Ma. Luisa Ballina Escartín se construye en una
                    superficie de 1791 m2 , siendo un área de relleno sanitario el cual fue donado el día 17 de Enero de
                    1987
                    hace 26 años. En el Acta de donación se manifestó en la primera etapa que este terreno sería
                    utilizado para la
                    construcción de un Centro de Educación Preescolar ya que la comunidad no contaba con una institución
                    que
                    prestara el servicio. Siendo la encargada de esta gestión la Profra. Ma. Celsa Alarcón Toledo, quién
                    estuvo
                    en la Dirección de la institución durante 24 años.<br><br>

                    En el año 2010 se jubila la profesora y se asigna en febrero del 2011 a la L.E.P. Marcela Arochi
                    Portilla
                    como Directora Escolar de la Institución, quien hasta la fecha funge con esa función.La institución
                    cuenta con 7 grupos y con el área de USAER desde hace 16 años en donde el equipo docente
                    integra de manera regular a alumnos con discapacidad.El Jardín de Niños Profra. Ma. Luisa Ballina
                    Escartin es una institución cuya misión es brindar un servicio
                    educativo de calidad, en donde directivos y docentes, estan comprometidos a lograr los propósitos
                    fundamentales de la educación preescolar, propiciando ambientes de aprendizaje, atendiendo a la
                    diversidad
                    que los lleven al desarrollo de competencias, práctica de valores, generando un deseo permanente de
                    aprender
                    a aprender y aprender a convivir.<br><br>


                    Con la visión de ser una escuela comprometida con la formación de los alumnos y alumnas en el que
                    Directivos
                    y docentes fungen como estrategas comprometidos con la mejora de la calidad educativa a través del
                    fortalecimiento de los procesos pedagógicos de enseñanza-aprendizaje propiciando actividades
                    pertinentes que
                    garanticen el logro de los propósitos educativos generando permanentemente el deseo de aprender a
                    aprender y
                    aprender a convivir, a fin de que afronten exitosamente las exigencias sociales y personales de cada
                    etapa
                    de la vida fortaleciendo el desarrollo de valores y actitudes con una actitud corresponsable y
                    activa de la
                    comunidad escolar en donde junto con los padres asuman un compromiso por la educación de sus hijos
                    para
                    llegar a una meta común.<br><br></p>
            </div>
        </div>
    </div>
@endsection