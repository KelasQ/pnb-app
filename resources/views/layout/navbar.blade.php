<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="" data-bs-toggle="dropdown">
                    <img src="{{ asset('/storage/users/' . Auth::user()->foto) }}"
                        class="avatar img-fluid rounded-circle me-1" alt="Chris Wood" />
                    <span class="text-dark">{{ Auth::user()->nama }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href=""><i class="align-middle me-1" data-feather="user"></i>
                        Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('logout') }}">
                        <i class="align-middle" data-feather="log-out"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
