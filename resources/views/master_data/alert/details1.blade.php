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
                                    <td><label><b>DEPENDENT</b></label></td>
                                    <td><label><b>ACTION</b></label></td>
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
                                    <td>
                                        {{-- <a href="{{ route('alert.edit',$item->NOTEL) }}"
                                                class="badge badge-warning">Edit</a> --}}
                                        <a href="" class="badge badge-warning"
                                        data-toggle="modal" data-target="#exampleModal{{ $item->NOTEL }}"
                                        >Edit</a>
                                    </td>
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
<!-- Modal -->
    @foreach ($getData as $item)
    <div class="modal fade" id="exampleModal{{ $item->NOTEL }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                
                <form action="{{ route('alert.update',$item->NOTEL) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> NOTEL </label>
                                <input type="text" name="NOTEL" value="{{ $item->NOTEL }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label > WITEL </label>
                                <input type="text" name="WITEL" value="{{ $item->WITEL }}" class="form-control" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label > STO </label>
                                <input type="text" name="STO" value="{{ $item->STO }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label > BULAN ALERT </label>
                                <input type="text" name="BULAN_ALERT" value="{{ $item->BULAN_ALERT }}" class="form-control" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label > ATRIBUT </label>
                                <input type="text" name="ATRIBUT" value="{{ $item->ATRIBUT }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                                <label > TGL PS </label>
                                <input type="text" name="TGL_PS" value="{{ $item->TGL_PS }}" class="form-control" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label > AGE </label>
                                <input type="text" name="AGE" value="{{ $item->AGE }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label > ALERT </label>
                                <input type="text" name="ALERT" value="{{ $item->ALERT }}" class="form-control" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label > SC{{ (

                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label @error('STATUS') class="text-danger" @enderror> STATUS
                                    @error('STATUS')
                                    | {{ $message }}
                                    @enderror</label>
                                <select name="STATUS" class="custom-select" id="STATUS"> 
                                    <option value="Open" {{ $item->ATRIBUT == 'Open' ? 'selected' : '' }}>Open</option>
                                    <option value="Contacted" {{ $item->ATRIBUT == 'Contacted' ? 'selected' : '' }}>Contacted</option>
                                    <option value="Uncontacted" {{ $item->ATRIBUT == 'Uncontacted' ? 'selected' : '' }}>Uncontacted</option>
                                    <option value="In-Progress" {{ $item->ATRIBUT == 'In-Progress' ? 'selected' : '' }}>In-Progress</option>
                                    <option value="Closed" {{ $item->ATRIBUT == 'Closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> DESKRIPSI </label>
                                <textarea name="DESKRIPSI" class="form-control" id="DESKRIPSI"
                                placeholder="DESKRIPSI.....">{{ old('DESKRIPSI') }}</textarea>
                            </div>
                        </div>

                    </div>

                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label > NAMA PEMILIK </label>
                                <input type="text" name="NAMA_PEMILIK" value="{{ $item->NAMA_PEMILIK }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label > RELASI </label>
                                <input type="text" name="RELASI" value="{{ $item->RELASI }}" class="form-control" readonly>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label > EMAIL </label>
                                <input type="text" name="EMAIL"  value="{{ $item->EMAIL }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label > PHONE </label>
                                <input type="text" name="PHONE" value="{{ $item->PHONE }}"  class="form-control" readonly>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label > FILE </label>
                                <input type="file" name="FILE" class="form-control">
                            </div>
                        </div>
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
    @endforeach
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
