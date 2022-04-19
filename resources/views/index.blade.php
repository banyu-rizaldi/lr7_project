@extends('layouts.master')
@section('judul')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.3/css/fixedColumns.bootstrap4.min.css">
@endsection

<?php
$tgl = date('l, d M Y');
echo $tgl;
?>
<br>
<?php
date_default_timezone_set('Asia/Jakarta');
$jam = date('H:i');
echo 'Local time : ' . $jam;
?>

@endsection

@section('judul1')
<a href="#">Dashboard</a>
@endsection

@section('content')


<section class="content">
    <div class="container-fluid">

        <div class="alert alert-success alert-block">
                <button class="close" type="button" data-dismiss="alert">x</button>
                <strong>Please select from the options : WITEL & BULAN</strong>
            </div>

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dashboard') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="BULAN">BULAN</label>
                                        <select name="BULAN" id="BULAN" class="form-control col-lg-12 mr-3 mt-1">
                                            <option value=""></option>
                                            @foreach ($datakw as $data2)
                                                @if (isset($_POST['BULAN']) && $_POST['BULAN'] == $data2->BULAN)
                                                    <option selected id="BULAN" value="{{ $data2->BULAN }}">
                                                        {{ $data2->BULAN }}
                                                    </option>
                                                @else
                                                    <option id="BULAN" value="{{ $data2->BULAN }}">
                                                        {{ $data2->BULAN }}
                                                    </option>
                                                @endif

                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary col-lg-12 mt-1">Go</button>

                        </form>
                    </div>

                </div>
            </div>

        </div>
        <!-- /.row -->


        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        @foreach ($allData1 as $item)
                            <h3><b>{{ number_format($item->sales) }}</b></h3>
                        @endforeach
                        <p class="mb-0"><b>TOTAL SALES</b></p>
                        <h6 class="mt-0"><small><i>(Mtd H-1)</i></small></h6>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        @foreach ($allData1 as $item)
                            <h3><b>{{ number_format($item->A * 100, 1) . '%' }}</b></h3>
                        @endforeach
                        <p class="mb-0"><b>LOSS TO SALES</b></p>
                        <h6 class="mt-0"><small><i>(Mtd H-1)</i></small></h6>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-percent"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        @foreach ($allData1 as $item)
                            <h3><b>{{ number_format($item->B * 100, 1) . '%' }}</b></h3>
                        @endforeach

                        <p class="mb-0"><b>LOSS TO LIS</b></p>
                        <h6 class="mt-0"><small><i>(Mtd H-1)</i></small></h6>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-percent"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        @foreach ($allData1 as $item)
                            <h3><b>{{ number_format($item->lis) }}</b></h3>
                        @endforeach
                        <p class="mb-0"><b>TOTAL LIS</b></p>
                        <h6 class="mt-0"><small><i>(LM)</i></small></h6>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-user-secret"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        @foreach ($allData1 as $item)
                            <h3><b>{{ number_format($item->alert) }}</b></h3>
                        @endforeach
                        <p class="mb-0"><b>VH ALERT</b></p>
                        <h6 class="mt-0"><small><i>(Mtd H-1)</i></small></h6>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-exclamation"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        @foreach ($allData1 as $item)
                            <h3><b>{{ number_format($item->loss) }}</b></h3>
                        @endforeach
                        <p class="mb-0"><b>TOTAL LOSS</b></p>
                        <h6 class="mt-0"><small><i>(Mtd H-1)</i></small></h6>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-times"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">

                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div id="chart">

                            </div>
                        </div>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.Left col -->

            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">

                <!-- Map card -->
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content p-0" id="cek" name="cek">
                            <div id="pie" name="pie">

                            </div>
                        </div>
                    </div>
                    <!-- /.card-body-->
                </div>
                <!-- /.card -->

            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
	
	
	
	<!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">

                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div id="lis">

                            </div>
                        </div>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.Left col -->

            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">

                <!-- Map card -->
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content p-0" id="cek" name="cek">
                            <div id="lis2">

                            </div>
                        </div>
                    </div>
                    <!-- /.card-body-->
                </div>
                <!-- /.card -->

            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->


        <div class="card">
            <div class="card-body">
                <div class="tab-content p-0">
                    <div id="churn">

                    </div>
                </div>
            </div>
        </div>

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">

                    <div class="card-body">
                        <div class="tab-content p-0">
                            <table id="datatable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>WITEL</th>
                                        @if (request()->filled('WITEL'))
                                            <th>STO</th>
                                        @endif
                                        <th>TOTAL LIS</th>
                                        <!-- <th>TOTAL ALERT</th> -->
                                        <th>VH ALERT</th>
                                        <th>TOTAL LOSS</th>
                                        <th>TOTAL SALES</th>
                                        <th>LOSS TO SALES</th>
                                        <th>LOSS TO LIS</th>
                                        <th>CT0</th>
                                        <th>CAPS</th>
					<th>KW1</th>
                                        <th>KW2</th>
                                        <th>KW3</th>
                                        <th>KW4</th>
                                        <th>%KW1</th>
                                        <th>%KW2</th>
                                        <th>%KW3</th>
                                        <th>%KW4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $data)
                                        <tr>
                                            <td>{{ $data->WITEL }}</td>
                                            @if (request()->filled('WITEL'))
                                                <td>{{ $data->STO }}</td>
                                            @endif
                                            <td class="text-right">{{ number_format($data->lis) }}</td>
                                            <td class="text-right">{{ number_format($data->alert) }}</td>
                                            <td class="text-right">{{ number_format($data->loss) }}</td>
                                            <td class="text-right">{{ number_format($data->sales) }}</td>
                                            <td class="text-right">{{ number_format($data->A * 100, 1) . '%' }}</td>
                                            <td class="text-right">{{ number_format($data->B * 100, 1) . '%' }}</td>
                                         	<td class="text-right">{{ number_format($data->ct0) }}</td>
                                            <td class="text-right">{{ number_format($data->caps) }}</td>
						<td class="text-right">{{ number_format($data->kw1) }}</td>
                                            <td class="text-right">{{ number_format($data->kw2) }}</td>
                                            <td class="text-right">{{ number_format($data->kw3) }}</td>
                                            <td class="text-right">{{ number_format($data->kw4) }}</td>
                                            <td class="text-right">{{ number_format($data->v * 100, 1) . '%' }}</td>
                                            <td class="text-right">{{ number_format($data->w * 100, 1) . '%' }}</td>
                                            <td class="text-right">{{ number_format($data->x * 100, 1) . '%' }}</td>
                                            <td class="text-right">{{ number_format($data->y * 100, 1) . '%' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    @foreach ($allData1 as $no => $data)
                                        <tr>
                                            @if (request()->filled('WITEL'))
                                                <td>Grand Total </td>
                                                <td>Grand Total </td>
                                            @else
                                                <td>Grand Total </td>
                                            @endif
                                            <td class="text-right">{{ number_format($data->lis) }}</td>
                                            <td class="text-right">{{ number_format($data->alert) }}</td>
                                            <td class="text-right">{{ number_format($data->loss) }}</td>
                                            <td class="text-right">{{ number_format($data->sales) }}</td>
                                            <td class="text-right">{{ number_format($data->A * 100, 1) . '%' }}</td>
                                            <td class="text-right">{{ number_format($data->B * 100, 1) . '%' }}</td>
						                    <td class="text-right">{{ number_format($data->ct0) }}</td>
                                            <td class="text-right">{{ number_format($data->caps) }}</td>
                                            <td class="text-right">{{ number_format($data->kw1) }}</td>
                                            <td class="text-right">{{ number_format($data->kw2) }}</td>
                                            <td class="text-right">{{ number_format($data->kw3) }}</td>
                                            <td class="text-right">{{ number_format($data->kw4) }}</td>
                                            <td class="text-right">{{ number_format($data->v * 100, 1) . '%' }}</td>
                                            <td class="text-right">{{ number_format($data->w * 100, 1) . '%' }}</td>
                                            <td class="text-right">{{ number_format($data->x * 100, 1) . '%' }}</td>
                                            <td class="text-right">{{ number_format($data->y * 100, 1) . '%' }}</td>
                                        </tr>
                                    @endforeach
                                </tfoot>
                            </table>
                        </div>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.Left col -->


        </div>
        <!-- /.row (main row) -->

        <div class="card">
            <div class="card-body">
                <div class="tab-content p-0">
                    <div id="churn1">

                    </div>
                </div>
            </div>
        </div>

	
	<div class="card">
            <div class="card-body">
                <div class="tab-content p-0">
                    <div id="kw2">

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">

                    <div class="card-body">
                        <div class="tab-content p-0">
                            <table id="KW" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>WITEL</th>
                                        @if (request()->filled('WITEL'))
                                            <th>STO</th>
                                        @endif
                                        <th>KW4_JAN'21</th>
                                        <th>KW4_FEB</th>
                                        <th>KW4_MAR</th>
                                        <th>KW4_APR</th>
                                        <th>KW4_MEI</th>
                                        <th>KW4_JUN</th>
                                        <th>KW4_JUL</th>
                                        <th>KW4_AUG</th>
                                        <th>KW4_SEP</th>
                                        <th>KW4_OKT</th>
                                        <th>KW4_NOV</th>
                                        <th>KW4_DES</th>
					<th>KW4_JAN'22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grafiks as $dat6)
                                        <tr>
                                            <td>{{ $dat6->WITEL }}</td>
                                            @if (request()->filled('WITEL'))
                                                <td>{{ $dat6->STO }}</td>
                                            @endif
                                            <td>{{ number_format($dat6->TOTAL_LIS_202101 * 100, 1) . '%' }}</td>
                                            <td>{{ number_format($dat6->TOTAL_LIS_202102 * 100, 1) . '%' }}</td>
                                            <td>{{ number_format($dat6->TOTAL_LIS_202103 * 100, 1) . '%' }}</td>
                                            <td>{{ number_format($dat6->TOTAL_LIS_202104 * 100, 1) . '%' }}</td>
                                            <td>{{ number_format($dat6->TOTAL_LIS_202105 * 100, 1) . '%' }}</td>
                                            <td>{{ number_format($dat6->TOTAL_LIS_202106 * 100, 1) . '%' }}</td>
                                            <td>{{ number_format($dat6->TOTAL_LIS_202107 * 100, 1) . '%' }}</td>
                                            <td>{{ number_format($dat6->TOTAL_LIS_202108 * 100, 1) . '%' }}</td>
                                            <td>{{ number_format($dat6->TOTAL_LIS_202109 * 100, 1) . '%' }}</td>
                                            <td>{{ number_format($dat6->TOTAL_LIS_202110 * 100, 1) . '%' }}</td>
                                            <td>{{ number_format($dat6->TOTAL_LIS_202111 * 100, 1) . '%' }}</td>
                                            <td>{{ number_format($dat6->TOTAL_LIS_202112 * 100, 1) . '%' }}</td>
					                        <td>{{ number_format($dat6->TOTAL_LIS_202201 * 100, 1) . '%' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.Left col -->


        </div> 


        


    </div><!-- /.container-fluid -->
</section>
@endsection



@section('after-footer')

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>
    <script>
        $(function() {
            $('#datatable').DataTable({
                pageLength:10,
		scrollY: "500px",
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                dom: 'Bfrtip',
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'copy', 'excel', 'pageLength'
            ],
		fixedColumns: {
                    leftColumns: 2
                }
            });
		
	    $('#KW').DataTable({
            pageLength: 10,
            scrollY: "500px",
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'copy', 'excel', 'pageLength'
            ],
            fixedColumns: {
                leftColumns: 2
            }
        });
        })
    </script>

@endsection

@section('before-footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
{{-- <script src="https://code.highcharts.com/modules/exporting.js"></script> --}}
{{-- <script src="https://code.highcharts.com/modules/export-data.js"></script> --}}
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

{{-- highchart --}}
<script>
    Highcharts.chart('chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Summary LIS, Sales & Churn'
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories: [
                <?php $i = 0; ?>
                <?php foreach ($bulan as $no => $datav) {
                    $i = $i + 1; ?>
                {{ $datav->BULAN }},
                <?php
                } ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
                name: 'TOTAL LIS',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($allData1 as $no => $data) {
                        $i = $i + 1; ?>
                    {{ $data->lis }},
                    <?php
                    } ?>
                ]
            }, {

                name: 'VH ALERT',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($allData1 as $no => $data) {
                        $i = $i + 1; ?>
                    {{ $data->alert }},
                    <?php
                    } ?>
                ]
            }, {

                name: 'TOTAL LOSS',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($allData1 as $no => $data) {
                        $i = $i + 1; ?>
                    {{ $data->loss }},
                    <?php
                    } ?>
                ]
            }, {

                name: 'TOTAL SALES',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($allData1 as $no => $data) {
                        $i = $i + 1; ?>
                    {{ $data->sales }},
                    <?php
                    } ?>
                ]
            }, {
                name: 'KW1',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($allData1 as $no => $data) {
                        $i = $i + 1; ?>
                    {{ $data->kw1 }},
                    <?php
                    } ?>
                ]
            }, {
                name: 'KW2',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($allData1 as $no => $data) {
                        $i = $i + 1; ?>
                    {{ $data->kw2 }},
                    <?php
                    } ?>
                ]
            }, {
                name: 'KW3',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($allData1 as $no => $data) {
                        $i = $i + 1; ?>
                    {{ $data->kw3 }},
                    <?php
                    } ?>
                ]
            }, {
                name: 'KW4',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($allData1 as $no => $data) {
                        $i = $i + 1; ?>
                    {{ $data->kw4 }},
                    <?php
                    } ?>
                ]
            }

        ]
    });
	
	
	
	
    Highcharts.chart('lis', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Sales & LOSS'
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories: [
                2021
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{

                name: 'TOTAL SALES',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($allData2 as  $data) {
                        $i = $i + 1; ?>
                    {{ $data->sales }},
                    <?php
                    } ?>
                ]
            }, {
                name: 'TOTAL LOSS',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($allData2 as $data) {
                        $i = $i + 1; ?>
                    {{ $data->loss }},
                    <?php
                    } ?>
                ]
            }, {
                name: 'NAL',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($allData2 as $data) {
                        $i = $i + 1; ?>
                    {{ $data->sales - $data->loss }},
                    <?php
                    } ?>
                ]
            }

        ]
    });

    Highcharts.chart('lis2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Sales, LOSS, ALERT'
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories: [
                <?php $i = 0; ?>
                <?php foreach ($bulan as $no => $datav) {
                    $i = $i + 1; ?>
                {{ $datav->BULAN }},
                <?php
                } ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
                name: 'TOTAL SALES',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($allData1 as $no => $data) {
                        $i = $i + 1; ?>
                    {{ $data->sales }},
                    <?php
                    } ?>
                ]
            }, {

                name: 'TOTAL LOSS',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($allData1 as $no => $data) {
                        $i = $i + 1; ?>
                    {{ $data->loss }},
                    <?php
                    } ?>
                ]
            }, {
                name: 'VH ALERT',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($allData1 as $no => $data) {
                        $i = $i + 1; ?>
                    {{ $data->alert }},
                    <?php
                    } ?>
                ]
            }


        ]
    });


    Highcharts.chart('pie', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: true,
            type: 'pie'
        },
        title: {
            text: 'Proporsi LIS'
        },
        tooltip: {
            pointFormat: '<b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                },
                showInLegend: false
            }
        },
        credits: {
            enabled: false
        },
        series: [{
                // name: 'Brands',
                colorByPoint: true,
                data: [
                    <?php if (!request()->filled('WITEL')) { ?>
                    <?php $i = 0; ?>
                    <?php foreach ($allData as $no => $data) {
                        $i = $i + 1; ?>

                    {
                        name: '<?php echo $data->WITEL; ?>',
                        y: <?php echo $data->lis; ?>
                    },
                    <?php
                    } ?>
                    <?php } else { ?>
                    <?php $i = 0; ?>
                    <?php foreach ($allData as $no => $data) {
                        $i = $i + 1; ?>

                    {
                        name: '<?php echo $data->STO; ?>',
                        y: <?php echo $data->lis; ?>
                    },
                    <?php
                    } ?>
                    <?php } ?>
                ]


            }

        ]
    });

    Highcharts.chart('churn', {
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'TREN LOSS TO SALES'
        },
        credits: {
            enabled: false
        },
        xAxis: [{
            categories: [
                <?php $i = 0; ?>
                <?php foreach ($datakw as $no => $datab) {
                    $i = $i + 1; ?>
                {{ $datab->BULAN }},
                <?php
                } ?>
            ],
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}%'
            },
            title: {
                text: 'PERCENTAGE'
            },
            opposite: true

        }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
                text: 'TOTAL'
            },
            labels: {
                format: '{value}k'
            }

        }],
        tooltip: {
            shared: true
        },

        series: [{
                name: 'SALES',
                type: 'column',
                yAxis: 1,
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($grafik as $no => $datac) {
                        $i = $i + 1; ?>
                    {{ $datac->sales }},
                    <?php
                    } ?>
                ]

            }, {
                name: 'LOSS',
                type: 'column',
                yAxis: 1,
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($grafik as $no => $datac) {
                        $i = $i + 1; ?>
                    {{ $datac->loss }},
                    <?php
                    } ?>
                ]
            },{
		name: 'TARGET SALES',
                type: 'column',
                yAxis: 1,
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($grafik as $no => $datac) {
                        $i = $i + 1; ?>
                        {{ $datac->tsales }},
                    <?php
                    } ?>
                ]
	    },
            {
                name: 'LOSS TO SALES',
                type: 'spline',
                data: [
                    <?php $i = 0; ?>
                    <?php foreach ($grafik as $no => $datad) {
                        $i = $i + 1; ?>
                    {{ number_format($datad->A * 100, 1) }},
                    <?php
                    } ?>
                ],
                tooltip: {
                    valueSuffix: '%'
                }
            }
        ]
    });

    Highcharts.chart('churn1', {

        title: {
            text: 'TREN KWADRAN INDIHOME'
        },

        credits: {
            enabled: false
        },

        xAxis: [{
            categories: [
                <?php $i = 0; ?>
                <?php foreach ($datakw as $no => $datab) {
                    $i = $i + 1; ?>
                {{ $datab->BULAN }},
                <?php
                } ?>
            ]
        }],

        yAxis: {
            labels: {
                format: '{value}%'
            },
            title: {
                text: 'PERCENTAGE'
            }
        },
	plotOptions: {
            line: {
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return Highcharts.numberFormat(this.y) + '%';
                    }
                }
            }
        },

        series: [{
            name: 'KW1 TO LIS',
            data: [
                <?php $i = 0; ?>
                <?php foreach ($grafik as $no => $datam) {
                    $i = $i + 1; ?>
                    {{ number_format($datam->v * 100, 1) }},
                <?php
                } ?>
            ],
	    tooltip: {
                valueSuffix: '%'
            }
        }, {
            name: 'KW2 TO LIS',
            data: [
                <?php $i = 0; ?>
                <?php foreach ($grafik as $no => $datam) {
                    $i = $i + 1; ?>
                    {{ number_format($datam->w * 100, 1) }},
                <?php
                } ?>
            ],
           tooltip: {
                valueSuffix: '%'
            }
        }, {
            name: 'KW3 TO LIS',
            data: [
                <?php $i = 0; ?>
                <?php foreach ($grafik as $no => $datam) {
                    $i = $i + 1; ?>
                    {{ number_format($datam->x * 100, 1) }},
                <?php
                } ?>
            ],
            tooltip: {
                valueSuffix: '%'
            }
        }, {
            name: 'KW4 TO LIS',
            data: [
                <?php $i = 0; ?>
                <?php foreach ($grafik as $no => $datam) {
                    $i = $i + 1; ?>
                    {{ number_format($datam->y * 100, 1) }},
                <?php
                } ?>
            ],
	   tooltip: {
                valueSuffix: '%'
            }
        }
        ],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });


	Highcharts.chart('kw2', {
        title: {
            text: 'BREAKDOWN TREN %KW4'
        },
        credits: {
            enabled: false
        },

        xAxis: [{
            categories: [
                 <?php $i = 0; ?>
                <?php foreach ($datakw as $no => $datab1) {
                    $i = $i + 1; ?>
                {{ $datab1->BULAN }},
                <?php
                } ?>
            ]
        }],

        yAxis: {
            labels: {
                format: '{value}%'
            },
            title: {
                text: 'PERCENTAGE'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return Highcharts.numberFormat(this.y) + '%';
                    }
                }
            }
        },
        series: [
        <?php $i = 0; ?>
        <?php foreach ($grafiks as $dat9) {
        $i = $i + 1; ?>
        {   
            <?php if (!request()->filled('WITEL')) { ?>
            name: '{{ $dat9->WITEL }}',
            <?php } else { ?>
            name: '{{ $dat9->STO }}',
            <?php } ?>
            data: [
                {{ number_format($dat9->TOTAL_LIS_202101 * 100, 1) }},
                {{ number_format($dat9->TOTAL_LIS_202102 * 100, 1) }},
                {{ number_format($dat9->TOTAL_LIS_202103 * 100, 1) }},
                {{ number_format($dat9->TOTAL_LIS_202104 * 100, 1) }},
                {{ number_format($dat9->TOTAL_LIS_202105 * 100, 1) }},
                {{ number_format($dat9->TOTAL_LIS_202106 * 100, 1) }},
                {{ number_format($dat9->TOTAL_LIS_202107 * 100, 1) }},
                {{ number_format($dat9->TOTAL_LIS_202108 * 100, 1) }},
                {{ number_format($dat9->TOTAL_LIS_202109 * 100, 1) }},
                {{ number_format($dat9->TOTAL_LIS_202110 * 100, 1) }},
                {{ number_format($dat9->TOTAL_LIS_202111 * 100, 1) }},
                {{ number_format($dat9->TOTAL_LIS_202112 * 100, 1) }},
		        {{ number_format($dat9->TOTAL_LIS_202201 * 100, 1) }}       
            ],
            tooltip: {
                valueSuffix: '%'
            }
        },
        <?php } ?>
        ]

    });
</script>

@endsection

