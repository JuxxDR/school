@extends('template.aaron.plantilla')
@section('title', 'Inicio de Sesión | Padres')

@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center" style="height: 614px">
            <div class="col-md-5 col-md-offset-7">
                <div class="card">
                    <div class="card-header">Inicia Sesión</div>

                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="inicio">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('numero_control') ? ' has-error' : '' }}">
                                <label for="numero_control" class="col-md-8 control-label">Número de Control</label>

                                <div class="col-md-12">
                                    <input id="numero_control" type="text" class="form-control" name="numero_control"
                                           value="{{ old('numero_control') }}" required autofocus>

                                    @if ($errors->has('numero_control'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('numero_control') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Contraseña</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        Acceder
                                    </button>

                                    <a class="btn btn-link" href="" style="float: right">
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection