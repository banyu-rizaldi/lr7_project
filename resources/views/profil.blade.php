@extends('layouts.master')

@section('content')
	 

    <section class="content">
        <div class="container-fluid">
		
		<div class="alert alert-block"
		style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;"
		>
                <button class="close" type="button" data-dismiss="alert">x</button>
                <strong>Please select from the options : WITEL,BULAN & FILTER</strong>
            </div>
		
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('profilLoss') }}" method="POST">
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
                                            <label for="BULAN">BULAN</label>
                                            <select name="BULAN" id="BULAN" class="form-control col-lg-12 mr-3 mt-1">
                                                <option value=""></option>
                                                @foreach ($bulan as $data2)
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

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="FILTER">FILTER</label>
                                            <select name="FILTER" id="FILTER" class="form-control col-lg-12 mr-3 mt-1">
                                                <option value=""></option>
                                                @foreach ($filter as $data1)
                                                    @if (isset($_POST['FILTER']) && $_POST['FILTER'] == $data1->PLEVEL1)
                                                        <option selected id="FILTER" value="{{ $data1->PLEVEL1 }}">
                                                            {{ $data1->PLEVEL1 }}
                                                        </option>
                                                    @else
                                                        <option id="FILTER" value="{{ $data1->PLEVEL1 }}">
                                                            {{ $data1->PLEVEL1 }}
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

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="product">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="product2">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="product3">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="product4">

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->

            

        </div><!-- /.container-fluid -->
    </section>
@endsection



@section('after-footer')

@endsection

@section('before-footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    {{-- <script src="https://code.highcharts.com/modules/exporting.js"></script> --}}
    {{-- <script src="https://code.highcharts.com/modules/export-data.js"></script> --}}
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/heatmap.js"></script>


    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>

    {{-- highchart --}}
    <script>
        Highcharts.chart('product', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: true,
                type: 'pie'
            },
            <?php $i = 0; ?>
            <?php foreach ($bulanA as $no => $datav) {
            $i = $i + 1; ?>
                title: {
                    text: 'Proporsi LOSS {{ $datav->BULAN }}'
                },
                <?php
            } ?>
            
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
                        <?php $i = 0; ?>
                        <?php foreach ($allData as $data) {
                            $i = $i + 1; ?>

                        {
                            <?php if (request()->filled('FILTER')) { ?>
                            name: '{{ $data->PLEVEL2 }}',
                            <?php } else { ?>
                            name: '{{ $data->PLEVEL1 }}',
                            <?php } ?>
                            y: <?php echo $data->JUMLAH; ?>
                        },
                        <?php } ?>
                        
                        
                    ]


                }

            ]
        });
        // 


        Highcharts.chart('product2', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Proporsi LOSS'
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: [
                    <?php $i = 0; ?>
                    <?php foreach ($bulan as $datab) {
                        $i = $i + 1; ?>
                        {{ $datab->BULAN }},
                    <?php
                    } ?>
                ]
            },
            yAxis: {
                labels: {
                    format: '{value}%'
                },
                title: {
                    text: 'PERCENTAGE'
                }
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> <br/>',
                shared: true
            },
            plotOptions: {
                column: {
                    stacking: 'percent'
                }
            },

            series: [
                
                    <?php $i = 0; ?>
                    <?php foreach ($grafik as $datac) {
                    $i = $i + 1; ?> {
                    <?php if (request()->filled('FILTER')) { ?>
                    
                    name: '{{ $datac->PLEVEL2 }}',
                    <?php } else { ?>
                    name: '{{ $datac->PLEVEL1 }}',
                    <?php } ?>
                    data: [
                            {{ number_format($datac->JAN21 *100,1) }},
                            {{ number_format($datac->FEB21 *100,1) }},
                            {{ number_format($datac->MAR *100,1) }},
                            {{ number_format($datac->APR *100,1) }},
                            {{ number_format($datac->MEI *100,1) }},
                            {{ number_format($datac->JUN *100,1) }},
                            {{ number_format($datac->JUL *100,1) }},
                            {{ number_format($datac->AUG *100,1) }},
                            {{ number_format($datac->SEP *100,1) }},
                            {{ number_format($datac->OCT *100,1) }},
                            {{ number_format($datac->NOV *100,1) }},
                            {{ number_format($datac->DES *100,1) }},
			                {{ number_format($datac->JAN22 *100,1) }},
                            {{ number_format($datac->FEB22 *100,1) }}
                        ],
                        tooltip: {
                            valueSuffix: '%'
                        }
                },
                <?php } ?>
                ]
        });
	
	
	 Highcharts.chart('product3', {
        chart: {
            type: 'line'
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories: [
                <?php $i = 0; ?>
                    <?php foreach ($bulan as $datab) {
                        $i = $i + 1; ?>
                        {{ $datab->BULAN }},
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
		line: {
            		dataLabels: {
                	enabled: true
		}
            }
        },
series: [
		 <?php $i = 0; ?>
                    <?php foreach ($grafik1 as $datac) {
                    $i = $i + 1; ?> {
                    <?php if (request()->filled('FILTER')) { ?>

                    name: '{{ $datac->PLEVEL2 }}',
                    <?php } else { ?>
                    name: '{{ $datac->PLEVEL1 }}',
                    <?php } ?>
                    data: [
                            {{ ($datac->JAN21) }},
			                {{ ($datac->FEB21) }},
                            {{ ($datac->MAR) }},
                            {{ ($datac->APR) }},
                            {{ ($datac->MEI) }},
                            {{ ($datac->JUN) }},
                            {{ ($datac->JUL) }},
                            {{ ($datac->AUG) }},
                            {{ ($datac->SEP) }},
                            {{ ($datac->OCT) }},
                            {{ ($datac->NOV) }},
                            {{ ($datac->DES) }},
			                {{ ($datac->JAN22) }},
                            {{ ($datac->FEB22) }}
                        ]
                },
                <?php } ?> 

        ]
    });


	Highcharts.chart('product4', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: [
                   <?php $i = 0; ?>
                    <?php foreach ($bulan as $datab) {
                        $i = $i + 1; ?>
                        {{ $datab->BULAN }},
                    <?php
                    } ?>
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'TOTAL'
                }
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> <br/>',
                shared: true

            },
            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [

                    <?php $i = 0; ?>
                    <?php foreach ($grafik1 as $datac) {
                    $i = $i + 1; ?> {
                    <?php if (request()->filled('FILTER')) { ?>
		     name: '{{ $datac->PLEVEL2 }}',
                    <?php } else { ?>
                    name: '{{ $datac->PLEVEL1 }}',
                    <?php } ?>
                    data: [
                            {{ ($datac->JAN21) }},
                            {{ ($datac->FEB21) }},
                            {{ ($datac->MAR) }},
                            {{ ($datac->APR) }},
                            {{ ($datac->MEI) }},
                            {{ ($datac->JUN) }},
                            {{ ($datac->JUL) }},
                            {{ ($datac->AUG) }},
                            {{ ($datac->SEP) }},
                            {{ ($datac->OCT) }},
                            {{ ($datac->NOV) }},
                            {{ ($datac->DES) }},
			                {{ ($datac->JAN22) }},
                            {{ ($datac->FEB22) }}
                        ]
                },
                <?php } ?>
                ]
        });





  </script>

@endsection
