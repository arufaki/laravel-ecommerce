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
    @php
        $getStok = \DB::table('tbstok')->get();
        $getPemasok = \DB::table('tbpemasok')->get();

    @endphp

    <section class="content">
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
                        <form action="{{ Route('beli.store') }}" method="POST" id="beliForm">
                            @csrf
                            <table class="w-100" id="dynamicTable">
                                <tr class="row p-2">
                                    <th class="col">Nomor Bukti</th>
                                    <th class="col">Tanggal Beli</th>
                                    <th class="col">Pemasok</th>
                                    <th class="col">Barang</th>
                                    <th class="col">Quantity</th>
                                    <th class="col">Harga</th>
                                    <th class="col">Subtotal</th>
                                    <th class="col">Aksi</th>
                                </tr>
                                <tr class="row p-2">
                                    <td class="col">
                                        <input type="text" class="form-control" name="beli[0][no_bukti]" id="no_bukti"
                                            placeholder="Nomor Bukti" value="{{ $noBukti }}" readonly required>
                                        <input type="hidden" name="beli[0][keterangan]" value="Masuk">
                                        <input type="hidden" name="beli[0][status]" value="success">
                                    </td>
                                    <td class="col">
                                        <input type="date" class="form-control tanggal" name="beli[0][tanggal]"
                                            placeholder="Tanggal" required>
                                    </td>
                                    <td class="col">
                                        <select name="beli[0][id_pemasok]" class="custom-select pemasok child-pemasok" required>
                                            <option selected>Pilih Pemasok</option>
                                            @foreach ($getPemasok as $pemasok)
                                                <option value="{{ $pemasok->id_pemasok }}">{{ $pemasok->nama_pemasok }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="col">
                                        <select name="beli[0][id_stok]" class="custom-select selectStok" required>
                                            <option selected>Pilih Barang</option>
                                            @foreach ($getStok as $stok)
                                                <option value="{{ $stok->id_stok }}" data-price="{{ $stok->harga_beli }}">
                                                    {{ $stok->nama_stok }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="col">
                                        <input type="number" class="form-control qty" name="beli[0][qty]"
                                            placeholder="Jumlah Barang" required>
                                    </td>
                                    <td class="col">
                                        <input type="text" value="" class="form-control hargaStok"
                                            placeholder="Harga Barang" readonly>
                                    </td>
                                    <td class="col">
                                        <input type="text" name="beli[0][subtotal]" value=""
                                            class="form-control subTotal" placeholder="Subtotal" readonly>
                                    </td>
                                    <td class="col">
                                        <a type="button" class="btn btn-primary w-100" id="add">Tambah
                                            Row</a>
                                    </td>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-success ml-2 mt-3 mb-3"
                                style="width:169px;">Submit</button>
                        </form>
                    </div>
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


    <script>

        const tanggalMaster = document.querySelector('.tanggal');
        const pemasokMaster = document.querySelector('.pemasok');
        const addRow = document.getElementById('add');
        let arrCount = 0;

        // pemasokMaster.addEventListener('change', function(){
        //     console.log(this.options[this.selectedIndex]);
        // })

        function updateDateInputs(newDate) {
            const dateInputs = document.querySelectorAll('input[type="date"]');
            dateInputs.forEach(function(input) {
                if (input !== tanggalMaster) { 
                    input.value = newDate;
                }
            });
        }

        function updatePemasok(newPemasok) {
            const childPemasok = document.querySelectorAll('.child-pemasok');
            childPemasok.forEach(function(pemasok) {
                if(pemasok !== pemasokMaster) {
                    pemasok.value = newPemasok;
                }
            });
        }

        pemasokMaster.addEventListener('change', function() {
            let selectedPemasok = this.value;
            updatePemasok(selectedPemasok);
        })

        tanggalMaster.addEventListener('change', function() {
            let tanggalValue = this.value;
            updateDateInputs(tanggalValue);
        });

        function initializeRow(newRow) {
            // seleksi selectOption Stok
            const selectStok = newRow.querySelector('.selectStok');
            // seleksi input untuk nampung harga stok
            const valueHargaStok = newRow.querySelector('.hargaStok');
            // seleksi input utk nampung qty
            const valueQty = newRow.querySelector('.qty');
            // seleksi input utk nampung subtotal
            const valueSubtotal = newRow.querySelector('.subTotal');
            const dateInput = newRow.querySelector('input[type="date"]');
            const childPemasok = newRow.querySelector('.child-pemasok');

            // Update date input dengan masternya
            dateInput.value = tanggalMaster.value;
            childPemasok.value = pemasokMaster.value;

            // ketika select option berubah
            selectStok.addEventListener('change', function() {
                // ambil index yang diklik
                let selectedOption = this.options[this.selectedIndex];
                // ambil atribut data-price dari option selectedOption
                const selectedPrice = selectedOption.getAttribute('data-price');

                // masukkan nilai dari data-price ke input harga stok dan konversi dalam bentuk Rp
                // valueHargaStok.value = `Rp. ${selectedPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
                valueHargaStok.value = selectedPrice;
            });

            // ketika input qty berubah
            valueQty.addEventListener('change', function() {
                // ambil value qty sekarang * value dari harga stok dan konversi ke integer
                const calcSubtotal = parseFloat(this.value) * parseFloat(valueHargaStok.value);

                // masukkan nilai dari kalkulasi ke input subtotal dan konversi ke bentuk Rp
                // valueSubtotal.value = `Rp. ${calcSubtotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
                valueSubtotal.value = calcSubtotal;
            });

        }

        addRow.addEventListener('click', () => {
            arrCount++;

            const table = document.getElementById("dynamicTable");
            const newRow = table.insertRow();

            newRow.className = 'row mt-2 p-2';
            newRow.innerHTML = `
                                    <td class="col">
                                         <input type="hidden" class="form-control" name="beli[${arrCount}][no_bukti]" id="no_bukti"
                                            placeholder="Nomor Bukti" value="{{ $noBukti }}" readonly required>
                                            <input type="hidden" name="beli[${arrCount}][keterangan]" value="Masuk">
                                            <input type="hidden" name="beli[${arrCount}][status]" value="success">
                                    </td>
                                    <td class="col">
                                        <input type="date" style="opacity:0%;" class="form-control" name="beli[${arrCount}][tanggal]" placeholder="Tanggal" required readonly>
                                    </td>
                                    <td class="col">
                                        <select name="beli[${arrCount}][id_pemasok]" style="opacity:0%;" class="custom-select child-pemasok" required readonly">
                                            <option selected>Pilih Pemasok</option>
                                            @foreach ($getPemasok as $pemasok)
                                                <option value="{{ $pemasok->id_pemasok }}">{{ $pemasok->nama_pemasok }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="col">
                                        <select name="beli[${arrCount}][id_stok]" class="custom-select selectStok" required>
                                            <option selected>Pilih Barang</option>
                                            @foreach ($getStok as $stok)
                                                <option value="{{ $stok->id_stok }}" data-price="{{ $stok->harga_beli }}">{{ $stok->nama_stok }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="col">
                                        <input type="number" class="form-control qty" name="beli[${arrCount}][qty]"
                                            placeholder="Jumlah Barang" required>
                                    </td>
                                    <td class="col">
                                        <input type="text" value="" class="form-control hargaStok"
                                            placeholder="Harga Barang" readonly>
                                    </td>
                                    <td class="col">
                                        <input type="text" name="beli[${arrCount}][subtotal]" value=""
                                            class="form-control subTotal" placeholder="Subtotal" readonly>
                                    </td>
                                    <td class="col">
                                        <button type="button" class="btn btn-danger w-100 remove-tr" id="add">Remove</button>
                                    </td>
                                    
            `;

            newRow.querySelector('.remove-tr').addEventListener('click', function() {
                this.closest('tr').remove()
            });

            initializeRow(newRow);
        });

        initializeRow(document);



        // // seleksi selectOption Stok
        // const selectStok = document.querySelector('.selectStok');
        // // seleksi input untuk nampung harga stok
        // const valueHargaStok = document.querySelector('.hargaStok');
        // // seleksi input utk nampung qty
        // const valueQty = document.querySelector('.qty');
        // // seleksi input utk nampung subtotal
        // const valueSubtotal = document.querySelector('.subTotal');

        // // ketika select option berubah
        // selectStok.addEventListener('change', function() {
        //     // ambil index yang diklik
        //     let selectedOption = this.options[this.selectedIndex];
        //     // ambil atribut data-price dari option selectedOption
        //     const selectedPrice = selectedOption.getAttribute('data-price');

        //     // masukkan nilai dari data-price ke input harga stok dan konversi dalam bentuk Rp
        //     // valueHargaStok.value = `Rp. ${selectedPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
        //     valueHargaStok.value = selectedPrice;
        // });

        // // ketika input qty berubah
        // valueQty.addEventListener('change', function() {
        //     // ambil value qty sekarang * value dari harga stok dan konversi ke integer
        //     const calcSubtotal = this.value * valueHargaStok.value;

        //     // masukkan nilai dari kalkulasi ke input subtotal dan konversi ke bentuk Rp
        //     // valueSubtotal.value = `Rp. ${calcSubtotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
        //     valueSubtotal.value = calcSubtotal;
        // });
    </script>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalMaster = document.querySelector('.tanggal');
            const pemasokMaster = document.querySelector('.pemasok');
            const addRow = document.getElementById('add');
            let arrCount = 0;

            function updateDateInputs(newDate) {
                const dateInputs = document.querySelectorAll('input[type="date"]');
                dateInputs.forEach(function(input) {
                    if (input !== tanggalMaster) { 
                        input.value = newDate;
                    }
                });
            }

            function updatePemasok(newPemasok) {
                const childPemasok = document.querySelectorAll('.child-pemasok');
                childPemasok.forEach(function(pemasok) {
                    pemasok.value = newPemasok;
                });
            }

            pemasokMaster.addEventListener('change', function() {
                let selectedPemasok = this.value;
                updatePemasok(selectedPemasok);
            });

            tanggalMaster.addEventListener('change', function() {
                let tanggalValue = this.value;
                updateDateInputs(tanggalValue);
            });

            function initializeRow(newRow) {
                const selectStok = newRow.querySelector('.selectStok');
                const valueHargaStok = newRow.querySelector('.hargaStok');
                const valueQty = newRow.querySelector('.qty');
                const valueSubtotal = newRow.querySelector('.subTotal');
                const dateInput = newRow.querySelector('input[type="date"]');
                const childPemasok = newRow.querySelector('.child-pemasok');

                dateInput.value = tanggalMaster.value;
                childPemasok.value = pemasokMaster.value;

                selectStok.addEventListener('change', function() {
                    let selectedOption = this.options[this.selectedIndex];
                    const selectedPrice = selectedOption.getAttribute('data-price');
                    valueHargaStok.value = selectedPrice;
                });

                valueQty.addEventListener('change', function() {
                    const calcSubtotal = parseFloat(this.value) * parseFloat(valueHargaStok.value);
                    valueSubtotal.value = calcSubtotal;
                });
            }

            addRow.addEventListener('click', () => {
                arrCount++;

                const table = document.getElementById("dynamicTable");
                const newRow = table.insertRow();

                newRow.className = 'row mt-2 p-2';
                newRow.innerHTML = `
                    <td class="col">
                        <input type="hidden" class="form-control" name="beli[${arrCount}][no_bukti]" id="no_bukti"
                            placeholder="Nomor Bukti" value="{{ $noBukti }}" readonly required>
                        <input type="hidden" name="beli[${arrCount}][keterangan]" value="Masuk">
                        <input type="hidden" name="beli[${arrCount}][status]" value="success">
                    </td>
                    <td class="col">
                        <input type="date" style="opacity:0%;" class="form-control" name="beli[${arrCount}][tanggal]" placeholder="Tanggal" required readonly>
                    </td>
                    <td class="col">
                        <select name="beli[${arrCount}][id_pemasok]" class="custom-select child-pemasok" required readonly >
                            <option selected>Pilih Pemasok</option>
                            @foreach ($getPemasok as $pemasok)
                                <option value="{{ $pemasok->id_pemasok }}">{{ $pemasok->nama_pemasok }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="col">
                        <select name="beli[${arrCount}][id_stok]" class="custom-select selectStok" required>
                            <option selected>Pilih Barang</option>
                            @foreach ($getStok as $stok)
                                <option value="{{ $stok->id_stok }}" data-price="{{ $stok->harga_beli }}">{{ $stok->nama_stok }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="col">
                        <input type="number" class="form-control qty" name="beli[${arrCount}][qty]"
                            placeholder="Jumlah Barang" required>
                    </td>
                    <td class="col">
                        <input type="text" value="" class="form-control hargaStok"
                            placeholder="Harga Barang" readonly>
                    </td>
                    <td class="col">
                        <input type="text" name="beli[${arrCount}][subtotal]" value=""
                            class="form-control subTotal" placeholder="Subtotal" readonly>
                    </td>
                    <td class="col">
                        <button type="button" class="btn btn-danger w-100 remove-tr">Remove</button>
                    </td>
                `;

                newRow.querySelector('.remove-tr').addEventListener('click', function() {
                    this.closest('tr').remove();
                });

                initializeRow(newRow);
            });

            initializeRow(document);
        });
    </script> -->
   
@stop
