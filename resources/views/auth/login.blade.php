<?php
?>

@extends('template.aaron.plantilla')
@section('title', 'Inicio de Sesión')

@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center" style="height: 614px">
            <div class="col-md-5 col-md-offset-7">
                <div class="card">
                    <img src="{{ asset('img/logo.png') }}" class="avatar" alt="Avatar Image">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="">
                            {{ csrf_field() }}
                            <br><br>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-8 control-label">Correo Electronico</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required autofocus placeholder="Introduce tu email">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Contraseña</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Introduce la contraseña">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme en
                                            este equipo
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <center>
                                        <button type="submit" class="btn btn-primary" id="loginD" style="width: 80%;">
                                            Iniciar Sesión
                                        </button>
                                    </center>
                                </div>
                            </div>
                        </form>
                        <button class="btn btn-link" style="float: right">
                            ¿Olvidaste tu contraseña?
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection