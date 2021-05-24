@extends('layouts.master')
@section('title','Project Pertama')
@section('judul','Dossier Kuadran')

@section('judul1')
<a href="{{ route('dashboard') }}">Dashboard</a>
<li class="breadcrumb-item active">Master Data</li>
<li class="breadcrumb-item active">Dossier Kuadran</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('dossier_kuadran.tambah') }}" class="btn btn-icon icon-left btn-primary"><i
                                class="fas fa-plus"></i>
                            Tambah Data Dossier Kuadran</a>

                        <a href="{{ route('dossier_kuadran.exportExcel') }}" type="button" class="btn btn-sm btn-success">
                            <i class="far fa-file-excel"></i>
                            <label for="">Export Excel</label>
                        </a>

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

                        <br>

                        <table id="table_id_1" class="table table-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>KAWASAN (DIVRE)</th>
                                    <th>WITEL</th>
                                    <th>STO</th>
                                    <th>NOTEL</th>
                                    <th>ND REFerence</th>
                                    <th>PRODUCT</th>
                                    <th>PLBLCL</th>
                                    <th>CPROD</th>
                                    <th>GROUP_INDIHOME</th>
                                    <th>LINECATS_FAMILY_LNAME</th>
                                    <th>TECHNO</th>
                                    <th>REVENUE_TREMS</th>
                                    <th>REVENUE_REF</th>
                                    <th>KWADRAN_INDIHOME</th>
                                    <th>KWADRAN_INET</th>
                                    <th>KWADRAN_POTS</th>
                                    <th>IS_CT0</th>
                                    <th>CITEM</th>
                                    <th>SPEED</th>
                                    <th>NCLI</th>
                                    <th>NDOS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_dossier as $no => $data)
                                <tr>
                                    <td>{{ $data_dossier->firstItem()+$no}}</td>
                                    <td>{{ $data->KAWASAN }}</td>
                                    <td>{{ $data->WITEL }}</td>
                                    <td>{{ $data->STO }}</td>
                                    <td>{{ $data->NOTEL }}</td>
                                    <td>{{ $data->ND_REFERENCE }}</td>
                                    <td>{{ $data->PRODUCT }}</td>
                                    <td>{{ $data->PLBLCL }}</td>
                                    <td>{{ $data->CPROD }}</td>
                                    <td>{{ $data->GROUP_INDIHOME }}</td>
                                    <td>{{ $data->LINECATS_FAMILY_LNAME }}</td>
                                    <td>{{ $data->TECHNO }}</td>
                                    <td>{{ $data->REVENUE_TREMS }}</td>
                                    <td>{{ $data->REVENUE_REF }}</td>
                                    <td>{{ $data->KWADRAN_INDIHOME }}</td>
                                    <td>{{ $data->KWADRAN_INET }}</td>
                                    <td>{{ $data->KWADRAN_POTS }}</td>
                                    <td>{{ $data->IS_CT0 }}</td>
                                    <td>{{ $data->CITEM }}</td>
                                    <td>{{ $data->SPEED }}</td>
                                    <td>{{ $data->NCLI }}</td>
                                    <td>{{ $data->NDOS }}</td>
                                    <td>
                                        <a href="{{ route('dossier_kuadran.edit',$data->NOTEL) }}"
                                            class="badge badge-warning">Edit</a>
                                        <a href="#" data-id="{{ $data->NOTEL }}"
                                            class="badge badge-danger swal-confirm">
                                            <form action="{{ route('dossier_kuadran.delete',$data->NOTEL) }}"
                                                id="delete{{ $data->NOTEL }}" method="POST">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $data_dossier->links() }}
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
        $('#table_id_1').DataTable({
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