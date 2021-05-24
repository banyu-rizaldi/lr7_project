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
                        {{-- <a href="{{ route('dossier_kuadran.tambah') }}" class="btn btn-icon icon-left
                        btn-primary"><i class="fas fa-plus"></i>
                        Tambah Data User</a> --}}

                        <a type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-fw fa-plus"></i>
                            <label for="">Create</label>
                        </a>

                        <a type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                            data-target="#exampleModalImport">
                            <i class="fas fa-fw fa-plus"></i>
                            <label for="">Import Excel</label>
                        </a>

                        <a href="/pegawai/exportExcel" type="button" class="btn btn-sm btn-success">
                            <i class="far fa-file-excel"></i>
                            <label for="">Export Excel</label>
                        </a>

                        <a href="/pegawai/exportPdf" type="button" class="btn btn-sm btn-info">
                            <i class="far fa-file-pdf"></i>
                            <label for="">Export Pdf</label>
                        </a>

                        <hr>

                        {{-- @if (session('message'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                </button>
                                {{ session('message') }}
                    </div>
                </div>
                @endif --}}

                {{-- <form action="{{ route('cari') }}" method="GET">
                <input type="text" name="cari" placeholder="Cari Kawasan .." value="{{ old('cari') }}">
                <input type="submit" value="CARI">
                </form> --}}

                <br>

                <table id="table_id" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $no => $data)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td><a href="/pegawai/{{ $data->id }}/profile">{{ $data->nama_depan }}</a></td>
                            <td><a href="/pegawai/{{ $data->id }}/profile">{{ $data->nama_belakang }}</a></td>
                            <td>{{ $data->jenis_kelamin }}</td>
                            <td>{{ $data->agama }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>
                                <a href="/pegawai/{{ $data->id }}/edit" class="badge badge-warning">Edit</a>
                                <a href="#" class="badge badge-danger swal-confirm" data-id="{{ $data->id }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/pegawai/create" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('nama_depan') ? ' has-error' : '' }}">
                        <label for="exampleInputEmail1">Nama Depan</label>
                        <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Nama Depan" value="{{ old('nama_depan') }}">
                        @if ($errors->has('nama_depan'))
                        <span class="help-block text-danger">{{ $errors->first('nama_depan') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Belakang</label>
                        <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Nama Belakang" value="{{ old('nama_belakang') }}">
                    </div>
                    <div class="form-group{{ $errors->has('username') ? 'has-error' : '' }}">
                        <label for="exampleInputEmail1">Username</label>
                        <input name="username" type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Username" value="{{ old('username') }}">
                        @if ($errors->has('username'))
                        <span class="help-block text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="exampleInputEmail1">Email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                            placeholder="Email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pilih Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="custom-select" id="inputGroupSelect01">
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group{{ $errors->has('agama') ? 'has-error' : '' }}">
                        <label for="exampleInputEmail1">Agama</label>
                        <input name="agama" type="text" class="form-control" id="exampleInputEmail1" placeholder="Agama"
                            value="{{ old('agama') }}">
                        @if ($errors->has('agama'))
                        <span class="help-block text-danger">{{ $errors->first('agama') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <textarea name="alamat" class="form-control" id="validationTextarea"
                            placeholder="Alamat....">{{ old('alamat') }}</textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Import excel -->
<div class="modal fade" id="exampleModalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'pegawai.import', 'class' => 'form-horizontal', 'enctype' =>
                'multipart/form-data']) !!}

                {!! Form::file('data_pegawai') !!}
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-sm btn-primary" value="Import">
                </form>
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

        $(".swal-confirm").click(function() {
            var pegawai_id = $(this).attr('data-id');
            swal({
                title: 'Yakin Hapus Data ?',
                text: 'Data yang dihapus tida bisa di kembalikan',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/pegawai/"+pegawai_id+"/delete"
                        // $(`#delete${id}`).submit();
                    }
                });
        });
    })

</script>

@endsection