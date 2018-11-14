@extends('template.aaron.plantilla')
@section('title', 'Docente | Mi cuenta')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3>Información personal</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                        dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                        dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <div class="card">
                            <div class="card-header bg-success text-center">
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