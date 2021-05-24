@extends('layouts.master')
@section('judul', 'Alert Update')

@section('css')

    <style>
        table, tr, td, th
        {
            border: 1px solid black;
            border-collapse:collapse;
        }
        tr.header
        {
            cursor:pointer;
        }

        .center {
            margin: auto;
            width: 100%;
            border: 1px;
            padding: 30px;
            text-align: center;
        }

        .thead {
            background-color: #B20110;
        }

        .atas {
            margin-right: 5px;
        }

    </style>

@endsection

@section('judul1')
    <a href="#">Dashboard</a>
@endsection

@section('content')

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table id="table-1" class="table table-hover table-bordered table-responsive" style="width:100%;">

                            <thead class="thead text-white">
                                <tr>
                                    <td><label><b>NOTEL</b></label></td>
                                    <td><label><b>WITEL</b></label></td>
                                    <td><label><b>STO</b></label></td>
                                    <td><label><b>TGL PS</b></label></td>
                                    <td><label><b>AGE</b></label></td>
                                    <td><label><b>ATRIBUT</b></label></td>
                                    <td><label><b>ALERT</b></label></td>
                                    <td><label><b>SCORE</b></label></td>
                                    <td><label><b>BULAN ALERT</b></label></td>
                                    <td><label><b>STATUS</b></label></td>
                                    <td><label><b>DESKRIPSI</b></label></td>
                                    <td><label><b>DEPEDENSI</b></label></td>
                                </tr>
                            </thead>
                        
                            {{-- corrective --}}
                            <tbody>
                                @foreach ($getData as $item)
                                <tr>
                                    <td>{{ $item->NOTEL }}</td>
                                    <td>{{ $item->WITEL }}</td>
                                    <td>{{ $item->STO }}</td>
                                    <td>{{ $item->TGL_PS }}</td>
                                    <td>{{ $item->AGE }}</td>
                                    <td>{{ $item->ATRIBUT }}</td>
                                    <td>{{ $item->ALERT }}</td>
                                    <td>{{ $item->SCORE }}</td>
                                    <td>{{ $item->BULAN_ALERT }}</td>
                                    <td>{{ $item->STATUS }}</td>
                                    <td>{{ $item->DESKRIPSI }}</td>
                                    @if ($item->FILE == '')
                                        <td></td>
                                    @else 
                                        <td><img src="{{ asset($item->FILE) }}" class="img-thumbnail"></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>  
                        </table>

                        <a href="{{ route('alert.index') }}" class="btn btn-primary"> Back </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


@endsection

@section('before-footer')

@endsection

@section('after-footer')
<script>
    $("#table-1").DataTable({
        "lengthChange": true,
            "paging": true,
            "ordering": false,
            "info": false  

    });
</script>
@endsection

@section('middle-footer')

@endsection
