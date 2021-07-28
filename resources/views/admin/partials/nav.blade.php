
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
    <li class="nav-link active" class="header">MENU</li>
    <br>
    <li {{ request()->is('admin') ? 'class=active' : '' }}>
        <a href="{{ route('admin.admin') }}">
            <i class="nav-icon fas fa-home"></i>
            <span>Inicio</span>
        </a>
    </li>
    <br>
    <li class="treeview" {{ request()->is('posts') ? 'active' : '' }}>
        <a  href="#"><i class="nav-icon fa fa-bars"></i> <span>Blog</span>
            <span class="pull-down-container">
                <i class="fa fa-angle-down pull-up"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <br>
            <li {{ request()->is('posts') ? 'class=active' : '' }}><a href="{{ route('admin.posts.index') }}"> <i class="nav-icon fa fa-eye"></i> Lista de Publicaciones</a></li>
            <br>
            <li><a href="#" data-toggle="modal" data-target="#exampleModal"> <i class="nav-icon fa fa-plus"></i> Crear Publicaciones <span class="right badge badge-danger"> New </span></a></li>
        </ul>
        {{-- <li class="nav-item">
        <a href="#" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p>Blog</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Inactive Page</p>
        </a>
        </li> --}}
    </li>

</ul>
</nav>
      <!-- /.sidebar-menu -->
