<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Menu principal</h3>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="{{ route('docente_inicio') }}">Inicio</a>
        </li>
        @if(auth()->user()->is_teacher)
            <li>
                <a href="{{ route('asistencia_inicio') }}">Lista de asistencia</a>
            </li>
            <li>
                <a href="{{ route('tarea_inicio') }}">Tareas</a>
            </li>
            <li>
                <a href="#">Reportes de evaluación</a>
            </li>
        @endif
        @if(auth()->user()->is_admin)
            <li>
                <a href="{{ route('admin_notificar') }}">Notificaciones</a>
            </li>
            <li>
                <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false"
                   class="dropdown-toggle">Administrar</a>
                <ul class="collapse list-unstyled" id="adminSubmenu">
                    <li>
                        <a href="{{ route('admin_docentes') }}">Docentes</a>
                    </li>
                    <li>
                        <a href="{{ route('admin_grupos') }}">Grupos</a>
                    </li>
                    <li>
                        <a href="{{ route('admin_reportes') }}">Reportes de Evaluación</a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>

    <ul class="list-unstyled CTAs">
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="download">
                Cerrar Sesión
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
        <li>
            <a href="{{ route('docente_cuenta') }}" class="article">Cuenta</a>
        </li>
    </ul>
</nav>