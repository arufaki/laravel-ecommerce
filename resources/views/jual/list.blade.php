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
                        <h1>Data Penjualan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Penjualan</li>
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
                                            <th>Nomor Bukti Penjualan</th>
                                            <th>Nama Pembeli</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>Keterangan Penjualan</th>
                                            <th>Ekspedisi</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recordJual as $record)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $record->no_bukti ?? '-' }}</td>
                                                <td>{{ $record->nama_pelanggan ?? '-' }}</td>
                                                <td>{{ $record->tanggal ?? '-' }}</td>
                                                <td>{{ $record->keterangan ?? '-' }}</td>
                                                <td>{{ $record->ekspedisi ?? '-' }}</td>
                                                <td>
                                                    <a href="#" data-target="#exampleModalCenter" data-toggle="modal"
                                                        class="btn btn-success text-white btn-view"
                                                        data-order-id="{{ $record->id_penjualan }}"
                                                        data-image="{{ $record->bukti_pembayaran }}"><i class="fas fa-eye"
                                                            data-></i></a>
                                                </td>
                                                <td>{{ $record->status ?? '-' }}</td>
                                                @if ($record->status != 'success' && $record->status != 'rejected')
                                                    <td style="display: flex; flex-direction: column; gap: 5px;">
                                                        <a href="{{ Route('jual.edit', $record->id_penjualan) }}"
                                                            class="btn btn-success">Accept</a>
                                                        <form action="{{ Route('jual.show', $record->id_penjualan) }}"
                                                            onsubmit="return confirm('Yakin ingin Reject Pesanan Ini ?')">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger"
                                                                style="width:100%;">Reject</button>
                                                        </form>

                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ url('/') }}" class="btn btn-danger">Kembali</a>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Bukti Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="cart-body">
                            <img src="" class="buktiBayar" alt="bukti-pembayaran" class="rounded">
                            <input type="hidden" id="selectedOrderId" name="selectedOrderId" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const modal = document.getElementById('exampleModalCenter'),
                btnView = document.querySelectorAll('.btn-view'),
                buktiBayar = document.querySelector('.buktiBayar'),
                selectingOrderId = document.getElementById('selectedOrderId');


            btnView.forEach(button => {
                button.addEventListener('click', () => {
                    const selectedOrderId = button.getAttribute('data-order-id');
                    const selectedImageSrc = button.getAttribute('data-image');
                    buktiBayar.src = `{{ asset('storage/${selectedImageSrc}') }}`;
                    selectingOrderId.value = button.getAttribute('data-order-id');
                });
            });
        </script>
    @stop
