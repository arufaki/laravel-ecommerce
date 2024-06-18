@extends('include.welcome')
@section('content')

    @if (session('sukses'))
        <div class="alert alert-dismissible fade show alert-success" role="alert">
            <strong>Halo, User!</strong> {{ session('sukses') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Brand</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Brand</li>
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
                                        <th>Nama Brand</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recordBrand as $record)
                                        <tr>
                                            <td>{{ $no++ }}</td>

                                            <td>{{ $record->nama_brand ?? '-' }}</td>

                                            <td><a href="{{ Route('brand.edit', $record->id_brand) }}"
                                                    class="btn btn-primary">Edit</a>
                                            </td>

                                            <td>
                                                <form action="{{ Route('brand.destroy', $record->id_brand) }}"
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
                                <a href="{{ url('brand/create') }}" class="btn btn-primary">Tambah Data</a>
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
