    @extends('include.welcome')
    @section('content')

    @if(session('gagal'))
    <div class="alert alert-dismissible fade show alert-danger" role="alert">
        <strong>Halo, User!</strong> {{ session('gagal')  }}
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
                            <h3 class="card-title">Edit Pelanggan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('pelanggan/' . $id_pelanggan) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id_pelanggan" value="{{ $id_pelanggan }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_pelanggan">Kode Pelanggan</label>
                                    <input type="number" class="form-control" id="kode_pelanggan" name="kode_pelanggan" value="{{ $recordStorePelanggan->kode_pelanggan ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="nama_pelanggan">Nama Pelanggan</label>
                                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="{{ $recordStorePelanggan->nama_pelanggan?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_pelanggan">Alamat Pelanggan</label>
                                    <input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" value="{{ $recordStorePelanggan->alamat_pelanggan ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="nohp">No HP</label>
                                    <input type="text" class="form-control" id="nohp" name="nohp" value="{{ $recordStorePelanggan->nohp ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="top">TOP</label>
                                    <input type="text" class="form-control" id="top" name="top" value="{{ $recordStorePelanggan->top ?? '' }}">
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
