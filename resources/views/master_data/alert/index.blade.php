
@extends('layouts.master')
@section('judul', 'Alert Update')

@section('css')

    <style>
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

    </style>

@endsection

@section('judul1')
    <a href="#">Dashboard</a>
@endsection

@section('content')


    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <form action="{{ route('alert.detil') }}" method="POST" class="col-lg-12">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="WITEL">WITEL</label>
                                                <select name="WITEL" id="WITEL" class="form-control input-lg dynamic" data-dependent="STO"> 
                                                    <option value="">DIVRE 2</option>
                                                    @foreach ($getWitel as $data1)
                                                        <option value="{{ $data1->WITEL }}">
                                                            {{ $data1->WITEL }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="STO">STO</label>
                                                <select name="STO" id="STO" class="form-control input-lg dynamic">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ATRIBUT">ATRIBUT</label>
                                                <select name="ATRIBUT" id="ATRIBUT" class="form-control">
                                                    <option value=""></option>
                                                    <option value="VERY BAD LTCY & PKT LOSS" {{ old('ATRIBUT') == 'VERY BAD LTCY & PKT LOSS' ? 'selected' : '' }}>VERY BAD LTCY & PKT LOSS</option>
                                                    <option value="BAD PAYMENT DATE" {{ old('ATRIBUT') == 'BAD PAYMENT DATE' ? 'selected' : '' }}>BAD PAYMENT DATE</option>
                                                    <option value="UNSPEC" {{ old('ATRIBUT') == 'UNSPEC' ? 'selected' : '' }}>UNSPEC</option>
                                                    <option value="USAGE <5GB" {{ old('ATRIBUT') == 'USAGE <5GB' ? 'selected' : '' }}>USAGE < 5GB</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="STATUS">STATUS</label>
                                                <select name="STATUS" id="STATUS" class="form-control ">
                                                    <option value=""></option>
                                                    <option value="Open" {{ old('STATUS') == 'Open' ? 'selected' : '' }}>Open</option>
                                                    <option value="Contacted" {{ old('STATUS') == 'Contacted' ? 'selected' : '' }}>Contacted</option>
                                                    <option value="Uncontacted" {{ old('STATUS') == 'Uncontacted' ? 'selected' : '' }}>Uncontacted</option>
                                                    <option value="In-Progress" {{ old('STATUS') == 'In-Progress' ? 'selected' : '' }}>In-Progress</option>
                                                    <option value="Closed" {{ old('STATUS') == 'Closed' ? 'selected' : '' }}>Closed</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary col-lg-12">Go</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    

    

@endsection

@section('before-after')

@endsection

@section('after-footer')
   
<script type="text/javascript">
    $(document).ready(function(){
        $('.dynamic').change(function(){
            if($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('alert.getSto') }}",
                    method:"POST",
                    data:{
                        select:select,
                        value:value,
                        dependent:dependent,
                        _token:_token
                    },
                    success:function(result)
                    {
                        $('#'+dependent).html(result);
                    }
                })
            }
        });

        $("#table-details").DataTable({
            "lengthChange": false,
            "paging": true,
            "ordering": false,
            "info": false

        });
    });
</script>

@endsection

@section('middle-footer')

@endsection
