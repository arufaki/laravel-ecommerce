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
                                <h3 class="card-title">Edit Fakultas</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('fakultas/' . $id_fakultas) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id_fakultas" value="{{ $id_fakultas }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_fakultas">Kode Fakultas</label>
                                        <input type="number" class="form-control" id="kode_fakultas" name="kode_fakultas"
                                            value="{{ $recordFakultas->kode_fakultas ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_fakultas">Nama Fakultas</label>
                                        <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas"
                                            value="{{ $recordFakultas->nama_fakultas ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_dosen=">Nama Dekan</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_dosen"
                                            id="id_dosen" required>
                                            @foreach ($dataDekan as $dekan)
                                                <option value="{{ $dekan->id_dosen }}" {{ $recordFakultas->id_dosen == $dekan->id_dosen ? 'selected' : '' }}>
                                                    {{ $dekan->nama_dosen }}
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
