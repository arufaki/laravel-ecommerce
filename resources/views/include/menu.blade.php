<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('tahunakademik') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tahun Akademik</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('fakultas') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fakultas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/prodi') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Prodi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/ruang') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ruang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('kelas') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kelas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dosen') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dosen</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('mahasiswa') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mahasiswa</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
