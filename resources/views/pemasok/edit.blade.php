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
                            <h3 class="card-title">Edit Pemasok</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('pemasok/' . $id_pemasok) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id_pemasok" value="{{ $id_pemasok }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_pemasok">Kode Pemasok</label>
                                    <input type="number" class="form-control" id="kode_pemasok" name="kode_pemasok" value="{{ $recordStorePemasok->kode_pemasok ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="nama_pemasok">Nama Pemasok</label>
                                    <input type="text" class="form-control" id="nama_pemasok" name="nama_pemasok" value="{{ $recordStorePemasok->nama_pemasok?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_pemasok">Alamat Pemasok</label>
                                    <input type="text" class="form-control" id="alamat_pemasok" name="alamat_pemasok" value="{{ $recordStorePemasok->alamat_pemasok ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="nohp">No HP</label>
                                    <input type="text" class="form-control" id="nohp" name="nohp" value="{{ $recordStorePemasok->nohp ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="top">TOP</label>
                                    <input type="text" class="form-control" id="top" name="top" value="{{ $recordStorePemasok->top ?? '' }}">
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
