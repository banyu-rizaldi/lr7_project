@extends('layouts.master')
@section('title', 'Sales')
@section('judul', 'Sales')

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
                            <div class="row">
                                <label for="" class="atas">REG</label>
                                <div class="atas">
                                    <select class="form-select">
                                        <option selected>SELECT</option>

                                    </select>
                                </div>

                                <label for="" class="atas">WITEL</label>
                                <div class="atas">
                                    <Select class="form-select" id="data_dossier" name="data_dossier">
                                        <option value="">SELECT</option>

                                    </select>
                                </div>
                                <label for="" class="atas">STO</label>
                                <div class="atas">
                                    <select class="form-select">
                                        <option selected>ALL</option>
                                        <option value="1">Service Quality</option>
                                        <option value="2">Billing Quality</option>
                                        <option value="3">Customer Behavior</option>
                                        <option value="3">Loyalty Program</option>
                                        <option value="3">Blacklist</option>
                                        <option value="3">Competitor</option>
                                    </select>
                                </div>
                                <label for="" class="atas">BULAN PS</label>
                                <div class="atas">
                                    <select class="form-select">
                                        <option selected>ALL</option>
                                        <option value="1">Service Quality</option>
                                        <option value="2">Billing Quality</option>
                                        <option value="3">Customer Behavior</option>
                                        <option value="3">Loyalty Program</option>
                                        <option value="3">Blacklist</option>
                                        <option value="3">Competitor</option>
                                    </select>
                                </div>
                                <label for="" class="atas">UMUR</label>
                                <div class="atas">
                                    <select class="form-select">
                                        <option selected>ALL</option>
                                        <option value="1">Service Quality</option>
                                        <option value="2">Billing Quality</option>
                                        <option value="3">Customer Behavior</option>
                                        <option value="3">Loyalty Program</option>
                                        <option value="3">Blacklist</option>
                                        <option value="3">Competitor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="col-lg-12 col-12">
                                        <!-- small box -->
                                          
                                        <div class="small-box bg-white">
                                            <div class="inner">
                                                <h5>TOTAL SALES</h5>

                                                <h5>{{ number_format($TOTAL_SALES) }} (100%)</h5>

                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-12 col-12">
                                        <!-- small box -->
                                        <div class="small-box bg-white">
                                            <div class="inner">
                                                <h5>TOTAL AKTIF</5>

                                                <h4> (90%)</h4>

                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-12 col-12">
                                        <!-- small box -->
                                        <div class="small-box bg-white">
                                            <div class="inner">
                                                <h5>CHURN & CT0</h5>

                                                <h5> (10%)</h>

                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group col-12">
                                        <table class="table table-hover table-bordered col-12" style="width:100%;">
                                            <thead class="thead text-white">
                                                <tr>
                                                    <td><label><b>Action to be taken</b></label></td>
                                                    <td>
                                                        <label><b>total</b></label>
                                                    </td>
                                                </tr>
                                            </thead>

                                            {{-- corrective --}}
                                            <tbody>
                                                <tr class="header" data-toggle="collapse" data-target=".multi-collapse1"
                                                    aria-controls="multiCollapseExample1">
                                                    <th><span>+</span>&nbsp; Corrective</th>
                                                    <td>XXL SSL</td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr class="collapse multi-collapse1" id="multiCollapseExample1">
                                                    <td>CT0</td>
                                                    <td>data</td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr class="collapse multi-collapse1" id="multiCollapseExample1">
                                                    <td>CT0-NDE</td>
                                                    <td>data</td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr class="collapse multi-collapse1" id="multiCollapseExample1">
                                                    <td>CT0-Tunggakan</td>
                                                    <td>data</td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr class="collapse multi-collapse1" id="multiCollapseExample1">
                                                    <td>CT0-DUNNING</td>
                                                    <td>data</td>
                                                </tr>
                                            </tbody>
                                            {{-- end corrective
                                            --}}

                                            <tfoot class="thead text-white">
                                                <tr>
                                                    <td>
                                                        Total
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group col-12">
                                        <table class="table table-hover table-bordered col-12" style="width:100%;">
                                            <thead class="thead text-white">
                                                <tr>
                                                    <td><label><b>Action to be taken</b></label></td>
                                                    <td>
                                                        <label><b>total</b></label>
                                                    </td>
                                                </tr>
                                            </thead>


                                            {{-- preventive --}}
                                            <tbody>
                                                <tr class="header" data-toggle="collapse" data-target=".multi-collapse2"
                                                    aria-controls="multiCollapseExample2">
                                                    <th><span>+</span> Preventive</th>
                                                    <td>XXL SSL</td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr class="collapse multi-collapse2" id="multiCollapseExample2">
                                                    <td>Kwadran 1</td>
                                                    <td>data</td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr class="collapse multi-collapse2" id="multiCollapseExample2">
                                                    <td>Kwadran 2</td>
                                                    <td>data</td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="thead text-white">
                                                <tr>
                                                    <td>
                                                        Total
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    
@endsection

@section('after-footer')
    <script>
        $('.header').click(function(){
   $(this).find('span').text(function(_, value){return value=='-'?'+':'-'});
    $(this).nextUntil('tr.header').slideToggle(100, function(){
    });
});

    </script>
@endsection
