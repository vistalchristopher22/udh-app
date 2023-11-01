<li class="menu-label mt-0">Main</li>
<li>
    <a href="{{ route('login') }}">
        <i data-feather="home" class="align-self-center menu-icon"></i>
        <span>Dashboard</span>
    </a>
</li>

<hr class="hr-dashed hr-menu">
<li class="menu-label mt-0">File Management</li>
<li>
    <a href="{{ route('document.index') }}">
        <i data-feather="file-text" class="align-self-center menu-icon"></i>
        <span>Forms</span>
    </a>
</li>
<li>
    <a href="{{ route('tags.index') }}">
        <i data-feather="list" class="align-self-center menu-icon"></i>
        <span>Tags</span>
    </a>
</li>
<li>
    <a href="{{ route('categories.index') }}">
        <i data-feather="columns" class="align-self-center menu-icon"></i>
        <span>Categories</span>
    </a>
</li>
<li>
    <a href="{{ route('file-manager.index') }}">
        <i data-feather="hard-drive" class="align-self-center menu-icon"></i>
        <span>File Manager</span>
    </a>
</li>

<hr class="hr-dashed hr-menu">
<li class="menu-label mt-0">Maintenance</li>
<li>
    <a href="{{ route('campus.index') }}"> <i data-feather="home"
                                              class="align-self-center menu-icon"></i><span>Campus</span>
    </a>
</li>
<li>
    <a href="{{ route('office.index') }}"> <i data-feather="briefcase"
                                              class="align-self-center menu-icon"></i><span>Office</span>
    </a>
</li>
<li>
    <a href="{{ route('position.index') }}"> <i data-feather="user-check"
                                                class="align-self-center menu-icon"></i><span>Position</span>
    </a>
</li>

<li>
    <a href="{{ route('employee.index') }}"> <i data-feather="users"
                                                class="align-self-center menu-icon"></i><span>Employees / Users</span>
    </a>
</li>

<hr class="hr-dashed hr-menu">
<li class="menu-label mt-0">Account List Control</li>
<li>
    <a href="{{ route('roles.index') }}"> <i data-feather="lock" class="align-self-center menu-icon"></i><span>Roles &
            Permissions</span>
    </a>
</li>
