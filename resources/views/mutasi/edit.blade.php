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
                            <h3 class="card-title">Edit Mutasi</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('mutasi/' . $id_mutasi) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id_mutasi" value="{{ $id_mutasi }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="no_bukti">Nomor Bukti Mutasi</label>
                                    <input type="number" class="form-control" id="no_bukti" name="no_bukti"
                                        value="{{ $recordStoreMutasi->no_bukti ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="masuk_keluar">Masuk Keluar</label>
                                    <input type="text" class="form-control" id="masuk_keluar" name="masuk_keluar"
                                        value="{{ $recordStoreMutasi->masuk_keluar ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="number" class="form-control" id="qty" name="qty"
                                        value="{{ $recordStoreMutasi->qty ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" class="form-control" id="harga" name="harga"
                                        value="{{ $recordStoreMutasi->harga ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan Mutasi</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                                        value="{{ $recordStoreMutasi->keterangan ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="id_stok">Stok</label>
                                    <select name="id_stok" id="id_stok" class="form-control select2" style="width:100%"
                                        required>
                                        @foreach ($dataStok as $stok)
                                            <option value="{{ $stok->id_stok }}"
                                                {{ $recordStoreMutasi->id_stok == $stok->id_stok ? 'selected' : '' }}>
                                                {{ $stok->nama_stok }}</option>
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
