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
                                <h3 class="card-title">Tambah Prodi</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('prodi') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_prodi">Kode Prodi</label>
                                        <input type="number" class="form-control" id="kode_prodi" name="kode_prodi">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_prodi">Nama Prodi</label>
                                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_dosen">Nama Kaprodi</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_dosen"
                                            id="id_dosen" required>
                                            {{-- @php
                                                $rec = DB::table('tbldosen')->get();
                                                $id_dosen = 0;
                                            @endphp --}}

                                            @foreach ($recordKaprodi as $record)
                                                @if($id_dosen == $record->id_dosen)
                                                    <option selected='selected' value="{{$record->id_dosen}}">{{$record->nama_dosen}}</option>
                                                @else
                                                    <option value="{{$record->id_dosen}}">{{$record->nama_dosen}}</option>
                                                @endif
                                                {{-- @php
                                                    if ($id_dosen == $key->id_dosen) {
                                                        echo "<option selected='selected' value='" . $key->id_dosen . "'>" . $key->nama_dosen . '</option>';    
                                                    } else {
                                                        echo "<option value='" . $key->id_dosen . "'>" . $key->nama_dosen . '</option>';
                                                    }
                                                @endphp --}}
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_jenjang">Jenjang</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_jenjang"
                                            id="id_jenjang" required>
                                            @php
                                                $rec = DB::table('jenjang')->get();
                                                $id_jenjang = 0;
                                            @endphp

                                            @foreach ($rec as $key)
                                                @php
                                                    if ($id_jenjang == $key->id_jenjang) {
                                                        echo "<option selected='selected' value='" . $key->id_jenjang . "'>" . $key->nama_jenjang . '</option>';
                                                    } else {
                                                        echo "<option value='" . $key->id_jenjang . "'>" . $key->nama_jenjang . '</option>';
                                                    }
                                                @endphp
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_fakultas">Fakultas</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_fakultas"
                                            id="id_fakultas" required>
                                            @php
                                                $rec = DB::table('fakultas')->get();
                                                $id_fakultas = 0;
                                            @endphp

                                            @foreach ($rec as $key)
                                                @php
                                                    if ($id_fakultas == $key->id_fakultas) {
                                                        echo "<option selected='selected' value='" . $key->id_fakultas . "'>" . $key->nama_fakultas . '</option>';
                                                    } else {
                                                        echo "<option value='" . $key->id_fakultas . "'>" . $key->nama_fakultas . '</option>';
                                                    }
                                                @endphp
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tglsk">Tanggal SK</label>
                                        <input type="date" class="form-control" id="tglsk" name="tglsk">
                                    </div>
                                    <div class="form-group">
                                        <label for="akreditasi">Akreditasi</label>
                                        <input type="text" class="form-control" id="akreditasi" name="akreditasi">
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
