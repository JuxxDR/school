@extends('template.aaron.plantilla')
@section('title', 'Inicio de Sesión | Padres')

@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center" style="height: 614px">
            <div class="col-md-5 col-md-offset-7">
                <div class="card">
                    <img src="{{ asset('img/logo.png') }}" class="avatar" alt="Avatar Image">
                    <div class="card-body">
                        @if(session('warning'))
                            <div class="alert alert-dismissible alert-warning" style="margin-bottom: 0px;">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Advertencia! </strong><br>
                                {{ session('warning') }}
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="inicio">
                            {{ csrf_field() }}
                            <br>
                            <br>
                            <div class="form-group{{ $errors->has('numero_control') ? ' has-error' : '' }}">
                                <label for="numero_control" class="col-md-8 control-label">Número de Control</label>

                                <div class="col-md-12">
                                    <input id="numero_control" type="text" class="form-control" name="numero_control"
                                           value="{{ old('numero_control') }}" required autofocus
                                           placeholder="Introduce el número de control">

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
                                    <input id="password" type="password" class="form-control" name="password" required
                                           placeholder="Introduce la contraseña">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <center>
                                        <button type="submit" class="btn btn-primary" id="login" style="width: 60%;">
                                            Acceder
                                        </button>
                                    </center>
                                </div>
                            </div>
                        </form>
                        <button id="forgotten" name="forgotten" class="btn btn-link" style="float: right">
                            ¿Olvidaste tu contraseña?
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="PassModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Información</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <div>
                    <h5>Contacta al administrativo de la escuela</h5>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endsection