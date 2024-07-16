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
                    <h1>Data Pembelian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Pembelian</li>
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

                            {{-- @php
                                    dd($beliWrap->no_bukti);
                                @endphp --}}
                            <h6>No Bukti : <strong>{{ $getBeli->no_bukti }}</strong></h6>
                            <h6>Nama Pemasok : <strong>{{ $getBeli->nama_pemasok }}</strong></h6>
                            <h6>Tanggal Pembelian : <strong>{{ $getBeli->tanggal }}</strong></h6>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                        <th>Keterangan Pembelian</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($getMutasi as $record)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $record->nama_stok ?? '-' }}</td>
                                            <td>{{ $record->qty ?? '-' }}</td>
                                            <td>{{ $record->keterangan ?? '-' }}</td>
                                            <td>{{ 'Rp. ' . number_format($record->harga, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="total-row">
                                        <td colspan="4">Total:</td>
                                        <td><strong>{{ 'Rp. ' . number_format($calcTotal, 0, ',', '.') }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ url('/beli') }}" class="btn btn-danger">Kembali</a>
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
