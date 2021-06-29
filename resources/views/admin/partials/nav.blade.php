
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
    <li class="item menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>
        Inicio
        <i class="right fas fa-home"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <a href="#"><i class="fa fa-bars"></i> <span>Blog</span> 
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('admin.posts.index') }}"> <i class="fa fa-eye"></i> Lista de Post</a></li>
            
            <li><a href="#"> <i class="fa fa-plus"></i> Crear Post <span class="right badge badge-danger">New</span></a></li>            
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
    </ul>
    </li>

</ul>
</nav>
      <!-- /.sidebar-menu -->