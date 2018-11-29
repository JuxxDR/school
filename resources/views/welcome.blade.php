<?php
?>

@extends('template.main')
@section('title', 'Bienvenido')

@section('content')
    <div class="container">
        <div class="container">
            <br>
            <center>
            	<div id="demo" class="carousel slide" data-ride="carousel" style="width: 750px;height: 400px;">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner" style="width: 750px;height: 400px;">
                    <div class="carousel-item active" style="text-align: center;">
                        <img src="{{ asset('img/M1.jpg') }}" alt="Incentivacon" width="750" height="400">
                        <div class="carousel-caption" style="background-color: black; opacity: 0.6;">
                            <h3>Clases de integración</h3>
                            <p>Favoreciendo el trabajo en equipo</p>
                        </div>
                    </div>
                    <div class="carousel-item" style="text-align: center;">
                        <img src="{{ asset('img/M2.jpg') }}" alt="Herramientas" width="750" height="400">
                        <div class="carousel-caption" style="background-color: black; opacity: 0.6;">
                            <h3>Exploración de nuevas herramientas</h3>
                            <p>La importancia de reciclar</p>
                        </div>
                    </div>
                    <div class="carousel-item" style="text-align: center;">
                        <img src="{{ asset('img/M3.jpg') }}" alt="Conocimientos" width="750" height="400">
                        <div class="carousel-caption" style="background-color: black; opacity: 0.6;">
                            <h3>Adquiriendo nuevos conocimientos</h3>
                            <p>Comprendiendo el entorno</p>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            </center>
        </div>


        <div class="container">

            <h1 class="my-4">Escuela Inclusiva</h1>

            <!-- Marketing Icons Section -->
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 card bg-warning">
                        <h4 class="card-header"style="text-align: center">Nuestra Historia</h4>
                        <div class="card-body" style="background-color: #f7ecb5">
                            <p class="card-text" style="text-align: justify" ><br>El Jardin de Niños Profra. Ma.Luisa Ballina Escartin es una institucion cuya misión es brindar un servicio educativo de calidad, en donde directivos y docentes, están comprometidos, a lograr los propósitos fundamentales de la educación preescolar, propiciando, ambientes de aprendizajes, atendiendo a la diversidad que los lleven al desarrollo de competencias, practica de valores generando  un deseo permanente  de aprender a aprender, aprender a convivir</p>
                        </div>
                        <div class="card-footer">
                            <a href="historia" class="btn btn-light">Saber más..</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 card bg-success">
                        <h4 class="card-header"style="text-align: center">Programas</h4>
                        <div class="card-body" style="background-color: #a3d7a3">
                            <p class="card-text"> </p>
                            <ul style="list-style-type: square">
                                <li>Programa Nacional de Lectura</li>
                                <li>Programa Operación Matemática</li>
                                <li>Programa de  Valores</li>
                                <li>Programa  de  Impulso a la Activación Física</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="programas" class="btn btn-light">Conocer más...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 card bg-info">
                        <h4 class="card-header"style="text-align: center">Contáctanos</h4>
                        <div class="card-body" style="background-color: #b0e1ef">
                            <p class="card-text" style="text-align: justify;"><br>Plan de Texca No.100 Col. La Magdalena C.P:50010.<br>Tel: 2-80-16-80<br>Correo electrónico:<br>jnballina_escartin@hotmail.com</p>
                        </div>
                        <div class="card-footer">
                            <a href="contacto" class="btn btn-light">Contactar</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection