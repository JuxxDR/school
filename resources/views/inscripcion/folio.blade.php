<?php
?>

@extends('template.main')
@section('title', 'Inscripcion')

@section('content')
    <div class="container">
        <div class="row" style="height: 614px">
            <div class="col-6 offset-3 mt-5">
                <div class="card">
                    <div class="card-header text-center card bg-secondary" style="color: white" >
                        <h3>Inscripción</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open()!!}
                        <div class="row">
                            <div class="col-8 offset-2">
                                {!! Form::label('folio','Ingrese el folio de inscripción') !!}
                                <div class="input-group text-left">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                    </div>
                                    {{ Form::text('folio',null, [
                                  'class' => $errors->has('folio')?'is-invalid form-control':'form-control',
                                    ])}}
                                    @if($errors->has('folio'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('folio') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 text-center "><hr>
                                {!!
                                    Form::submit('Continuar',
                                    [
                                    'class' => 'btn btn-success btn-md '
                                    ])
                                !!}
                            </div>
                        </div>
                        {!! Form::close()!!}
                    </div>
                </div><br>
            </div>

            <section class="testimonials text-center bg-white" style="align-content: center">
                <div class="container" style="box-shadow: 0 0 20px #2aabd2"><br>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                                <img class="img-fluid rounded-circle mb-3" src="img/ajj.jpg" width="150" height="150" alt="">
                                <h5><b>Area de Juegos</b></h5>
                                <p class="font-weight-light mb-0">"Para que los pequeñitos se diviertan libremente."</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                                <img class="img-fluid rounded-circle mb-3" src="img/au.jpg" width="150" height="150">
                                <h5><b>Aulas</b></h5>
                                <p class="font-weight-light mb-0">"Consiguiendo el mejor aprovechamiento, cada dia."</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                                <img class="img-fluid rounded-circle mb-3" src="img/fee.jpg" width="150" height="150">
                                <h5><b>Festivales</b></h5>
                                <p class="font-weight-light mb-0">"Generando sonrisas, en los mejores momentos."</p>
                            </div>
                        </div>
                    </div><br>
                </div>
            </section>

        </div>
    </div>
@endsection