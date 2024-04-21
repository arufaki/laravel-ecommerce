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
                            <h3 class="card-title">Edit Penjualan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('jual/' . $id_penjualan) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id_penjualan" value="{{ $id_penjualan }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="no_bukti">Nomor Bukti Penjualan</label>
                                    <input type="number" class="form-control" id="no_bukti" name="no_bukti"
                                        value="{{ $recordStorePenjualan->no_bukti ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Penjualan</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                                        value="{{ $recordStorePenjualan->tanggal ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan Penjualan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                                        value="{{ $recordStorePenjualan->keterangan ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="id_pelanggan">Pelanggan</label>
                                    <select name="id_pelanggan" id="id_pelanggan" class="form-control select2"
                                        style="width:100%" required>
                                        @foreach ($dataPelanggan as $pelanggan)
                                            <option value="{{ $pelanggan->id_pelanggan }}"
                                                {{ $recordStorePenjualan->id_pelanggan == $pelanggan->id_pelanggan ? 'selected' : '' }}>
                                                {{ $pelanggan->nama_pelanggan }}</option>
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
