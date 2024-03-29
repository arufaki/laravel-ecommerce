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
                        <h3 class="card-title">Tambah Stok</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('stok') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode_stok">Kode Stok</label>
                                <input type="number" class="form-control" id="kode_stok" name="kode_stok">
                            </div>
                            <div class="form-group">
                                <label for="nama_stok">Nama Stok</label>
                                <input type="text" class="form-control" id="nama_stok" name="nama_stok">
                            </div>
                            <div class="form-group">
                                <label for="saldo_awal">Saldo Awal</label>
                                <input type="text" class="form-control" id="saldo_awal" name="saldo_awal">
                            </div>
                            <div class="form-group">
                                <label for="harga_beli">Harga Beli</label>
                                <input type="text" class="form-control" id="harga_beli" name="harga_beli">
                            </div>
                            <div class="form-group">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="text" class="form-control" id="harga_jual" name="harga_jual">
                            </div>
                            <div class="form-group">
                                <label for="harga_modal">Harga Modal</label>
                                <input type="text" class="form-control" id="harga_modal" name="harga_modal">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_barang">Deskripsi Barang</label>
                                <input type="text" class="form-control" id="deskripsi_barang" name="deskripsi_barang">
                            </div>
                            <div class="form-group">
                                <label for="pajang">Pajang</label>
                                <select class="form-control select2" style="width: 100%;" name="pajang" id="pajang" required>
                                    <option value="tidak">Tidak</option>
                                    <option value="ya">Ya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foto_barang">Foto</label>
                                <input type="file" class="form-control" id="image" name="image">
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
