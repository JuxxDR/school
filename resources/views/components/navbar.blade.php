<nav class="navbar navbar-expand-lg navbar navbar-dark bg-success">
    <a class="navbar-brand" href="/school/public">SICESE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            @if(count(\App\Model\Grupo::all())>=3)
                @if(!auth()->check())
                    <li @if(request()->is('padre_inicio') || request()->is('padre_login')) class="nav-item active"
                        @else class="nav-item" @endif>
                        <a class="nav-link" href="{{route('padre_login')}}">Tutores</a>
                    </li>
                @endif
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('docente_inicio') }}">Docente</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-address-card"></i> Alumnos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('inscripcion_folio')}}"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;Inscripciones</a>
                    <a class="dropdown-item" href="{{route("reinscripcion_no_control")}}"><i class="fas fa-id-badge"></i>&nbsp;&nbsp;Reinscripciones</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
