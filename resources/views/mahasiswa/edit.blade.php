    @extends('include.welcome')
    @section('content')
        @php
            $rec = \DB::table('tblmhs')
                ->where('id', $id)
                ->first();
                $dataDosenPA = DB::Table('tbldosen')->get();
                $dataProdi = DB::Table('prodi')->get();
        @endphp
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <!-- left column -->
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Mahasiswaa</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('mahasiswa/' . $id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $id }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="number" class="form-control" id="nim" name="nim"
                                            value="{{ $rec->nim ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Mahasiswa</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ $rec->nama ?? '' }}">
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary1 jenis_kelamin" name="jenis_kelamin"
                                                value="laki-laki" {{ $rec->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}>
                                            <label for="radioPrimary1">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary1 jenis_kelamin" name="jenis_kelamin"
                                                value="perempuan" {{ $rec->jenis_kelamin == 'perempuan' ? 'checked' : '' }}>
                                            <label for="radioPrimary1">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                            value="{{ $rec->alamat ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">No Telepon</label>
                                        <input type="number" class="form-control" id="nohp" name="nohp"
                                            value="{{ $rec->nohp ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_prodi=">Prodi</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_prodi"
                                            id="id_prodi" required>
                                            @foreach ($dataProdi as $prodi)
                                                <option value="{{ $prodi->id_prodi }}"
                                                    {{ $rec->id_prodi == $prodi->id_prodi ? 'selected' : '' }}>
                                                    {{ $prodi->nama_prodi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_dosen=">Nama Dosen PA</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_dosen"
                                            id="id_dosen" required>
                                            @foreach ($dataDosenPA as $dosenPA)
                                                <option value="{{ $dosenPA->id_dosen }}"
                                                    {{ $rec->id_dosen == $dosenPA->id_dosen ? 'selected' : '' }}>
                                                    {{ $dosenPA->nama_dosen }}
                                                </option>
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

