<nav class="custom-wrapper" id="menu">
    <div class="pure-menu"></div>
    <ul class="container-flex list-unstyled">
        <li class="pure-menu-item">
            <a href="{{ route('home') }}"
            class="pure-menu-link c-gris-2 text-uppercase {{ setActiveRoute('home') }}">Inicio</a>
        </li>
        <li class="pure-menu-item">
            <a href="{{ route('pages.about') }}"
            class="pure-menu-link c-gris-2 text-uppercase {{ setActiveRoute('pages.about') }}">Nosotros</a>
        </li>
        <li class="pure-menu-item">
            <a href="{{ route('pages.archive') }}"
            class="pure-menu-link c-gris-2 text-uppercase {{ setActiveRoute('pages.archive') }}">Archivo</a>
        </li>
        <li class="pure-menu-item">
            <a href="{{ route('admin.admin') }}"
            class="pure-menu-link c-gris-2 text-uppercase {{ setActiveRoute('admin.admin') }}">Administración</a>
        </li>
    </ul>
</nav>
