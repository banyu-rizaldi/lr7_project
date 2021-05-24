@extends('layouts.master')
@section('title','Project Pertama')
@section('judul','Master Data User')

@section('judul1')
<a href="{{ route('dashboard') }}">Dashboard</a>
<li class="breadcrumb-item active">Master Data</li>
<li class="breadcrumb-item active">User</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                        @if (session('message'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                </button>
                                {{ session('message') }}
                            </div>
                        </div>
                        @endif
                        <br>

                        <form action="/pegawai/{{ $pegawai->id }}/update" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Depan</label>
                                <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Nama Depan" value="{{ $pegawai->nama_depan }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Belakang</label>
                                <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Nama Belakang" value="{{ $pegawai->nama_belakang }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Pilih Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="custom-select" id="inputGroupSelect01">
                                    <option value="L" @if($pegawai->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                    <option value="P" @if($pegawai->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Agama</label>
                                <input name="agama" type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Agama" value="{{ $pegawai->agama }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <textarea name="alamat" class="form-control" id="validationTextarea"
                                    placeholder="Alamat....">{{ $pegawai->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Avatar</label>
                                <input type="file" name="avatar" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('after-footer')

<!-- JS Libraies -->
<script src="{{ asset('adminLte/plugins/sweetalert2/sweetalert.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $('#table_id').DataTable();

        $(".swal-confirm").click(function(e) {
            id = e.target.dataset.id;
            swal({
                title: 'Yakin Hapus Data ?',
                text: 'Data yang dihapus ga bisa di kembalikan',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // swal('Poof! Your imaginary file has been deleted!', {
                        //     icon: 'success',
                        // });
                        $(`#delete${id}`).submit();
                    } else {
                        // swal('Your imaginary file is safe!');
                    }
                });
        });
    })

</script>

@endsection