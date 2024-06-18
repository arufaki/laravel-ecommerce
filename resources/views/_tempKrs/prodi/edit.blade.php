    @extends('include.welcome')
    @section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <!-- left column -->
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Prodi</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('prodi/' . $id_prodi) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id_prodi" value="{{ $id_prodi }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_prodi">Kode Prodi</label>
                                        <input type="number" class="form-control" id="kode_prodi" name="kode_prodi"
                                            value="{{ $recordsProdi->kode_prodi ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_prodi">Nama Prodi</label>
                                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi"
                                            value="{{ $recordsProdi->nama_prodi ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_dosen=">Nama Kaprodi</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_dosen"
                                            id="id_dosen" required>
                                            @foreach ($dataKaprodi as $kaprodi)
                                                <option value="{{ $kaprodi->id_dosen }}"
                                                    {{ $recordsProdi->id_dosen == $kaprodi->id_dosen ? 'selected' : '' }}>
                                                    {{ $kaprodi->nama_dosen }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_jenjang">Jenjang</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_jenjang"
                                            id="id_jenjang" required>
                                            @foreach ($dataJenjang as $jenjang)
                                                <option value="{{ $jenjang->id_jenjang }}"
                                                    {{ $recordsProdi->id_jenjang == $jenjang->id_jenjang ? 'selected' : '' }}>
                                                    {{ $jenjang->nama_jenjang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_fakultas">Fakultas</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_fakultas"
                                            id="id_fakultas" required>
                                            @foreach ($dataFakultas as $fakultas)
                                                <option value="{{ $fakultas->id_fakultas }}"
                                                    {{ $recordsProdi->id_fakultas == $fakultas->id_fakultas ? 'selected' : '' }}>
                                                    {{ $fakultas->nama_fakultas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tglsk">Tanggal SK</label>
                                        <input type="date" class="form-control" id="tglsk" name="tglsk"
                                            value="{{ $recordsProdi->tglsk ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="akreditasi">Akreditasi</label>
                                        <input type="text" class="form-control" id="akreditasi" name="akreditasi"
                                            value="{{ $recordsProdi->akreditasi ?? '' }}">
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
