@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="alert alert-success alert-block">
                <button class="close" type="button" data-dismiss="alert">x</button>
                <strong>Please select from the options : WITEL & BULAN</strong>
            </div>

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">

                        <div class="card-body">
                            <form action="#" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="WITEL">WITEL</label>
                                            <select name="WITEL" id="WITEL" class="form-control col-lg-12 mr-3 mt-1">
                                                <option value="">DIVRE 2</option>
                                                @foreach ($data as $data1)
                                                    @if (isset($_POST['WITEL']) && $_POST['WITEL'] == $data1->WITEL)
                                                        <option selected id="WITEL" value="{{ $data1->WITEL }}">
                                                            {{ $data1->WITEL }}
                                                        </option>
                                                    @else
                                                        <option id="WITEL" value="{{ $data1->WITEL }}">
                                                            {{ $data1->WITEL }}
                                                        </option>
                                                    @endif
    
                                                @endforeach
                                            </select>
    
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="STO">STO</label>
                                            <select name="STO" id="STO" class="form-control col-lg-12 mr-3 mt-1">
                                                <option value=""></option>
                                                
                                            </select>
    
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="BULAN">BULAN</label>
                                            <select name="BULAN" id="BULAN" class="form-control col-lg-12 mr-3 mt-1">
                                                <option value=""></option>
                                                
                                            </select>
    
                                        </div>
                                    </div>
                                </div>
    
                                <button type="submit" class="btn btn-primary col-lg-12 mt-1">Go</button>
    
                            </form>
                        </div>
                        <!-- /.card -->

                </section>
                <!-- /.Left col -->


            </div>
            <!-- /.row (main row) -->

    </section>
@endsection



@section('after-footer')

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="WITEL"]').on('change', function() {
            var WITEL = $(this).val();
            
            if(WITEL) {
                $.ajax({
                    url: '/profilkwg/ajax/'+WITEL,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="STO"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="STO"]').append('<option value="'+ value.STO +'" selected>'+ value.STO +'</option>'); 
                        });

                    }
                });
            }else{
                $('select[name="STO"]').empty();
            }
        });
    });
</script>

@endsection

@section('before-footer')
@endsection
