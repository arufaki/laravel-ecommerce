    @extends('include.welcome')
    @section('content')

    @if(session('sukses'))
    <div class="alert alert-dismissible fade show alert-success" role="alert">
        <strong>Halo, User!</strong> {{ session('sukses')  }}
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
                                <h3 class="card-title">Tambah Kelas</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('kelas') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_kelas">Kode Kelas</label>
                                        <input type="number" class="form-control" id="kode_kelas" name="kode_kelas">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kelas">Nama Kelas</label>
                                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_tahun_akademik">Tahun Akademik</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_tahun_akademik"
                                            id="id_tahun_akademik" required>
                                            @foreach ($recordTA as $record)
                                                @if($id_tahun_akademik == $record->id_tahun_akademik)
                                                <option value="{{$record->id_tahun_akademik}}" selected="selected">{{$record->kode_tahun_akademik}} - {{$record->nama_tahun_akademik}}</option>
                                                @else
                                                <option value="{{$record->id_tahun_akademik}}">{{$record->kode_tahun_akademik}} - {{$record->nama_tahun_akademik}}</option>
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