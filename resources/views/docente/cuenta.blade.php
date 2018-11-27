@extends('template.aaron.plantilla')
@section('title', 'Docente | Mi cuenta')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3>Cambia tu Contraseña</h3>
                    <p style="text-align: justify">Si lo deseas puedes introducir una nueva contraseña para tu cuenta, te recomendamos crear una contraseña unica,
                         una que no utilices en otros sitios web.</p>
                    <p style="text-align: justify">Nota: Recuerda que tu contraseña debe ser privada, toma en cuenta que podras cambiar la contraseña en cualquier momento.</p>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <div class="card">
                            <div class="card-header text-center bg-primary">
                                <h5 class="card-title" style="color: white;">Cambiar contraseña</h5>
                            </div>
                            <div class="card-body">
                                @if(count($errors)>0)
                                    <div class="alert alert-dismissible alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Oh no!</strong> <a href="#" class="alert-link">Comprueba si los datos introducidos son
                                            correctos </a> e intentalo de nuevo.
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(session('notification'))
                                    <div class="alert alert-dismissible alert-warning">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Alerta! </strong><br>
                                        {{ session('notification') }}
                                    </div>
                                @endif
                                @if(session('information'))
                                    <div class="alert alert-dismissible alert-success">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Actualizada! </strong><br>
                                        {{ session('information') }}
                                    </div>
                                @endif
                                <form action="cambioContraseña" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="contraseña_nueva">Nueva contraseña:</label>
                                        <input type="password" class="form-control" id="contraseña_nueva"
                                               placeholder="Introduce la nueva contraseña"
                                               name="contraseña_nueva">
                                    </div>
                                    <div class="form-group">
                                        <label for="contraseña_confirmar">Confirmar contraseña:</label>
                                        <input type="password" class="form-control" id="contraseña_confirmar"
                                               placeholder="Introduce la contraseña de nuevo"
                                               name="contraseña_confirmar">
                                    </div>
                                    <button class="btn btn-info" style="float: right;" type="submit">Cambiar
                                        contraseña
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection