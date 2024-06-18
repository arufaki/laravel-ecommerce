    @extends('include.welcome')
    @section('content')
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Mahasiswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Mahasiswa</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with minimal features & hover style</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nim</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>No Hp</th>
                                            <th>Prodi</th>
                                            <th>Dosen PA</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $rec = DB::table('tblmhs')->GET();
                                            $no = 0;
                                        @endphp
                                        @foreach ($rec as $key => $value)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $value->nim ?? '-' }}</td>
                                                <td>{{ $value->nama ?? '-' }}</td>
                                                <td>{{ $value->jenis_kelamin ?? '-' }}</td>
                                                <td>{{ $value->alamat ?? '-' }}</td>
                                                <td>{{ $value->nohp ?? '-' }}</td>
                                                <td>
                                                    @php
                                                        $id_prodi = DB::Table('prodi')
                                                            ->where('id_prodi', $value->id_prodi)
                                                            ->first();
                                                        echo $id_prodi ? $id_prodi->nama_prodi : '';
                                                    @endphp
                                                </td>
                                                <td>
                                                    @php
                                                        $id_dosen_pa = DB::Table('tbldosen')
                                                            ->where('id_dosen', $value->id_dosen)
                                                            ->first();
                                                        echo $id_dosen_pa ? $id_dosen_pa->nama_dosen : '';
                                                    @endphp
                                                </td>
                                                <td><a href="{{ Route('mahasiswa.edit', $value->id) }}"
                                                        class="btn btn-primary">Edit</a></td>
                                                <td>
                                                    <form action="{{ Route('mahasiswa.destroy', $value->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ url('/') }}" class="btn btn-danger">Kembali</a>
                                    <a href="{{ url('mahasiswa/create') }}" class="btn btn-primary">Tambah Data</a>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
@stop

