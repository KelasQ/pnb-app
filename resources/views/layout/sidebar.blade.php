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
            @if (Str::lower(Auth::user()->role->role) === 'admin')
                <li class="sidebar-item{{ Request::is('role', 'user', 'karyawan') ? ' active' : '' }}">
                    <a data-bs-target="#masterDataUser" data-bs-toggle="collapse" class="sidebar-link">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manajemen
                            Admin</span>
                    </a>
                    <ul id="masterDataUser" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item{{ Request::is('user') ? ' active' : '' }}"><a class="sidebar-link"
                                href="{{ route('user.index') }}">Lihat Semua Admin</a></li>
                        <li class="sidebar-item{{ Request::is('role') ? ' active' : '' }}"><a class="sidebar-link"
                                href="{{ route('role.index') }}">Role / Level</a></li>
                    </ul>
                </li>
            @endif
            <li class="sidebar-item{{ Request::is('registrasi', 'tindakan') ? ' active' : '' }}">
                <a data-bs-target="#masterDataPenerimaBantuan" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="check-square"></i> <span
                        class="align-middle">Registrasi</span>
                </a>
                <ul id="masterDataPenerimaBantuan" class="sidebar-dropdown list-unstyled collapse "
                    data-bs-parent="#sidebar">
                    @if (Str::lower(Auth::user()->role->role) === 'pokja 1')
                        <li class="sidebar-item{{ Request::is('registrasi') ? ' active' : '' }}"><a class="sidebar-link"
                                href="{{ route('registrasi.index') }}">Penerima Bantuan</a>
                        </li>
                    @endif
                    @if (Str::lower(Auth::user()->role->role) === 'pokja 2')
                        <li class="sidebar-item{{ Request::is('tindakan') ? ' active' : '' }}"><a class="sidebar-link"
                                href="{{ url('tindakan') }}">Layanan / Tindakan</a>
                        </li>
                    @endif
                </ul>
            </li>
            <li
                class="sidebar-item{{ Request::is('karyawan', 'klaster', 'sub-klaster', 'bantuan', 'sub-bantuan', 'case', 'ska') ? ' active' : '' }}">
                <a data-bs-target="#masterDataTindakan" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data
                        Master</span>
                </a>
                <ul id="masterDataTindakan" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    @if (Str::lower(Auth::user()->role->role) === 'pokja 3')
                        <li class="sidebar-item{{ Request::is('karyawan') ? ' active' : '' }}"><a class="sidebar-link"
                                href="{{ route('karyawan.index') }}">Data Karyawan</a></li>
                    @endif
                    @if (Str::lower(Auth::user()->role->role) === 'admin')
                        <li class="sidebar-item{{ Request::is('klaster') ? ' active' : '' }}"><a class="sidebar-link"
                                href="{{ route('klaster.index') }}">Data Klaster</a></li>
                        <li class="sidebar-item{{ Request::is('sub-klaster') ? ' active' : '' }}"><a
                                class="sidebar-link" href="{{ route('sub-klaster.index') }}">Data Sub
                                Klaster</a>
                        </li>
                        <li class="sidebar-item{{ Request::is('bantuan') ? ' active' : '' }}"><a class="sidebar-link"
                                href="{{ route('bantuan.index') }}">Data Bantuan</a>
                        </li>
                        {{-- <li class="sidebar-item{{ Request::is('sub-bantuan') ? ' active' : '' }}"><a
                                class="sidebar-link" href="{{ route('sub-bantuan.index') }}">Data Sub
                                Bantuan</a>
                        </li> --}}
                        <li class="sidebar-item{{ Request::is('case') ? ' active' : '' }}"><a class="sidebar-link"
                                href="{{ route('case.index') }}">Data Kasus</a>
                        </li>
                        <li class="sidebar-item{{ Request::is('layanan') ? ' active' : '' }}"><a class="sidebar-link"
                                href="{{ route('layanan.index') }}">Data Layanan</a>
                        </li>
                        <li class="sidebar-item{{ Request::is('ska') ? ' active' : '' }}"><a class="sidebar-link"
                                href="{{ route('ska.index') }}">Data SKA</a>
                        </li>
                    @endif
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#masterDataLaporan" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Data
                        Laporan</span>
                </a>
                <ul id="masterDataLaporan" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    @if (Str::lower(Auth::user()->role->role) === 'admin' || Str::lower(Auth::user()->role->role) === 'pokja 1')
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/') }}">Lap. Asesment</a>
                    @endif
                    @if (Str::lower(Auth::user()->role->role) === 'admin' || Str::lower(Auth::user()->role->role) === 'pokja 2')
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/') }}">Lap.
                                Residensial</a>
                    @endif
                    @if (Str::lower(Auth::user()->role->role) === 'admin' ||
                            Str::lower(Auth::user()->role->role) === 'pokja 1' ||
                            Str::lower(Auth::user()->role->role) === 'pokja 2')
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/') }}">Lap. Terminasi</a>
                        </li>
                    @endif
            </li>
        </ul>
        </li>
        </ul>
    </div>
</nav>
