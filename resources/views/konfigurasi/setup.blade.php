@extends('layouts.master')
@section('title','Project Pertama')
@section('judul','SETUP')

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{ route('crud.tambah') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i>
                Tambah Data</a>

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

            <table class="table table-striped table-bordered table-sm">
                <tr>
                    <th>No</th>
                    <th>Hari Kerja</th>
                    <th>Action</th>
                </tr>
                @foreach ($setup as $no => $data)
                <tr>
                    <td>{{ $setup->firstItem()+$no }}</td>
                    <td>{{ $data->hari_kerja }}</td>
                    <td>
                        <a href="{{ route('crud.edit',$data->id) }}" class="badge badge-warning">Edit</a>
                        <a href="#" data-id="{{ $data->id }}" class="badge badge-danger swal-confirm">
                            <form action="{{ route('crud.delete',$data->id) }}" id="delete{{ $data->id }}"
                                method="POST">
                                @csrf
                                @method('delete')
                            </form>
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>

            {{ $data_barang->links() }}

        </div>
    </div>
</div>
@endsection

@push('page-scripts')

<!-- JS Libraies -->
<script src="{{ asset('stisla/assets/modules/sweetalert/sweetalert.min.js') }}"></script>

@endpush

@push('after-scripts')

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

@endpush