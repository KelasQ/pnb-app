<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <span class="align-middle me-3">PNB Web App</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-item{{ Request::is('/') ? ' active' : '' }}">
                <a class="sidebar-link" href="{{ url('/') }}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item{{ Request::is('role', 'user', 'karyawan') ? ' active' : '' }}">
                <a data-bs-target="#masterDataUser" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Master Data
                        Users</span>
                </a>
                <ul id="masterDataUser" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    @if (Str::lower(Auth::user()->role->role) === 'admin')
                        <li class="sidebar-item{{ Request::is('role') ? ' active' : '' }}"><a class="sidebar-link"
                                href="{{ route('role.index') }}">Roles User</a></li>
                        <li class="sidebar-item{{ Request::is('user') ? ' active' : '' }}"><a class="sidebar-link"
                                href="{{ route('user.index') }}">Data Users</a></li>
                    @endif
                    <li class="sidebar-item{{ Request::is('karyawan') ? ' active' : '' }}"><a class="sidebar-link"
                            href="{{ route('karyawan.index') }}">Data Karyawan</a></li>
                </ul>
            </li>
            <li class="sidebar-item{{ Request::is('registrasi', 'penerimaBantuan') ? ' active' : '' }}">
                <a data-bs-target="#masterDataPenerimaBantuan" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Master Data
                        Peserta</span>
                </a>
                <ul id="masterDataPenerimaBantuan" class="sidebar-dropdown list-unstyled collapse "
                    data-bs-parent="#sidebar">
                    <li class="sidebar-item{{ Request::is('registrasi') ? ' active' : '' }}"><a class="sidebar-link"
                            href="{{ url('registrasi') }}">Data Registrasi</a>
                    </li>
                    <li class="sidebar-item{{ Request::is('penerimaBantuan') ? ' active' : '' }}"><a
                            class="sidebar-link" href="{{ url('penerimaBantuan') }}">Data Penerima
                            Bantuan</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item{{ Request::is('tindakanLayanan', 'tindakanTerminasi') ? ' active' : '' }}">
                <a data-bs-target="#masterDataTindakan" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Master Data
                        Tindakan</span>
                </a>
                <ul id="masterDataTindakan" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item{{ Request::is('tindakanLayanan') ? ' active' : '' }}"><a
                            class="sidebar-link" href="{{ url('tindakanLayanan') }}">Tindakan
                            Layanan</a>
                    </li>
                    <li class="sidebar-item{{ Request::is('tindakanTerminasi') ? ' active' : '' }}"><a
                            class="sidebar-link" href="{{ url('tindakanTerminasi') }}">Tindakan
                            Terminasi</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item{{ Request::is('klaster', 'sub-klaster') ? ' active' : '' }}">
                <a data-bs-target="#masterDataKlaster" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="columns"></i> <span class="align-middle">Master Data
                        Klaster</span>
                </a>
                <ul id="masterDataKlaster" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item{{ Request::is('klaster') ? ' active' : '' }}"><a class="sidebar-link"
                            href="{{ route('klaster.index') }}">Data Klaster</a></li>
                    <li class="sidebar-item{{ Request::is('sub-klaster') ? ' active' : '' }}"><a class="sidebar-link"
                            href="{{ route('sub-klaster.index') }}">Data Sub
                            Klaster</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item{{ Request::is('bantuan', 'sub-bantuan') ? ' active' : '' }}">
                <a data-bs-target="#masterDataBantuan" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Master Data
                        Bantuan</span>
                </a>
                <ul id="masterDataBantuan" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item{{ Request::is('bantuan') ? ' active' : '' }}"><a class="sidebar-link"
                            href="{{ route('bantuan.index') }}">Data Bantuan</a>
                    </li>
                    <li class="sidebar-item{{ Request::is('sub-bantuan') ? ' active' : '' }}"><a class="sidebar-link"
                            href="{{ route('sub-bantuan.index') }}">Data Sub
                            Bantuan</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item{{ Request::is('layanan') ? ' active' : '' }}">
                <a class="sidebar-link" href="{{ route('layanan.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data Layanan</span>
                </a>
            </li>
            <li class="sidebar-item{{ Request::is('case') ? ' active' : '' }}">
                <a class="sidebar-link" href="{{ route('case.index') }}">
                    <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Data
                        Kasus</span>
                </a>
            </li>
            <li class="sidebar-item{{ Request::is('ska') ? ' active' : '' }}">
                <a class="sidebar-link" href="{{ url('ska') }}">
                    <i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">Data SKA</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#masterDataLaporan" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Master Data
                        Laporan</span>
                </a>
                <ul id="masterDataLaporan" class="sidebar-dropdown list-unstyled collapse "
                    data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/') }}">Laporan 1</a>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/') }}">Laporan 2</a>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/') }}">Laporan 3</a>
                    </li>
            </li>
        </ul>
        </li>
        </ul>
    </div>
</nav>
