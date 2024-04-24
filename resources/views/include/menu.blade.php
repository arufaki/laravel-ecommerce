<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
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

        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Seller Menu
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('stok') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('pemasok') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pemasok</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/pelanggan') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pelanggan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/jual') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Jual</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/beli') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Beli</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/mutasi') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mutasi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/satuan') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Satuan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/kategori') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kategori</p>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</nav>
