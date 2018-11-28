@extends('template.main')
@section('title', 'Contacto')

@section('content')
    <div class="container">
        <br>
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h2 style="text-align: center">Contactanos <img src="{{ asset('img/contacto.png') }}"
                                                                    alt="Card image" style="width:175px;">
                    </h2>
                    <div class="row">
                        <div class="col-md-8">
                            <p style="text-align: justify"><b style="color: black">Jardin de Niños "Profra. Ma. Luisa Ballina
                                    Escartín"</b></p>
                            <p>Plan de Texca No. 100<br>

                                Col. La Magdalena C.P.<br>

                                ​Toluca, Estado de Mexico<br>

                                Tel (722) 280 16 80<br>

                                jnballina_escartin@hotmail.com<br>

                                jnballina.escartin@gmail.com<br>

                                jnballinaescartin.blogspot.com<br>

                            </p>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('img/map.png') }}"
                                 alt="Card image" style="width:300px;">
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection