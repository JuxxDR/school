<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="#">SICESE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('inscripcion_folio')}}"><i class="fas fa-user-graduate"></i>
                    Inscripción</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('padre_login')}}">Tutores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('docente_inicio') }}">Docente</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Sistema de control escolar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('inscripcion_folio')}}"><i class="fas fa-folder-plus"></i>
                        Inscripciones</a>
                    <a class="dropdown-item" href="{{route("reinscripcion_no_control")}}"><i
                                class="fas fa-graduation-cap"></i> Reinscripciones</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
