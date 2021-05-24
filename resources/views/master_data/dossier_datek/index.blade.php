@extends('layouts.master')
@section('title','Project Pertama')
@section('judul','Dossier Datek')

@section('judul1')
<a href="{{ route('dashboard') }}">Dashboard</a>
<li class="breadcrumb-item active">Master Data</li>
<li class="breadcrumb-item active">Dossier Datek</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('dossier_datek.tambah') }}" class="btn btn-icon icon-left btn-primary"><i
                                class="fas fa-plus"></i>
                            Tambah Data Dossier Datek</a>

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

                        <table id="table_id_2" class="table table-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NOTEL</th>
                                    <th>ND REFERENCE</th>
                                    <th>LGEST</th>
                                    <th>LCAT</th>
                                    <th>ABRV_ART</th>
                                    <th>LART</th>
                                    <th>LTARIF</th>
                                    <th>DATEL</th>
                                    <th>BULAN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_datek as $no => $data)
                                <tr>
                                    <td>{{ $data_datek->firstItem()+$no }}</td>
                                    <td>{{ $data->ND }}</td>
                                    <td>{{ $data->ND_REFERENCE }}</td>
                                    <td>{{ $data->LGEST }}</td>
                                    <td>{{ $data->LCAT }}</td>
                                    <td>{{ $data->ABRV_ART }}</td>
                                    <td>{{ $data->LART }}</td>
                                    <td>{{ $data->LTARIF }}</td>
                                    <td>{{ $data->DATEL }}</td>
                                    <td>{{ $data->BULAN }}</td>
                                    <td></td>
                                    {{-- <td>
                                    <a href="{{ route('dossier_datek.edit',$data->NOTEL) }}"
                                    class="badge badge-warning">Edit</a>
                                    <a href="#" data-id="{{ $data->NOTEL }}" class="badge badge-danger swal-confirm">
                                        <form action="{{ route('dossier_datek.delete',$data->NOTEL) }}"
                                            id="delete{{ $data->NOTEL }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        Delete
                                    </a>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $data_datek->links() }}
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
        $('#table_id_2').DataTable({
            "paging": false,
            "info": false,
        });

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