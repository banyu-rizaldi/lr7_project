@extends('layouts.master')
@section('title','Project Pertama')
@section('judul','Noss Service Info')

@section('judul1')
<a href="{{ route('dashboard') }}">Dashboard</a>
<li class="breadcrumb-item active">Master Data</li>
<li class="breadcrumb-item active">Noss Service Info</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('noss_service_info.tambah') }}" class="btn btn-icon icon-left btn-primary"><i
                                class="fas fa-plus"></i>
                            Tambah Data Noss Service Info</a>

                        <hr>

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

                        <table class="table table-striped table-hover">
                            <tr>
                                <th>No</th>
                                <th>NOTEL</th>
                                <th>TECHNOLOGY</th>
                                <th>STP_TARGET</th>
                                <th>STP_PORT</th>
                                <th>SP_TARGET</th>
                                <th>SP_PORT</th>
                                <th>SERVICE_STATUS</th>
                                <th>ACTION</th>
                            </tr>
                            @foreach ($data_noss as $no => $data)
                            <tr>
                                <td>{{ $data_noss->firstItem()+$no }}</td>
                                <td>{{ $data->NOTEL }}</td>
                                <td>{{ $data->TECHNOLOGY }}</td>
                                <td>{{ $data->STP_TARGET }}</td>
                                <td>{{ $data->STP_PORT }}</td>
                                <td>{{ $data->SP_TARGET }}</td>
                                <td>{{ $data->SP_PORT }}</td>
                                <td>{{ $data->SERVICE_STATUS }}</td>
                                <td>
                                    <a href="{{ route('noss_service_info.edit',$data->NOTEL) }}"
                                        class="badge badge-warning">Edit</a>
                                    <a href="#" data-id="{{ $data->NOTEL }}" class="badge badge-danger swal-confirm">
                                        <form action="{{ route('noss_service_info.delete',$data->NOTEL) }}"
                                            id="delete{{ $data->NOTEL }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                        {{ $data_noss->links() }}
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
</script>

@endsection