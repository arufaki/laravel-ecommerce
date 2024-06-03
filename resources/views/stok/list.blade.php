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
                        <h1>Data Stok</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Stok</li>
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
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Stok Barang</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Harga Modal</th>
                                            <th>Satuan</th>
                                            <th>Kategori</th>
                                            <th>Deskripsi Barang</th>
                                            <th>Pajang</th>
                                            <th>Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recordStok as $record)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $record->kode_stok ?? '-' }}</td>
                                                <td>{{ $record->nama_stok ?? '-' }}</td>
                                                <td>{{ $record->saldo_awal ?? '-' }}</td>
                                                <td>{{ $record->harga_beli ?? '-' }}</td>
                                                <td>{{ $record->harga_jual ?? '-' }}</td>
                                                <td>{{ $record->harga_modal ?? '-' }}</td>
                                                <td>{{ $record->nama_satuan ?? '-' }}</td>
                                                <td>{{ $record->nama_kategori ?? '-' }}</td>
                                                <td>{{ $record->deskripsi_barang ?? '-' }}</td>
                                                <td>{{ $record->pajang ?? '-' }}</td>
                                                <td><a href="#" data-target="#exampleModalCenter" data-toggle="modal"
                                                        class="btn btn-success text-white btn-view"
                                                        data-order-id="{{ $record->id_stok }}"
                                                        data-image="{{ $record->image }}"><i class="fas fa-eye"
                                                            data-></i></a></td>
                                                <td><a href="{{ Route('stok.edit', $record->id_stok) }}"
                                                        class="btn btn-primary">Edit</a>
                                                </td>

                                                <td>
                                                    <form action="{{ Route('stok.destroy', $record->id_stok) }}"
                                                        method="POST" onsubmit="return confirm('Yakin Ingin Menghapus ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ url('/') }}" class="btn btn-danger">Kembali</a>
                                    <a href="{{ url('stok/create') }}" class="btn btn-primary">Tambah Data</a>
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
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Foto Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="cart-body">
                            @foreach ($recordStok as $stok)
                                @php
                                    $images = json_decode($stok->image);
                                @endphp
                                @foreach ($images as $image)
                                    <img src="{{ asset('storage/foto-produk/' . $image) }}" class="fotoBarang rounded"
                                        alt="foto-barang" width="450">
                                @endforeach
                            @endforeach

                            <input type="hidden" id="selectedOrderId" name="selectedOrderId" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const selectingOrderId = document.getElementById('selectedOrderId'),
                btnView = document.querySelectorAll('.btn-view'),
                fotoBarang = document.querySelector('.fotoBarang');

            btnView.forEach(button => {
                button.addEventListener('click', () => {
                    const selectedOrderId = button.getAttribute('data-order-id');
                    const selectedImageSrc = button.getAttribute('data-image');
                    fotoBarang.src = `{{ asset('storage/foto-produk/${selectedImageSrc}') }}`;
                    selectingOrderId.value = button.getAttribute('data-order-id');
                });
            });
        </script>
    @stop
