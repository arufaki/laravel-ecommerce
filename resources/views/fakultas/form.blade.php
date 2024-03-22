<body>
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
                                <h3 class="card-title">Tambah Fakultas</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('fakultas') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_fakultas">Kode Fakultas</label>
                                        <input type="number" class="form-control" id="kode_fakultas" name="kode_fakultas">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_fakultas">Nama Fakultas</label>
                                        <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_dosen">Nama Dekan</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_dosen"
                                            id="id_dosen" required>
                                            @foreach ($recordDekan as $record)
                                                @if($id_dosen == $record->id_dosen)
                                                    <option selected='selected' value="{{$record->id_dosen}}">{{$record->nama_dosen}}</option>
                                                @else
                                                    <option value="{{$record->id_dosen}}">{{$record->nama_dosen}}</option>
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
        </section>
@stop
