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

    {{-- <section class="content">
        <div class="container-fluid">
            <div class="row mt-4">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Pembelian</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('beli') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="no_bukti">Nomor Bukti Pembelian</label>
                                    <input type="number" class="form-control" id="no_bukti" name="no_bukti">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Pembelian</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan Pembelian</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                                </div>
                                <div class="form-group">
                                    <label for="id_pelanggan">Pemasok</label>
                                    <select class="form-control select2" id="id_pemasok" name="id_pemasok"
                                        style="width:100%" required>
                                        @foreach ($recordPemasok as $record)
                                            @if ($id_pemasok == $record->id_pemasok)
                                                <option selected="selected" value="{{ $record->id_pemasok }}">
                                                    {{ $record->nama_pemasok }}</option>
                                            @else
                                                <option value="{{ $record->id_pemasok }}">{{ $record->nama_pemasok }}
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
    </section> --}}
@stop
