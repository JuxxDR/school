<nav class="navbar navbar-expand-lg navbar navbar-dark bg-success">
    <a class="navbar-brand" href="#">SICESE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/school/public/">Inicio</a>
            </li>
            @if(count(\App\Model\Grupo::all())>=3)
                @if(!auth()->check())
                    <li @if(request()->is('padre_inicio') || request()->is('padre_login')) class="nav-item active"
                        @else class="nav-item" @endif>
                        <a class="nav-link" href="{{route('padre_login')}}">Tutores</a>
                    </li>
                @endif
            @endif
            <li @if(request()->is('docente_inicio')) class="nav-item active" @else class="nav-item" @endif>
                @if(auth()->check())
                    <a class="nav-link"
                       href="{{ route('docente_inicio') }}">@if( \App\Model\Docente::find(auth()->user()->id)->role == 1 )
                            Docente @else Administrativo @endif </a>
                @else
                    <a class="nav-link"
                       href="{{ route('docente_inicio') }}">Docente</a>
                @endif
            </li>
        </ul>
    </div>
</nav>
