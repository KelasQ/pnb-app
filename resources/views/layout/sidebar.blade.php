<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <span class="align-middle me-3">PNB Web App</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('/') }}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#masterDataUser" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Master Data
                        Users</span>
                </a>
                <ul id="masterDataUser" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('roles') }}">Roles User</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('users') }}">Data Users</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('karyawan') }}">Data Karyawan</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('layanan') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data Layanan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('kasus') }}">
                    <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Data Kasus</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#masterDataKlaster" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="columns"></i> <span class="align-middle">Master Data
                        Klaster</span>
                </a>
                <ul id="masterDataKlaster" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('klaster') }}">Data Klaster</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('subKlaster') }}">Data Sub Klaster</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#masterDataBantuan" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Master Data
                        Bantuan</span>
                </a>
                <ul id="masterDataBantuan" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('bantuan') }}">Data Bantuan</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('subBantuan') }}">Data Sub Bantuan</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('ska') }}">
                    <i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">Data SKA</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#masterDataPenerimaBantuan" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Master Data
                        Peserta</span>
                </a>
                <ul id="masterDataPenerimaBantuan" class="sidebar-dropdown list-unstyled collapse "
                    data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('registrasi') }}">Data Registrasi</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('penerimaBantuan') }}">Data Penerima
                            Bantuan</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#masterDataTindakan" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Master Data
                        Tindakan</span>
                </a>
                <ul id="masterDataTindakan" class="sidebar-dropdown list-unstyled collapse "
                    data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('tindakanLayanan') }}">Tindakan
                            Layanan</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('tindakanTerminasi') }}">Tindakan
                            Terminasi</a>
                    </li>
                </ul>
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
