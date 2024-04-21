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
                            <h3 class="card-title">Edit Pembelian</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('beli/' . $id_pembelian) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id_pembelian" value="{{ $id_pembelian }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="no_bukti">Nomor Bukti Pembelian</label>
                                    <input type="number" class="form-control" id="no_bukti" name="no_bukti"
                                        value="{{ $recordStorePembelian->no_bukti ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Pembelian</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                                        value="{{ $recordStorePembelian->tanggal ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan Pembelian</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                                        value="{{ $recordStorePembelian->keterangan ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="id_pemasok">Pemasok</label>
                                    <select name="id_pemasok" id="id_pemasok" class="form-control select2"
                                        style="width:100%" required>
                                        @foreach ($dataPemasok as $pemasok)
                                            <option value="{{ $pemasok->id_pemasok }}"
                                                {{ $recordStorePembelian->id_pemasok == $pemasok->id_pemasok ? 'selected' : '' }}>
                                                {{ $pemasok->nama_pemasok }}</option>
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
