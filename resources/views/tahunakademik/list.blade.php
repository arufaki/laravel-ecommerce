    @extends('include.welcome')
    @section('content')

        @if(session('sukses'))
        <div class="alert alert-dismissible fade show alert-success" role="alert">
            <strong>Halo, User!</strong> {{ session('sukses')  }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Tahun Akademik</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Tahun Akademik</li>
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
                                            <th>Kode Tahun Akademik</th>
                                            <th>Nama Tahun Akademik</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recordTahunAkademik as $record)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $record->kode_tahun_akademik ?? '-' }}</td>
                                                <td>{{ $record->nama_tahun_akademik ?? '-' }}</td>
                                                <td><a href="{{ Route('tahunakademik.edit', $record->id_tahun_akademik) }}"
                                                        class="btn btn-primary">Edit</a>
                                                </td>

                                                <td>
                                                    <form
                                                        action="{{ Route('tahunakademik.destroy', $record->id_tahun_akademik) }}"
                                                        method="POST" onsubmit="return confirm('Yakin Ingin Menghapus ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ url('/') }}" class="btn btn-danger">Kembali</a>
                                    <a href="{{ url('tahunakademik/create') }}" class="btn btn-primary">Tambah Data</a>
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

