<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary" style="margin-bottom: 0;">
    <a class="navbar-brand" href="#">SICESE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Inicio</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('docente_inicio') }}">Docente</a>
            </li>
        </ul>
    </div>
    @if(auth()->check())
        <p style="float: right;color: white;font-size: 11pt;">{{ \App\Model\Docente::find(auth()->user()->id)->email }}</p>
    @endif
</nav>
