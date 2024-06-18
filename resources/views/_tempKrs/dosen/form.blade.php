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
                                <h3 class="card-title">Tambah Dosen</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('dosen') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nid">NID</label>
                                        <input type="number" class="form-control" id="nid" name="nid">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_dosen">Nama Dosen</label>
                                        <input type="text" class="form-control" id="nama_dosen" name="nama_dosen">
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary1 jenis_kelamin" name="jenis_kelamin"
                                                value="laki-laki">
                                            <label for="radioPrimary1">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary1 jenis_kelamin" name="jenis_kelamin"
                                                value="perempuan">
                                            <label for="radioPrimary1">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat">
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">No Telepon</label>
                                        <input type="number" class="form-control" id="nohp" name="nohp">
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

