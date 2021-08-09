<!-- /.sidebar-menu -->
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
    <li class="nav-link active" class="header">MENU</li>
    <br>
    <li {{ setActiveRoute('admin.admin') }}>
        <a href="{{ route('admin.admin') }}">
            <i class="nav-icon fas fa-home"></i>
            <span>Inicio</span>
        </a>
    </li>
    <br>

    <li class="treeview" {{ setActiveRoute('admin.posts.index') }}>
        <a  href="#"><i class="nav-icon fa fa-bars"></i> <span>Blog</span>
            <span class="pull-down-container">
                <i class="fa fa-angle-down pull-up"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <br>
            {{-- @can('view', new App\Models\Post) --}}
            <li {{ setActiveRoute('admin.posts.index') }}>
                <a href="{{ route('admin.posts.index') }}">
                    <i class="nav-icon fa fa-eye"></i> Lista de Publicaciones</a>
            </li>
            {{-- @endcan --}}
            <br>
            @can('create', new App\Models\Post)
            <li>
                @if (request()->is('admin/posts/*'))
                    <a href="{{ route('admin.posts.index', '#create') }}" > <i class="nav-icon fa fa-plus"></i> Crear Publicaciones <span class="right badge badge-danger"> New </span></a>
                @else
                    <a href="#" data-toggle="modal" data-target="#exampleModal"> <i class="nav-icon fa fa-plus"></i> Crear Publicaciones <span class="right badge badge-danger"> New </span></a>
                @endif
            </li>
            @endcan
        </ul>
    </li>
    <br>
    @can('view', new App\User)
    <li class="treeview" {{ setActiveRoute(['admin.users.index', 'admin.users.create']) }}>
        <a  href="#"><i class="nav-icon fa fa-users"></i> <span>Usuarios</span>
            <span class="pull-down-container">
                <i class="fa fa-angle-down pull-up"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <br>
            <li class="{{ setActiveRoute('admin.users.index') }}">
                <a href="{{ route('admin.users.index') }}">
                    <i class="nav-icon fa fa-eye"></i> Lista de Usuarios</a>
            </li>
            <br>
            <li class="{{ setActiveRoute('admin.users.index') }}">
                <a href="{{ route('admin.users.create') }}" >
                    <i class="nav-icon fa fa-plus"></i> Crear Usuarios
                    <span class="right badge badge-danger"> New </span>
                </a>
            </li>
        </ul>
    </li>
    @else
    <li class="{{ setActiveRoute(['admin.users.show', 'admin.users.edit']) }}">
        <a href="{{ route('admin.users.show', auth()->user()) }}">
            <i class="nav-icon fas fa-user"></i>
            <span>Perfil</span>
        </a>
    </li>
    @endcan
    <br>
    @can('view', new \Spatie\Permission\Models\Role)
    <li {{ setActiveRoute(['admin.roles.index', 'admin.roles.edit']) }}>
        <a href="{{ route('admin.roles.index') }}">
            <i class="nav-icon fas fa-user-tag"></i>
            <span>Roles</span>
        </a>
    </li>
    @endcan
    <br>
    @can('view', new \Spatie\Permission\Models\Permission)
    <li {{ setActiveRoute(['admin.roles.index', 'admin.roles.edit']) }}>
        <a href="{{ route('admin.roles.index') }}">
            <i class="nav-icon fas fa-user-tag"></i>
            <span>Permisos</span>
        </a>
    </li>
    @endcan
</ul>
</nav>
