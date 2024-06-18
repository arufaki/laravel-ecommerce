<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelas || Edit</title>
</head>

<body>
    @extends('include.welcome')
    @section('content')
        @php
            $rec = \DB::table('kelas')
                ->where('id_kelas', $id_kelas)
                ->first();
            $dataTahunAkademik = DB::Table('tahun_akademik')->get();
        @endphp
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <!-- left column -->
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Kelas</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('kelas/' . $id_kelas) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id_kelas" value="{{ $id_kelas }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_kelas">Kode Kelas</label>
                                        <input type="number" class="form-control" id="kode_kelas" name="kode_kelas"
                                            value="{{ $rec->kode_kelas ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kelas">Nama Kelas</label>
                                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas"
                                            value="{{ $rec->nama_kelas ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_tahun_akademik">Tahun Akademik</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_tahun_akademik"
                                            id="id_tahun_akademik" required>
                                            @foreach ($dataTahunAkademik as $dataTA)
                                                <option value="{{ $dataTA->id_tahun_akademik }}"
                                                    {{ $rec->id_tahun_akademik == $dataTA->id_tahun_akademik ? 'selected' : '' }}>
                                                    {{ $dataTA->kode_tahun_akademik }} - {{ $dataTA->nama_tahun_akademik }}
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
    </body>
@stop

</html>
