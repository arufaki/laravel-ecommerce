@extends('include.welcome')
@section('content')

    @if (session('gagal'))
        <div class="alert alert-dismissible fade show alert-danger" role="alert">
            <strong>Halo, User!</strong> {{ session('gagal') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="content">
        <div class="container-fluid">
            <div class="row mt-4">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Kategori</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('kategori') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@stop
