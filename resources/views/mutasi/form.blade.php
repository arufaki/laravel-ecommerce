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
                            <h3 class="card-title">Tambah Mutasi</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('mutasi') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="no_bukti">Nomor Bukti Mutasi</label>
                                    <input type="number" class="form-control" id="no_bukti" name="no_bukti">
                                </div>
                                <div class="form-group">
                                    <label for="masuk_keluar">Masuk Keluar</label>
                                    <input type="text" class="form-control" id="masuk_keluar" name="masuk_keluar">
                                </div>
                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="number" class="form-control" id="qty" name="qty">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" class="form-control" id="harga" name="harga">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan Mutasi</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                                </div>
                                <div class="form-group">
                                    <label for="id_stok">Stok</label>
                                    <select class="form-control select2" id="id_stok" name="id_stok" style="width:100%"
                                        required>
                                        @foreach ($recordStok as $record)
                                            @if ($id_stok == $record->id_stok)
                                                <option selected="selected" value="{{ $record->id_stok }}">
                                                    {{ $record->nama_stok }}</option>
                                            @else
                                                <option value="{{ $record->id_stok }}">{{ $record->nama_stok }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
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
