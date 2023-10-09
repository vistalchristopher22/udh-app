<li class="menu-label mt-0">Main</li>
<li>
    <a href="javascript: void(0);"> <i data-feather="home"
            class="align-self-center menu-icon"></i><span>Dashboard</span><span class="menu-arrow"><i
                class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li class="nav-item"><a class="nav-link" href="index.html"><i class="ti-control-record"></i>Analytics</a></li>
        <li class="nav-item"><a class="nav-link" href="sales-index.html"><i class="ti-control-record"></i>Sales</a></li>
    </ul>
</li>

<hr class="hr-dashed hr-menu">
<li class="menu-label mt-0">File Management</li>
@auth
    <li>
        <a href="{{ route('tags.index') }}">
            <i data-feather="file" class="align-self-center menu-icon"></i>
            <span>Tags</span>
        </a>
    </li>
    <li>
        <a href="{{ route('categories.index') }}">
            <i data-feather="file" class="align-self-center menu-icon"></i>
            <span>Categories</span>
        </a>
    </li>
    <li>
        <a href="{{ route('document.index') }}">
            <i data-feather="file" class="align-self-center menu-icon"></i>
            <span>Forms</span>
        </a>
    </li>
@endauth
<li>
    <a href="{{ route('file-manager.index') }}">
        <i data-feather="file" class="align-self-center menu-icon"></i>
        <span>File Manager</span>
    </a>
</li>

<hr class="hr-dashed hr-menu">
@role('administrator')
    <li class="menu-label mt-0">Maintenance</li>
    <li>
        <a href="{{ route('office.index') }}"> <i data-feather="home"
                class="align-self-center menu-icon"></i><span>Office</span>
        </a>
    </li>
    <li>
        <a href="{{ route('position.index') }}"> <i data-feather="briefcase"
                class="align-self-center menu-icon"></i><span>Position</span>
        </a>
    </li>
@endrole

@can('view employees')
    <li>
        <a href="{{ route('employee.index') }}"> <i data-feather="users"
                class="align-self-center menu-icon"></i><span>Employees / Users</span>
        </a>
    </li>
@endcan

@role('administrator')
    <hr class="hr-dashed hr-menu">
    <li class="menu-label mt-0">Account List Control</li>
    <li>
        <a href="{{ route('roles.index') }}"> <i data-feather="lock" class="align-self-center menu-icon"></i><span>Roles &
                Permissions</span>
        </a>
    </li>
@endrole
