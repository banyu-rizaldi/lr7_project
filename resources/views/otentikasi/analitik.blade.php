@extends('layouts.master')
@section('title','Project Pertama')
@section('judul','Analytics')

<style>
    .center {
        margin: auto;
        width: 80%;
        border: 3px;
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

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                {{-- <div class="card-header">
                <h4>Simple</h4>
            </div> --}}
                <div class="card-body">
                    <div class="row">
                        <label for="" class="atas">REG</label>
                        <div class="atas">
                            <select class="form-select">
                                <option selected>SELECT</option>
                                @foreach ($data_dossier as $data)
                                    <option value="{{ $data->KAWASAN }}">{{ $data->KAWASAN }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="" class="atas">WITEL</label>
                        <div class="atas">
                            <Select class="form-select" id="data_dossier" name="data_dossier">
                                <option value="">SELECT</option>
                                @foreach ($data_dossier as $data)
                                    <option value="{{ $data->WITEL }}">{{ $data->WITEL }}</option>
                                @endforeach
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
                        <label for="" class="atas">ALPRO</label>
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
                        <label for="" class="atas">SEGMEN</label>
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

    <br>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="mr-3">Active Parameter : </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">All</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Service Quality</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Billing Quality</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Customer Behavior</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Loyality Program</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Blacklist Management</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Blacklist Management</label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-1 mr-1">
                            <label for=""> RESULT: </label>
                        </div>
                        <div class="col-1 mr-1">
                            <label for=""> 2.095.340 </label>
                        </div>
                        <div class="col-1 mr-5">
                            <label for=""> CUSTOMERS </label>
                        </div>
                        <div class="col-1 mr-1">
                            <label for=""> 1.999.010 </label>
                        </div>
                        <div class="col-1 mr-5">
                            <label for=""> PHONE </label>
                        </div>
                        <div class="col-1 mr-1">
                            <label for=""> 999.101 </label>
                        </div>
                        <div class="col-1 mr-5">
                            <label for=""> EMAIL </label>
                        </div>
                        <div class="col-2 mr-5">
                            <a href="#">Show Matrix >></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="form-group col-12">
                            <table class="table table-hover col-12" style="width:100%" border="1">
                                <thead class="thead text-white">
                                    <tr>
                                        <td rowspan="2"><label class="center"><b>#</b></label></td>
                                        <td rowspan="2">
                                            <label class="center"><b>Category</b></label>
                                        </td>
                                        <td colspan="3">
                                            <center><b>Length of Stay Pelanggan</b></center>
                                        </td>
                                        <td rowspan="2">
                                            <label class="center"><b>%</b></label>
                                        </td>
                                        <td rowspan="3">
                                            <label class="center"><b>Growth H-1</b></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <center>
                                                <b>
                                                    0-6 bulan
                                                </b>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <b>
                                                    7-12 bulan
                                                </b>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <b>
                                                    13-18 bulan
                                                </b>
                                            </center>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="parent" id="row1" title="Click to expand/collapse"
                                        style="cursor: pointer;">
                                        <td>
                                            <center><i class="fas fa-fw fa-minus"></i></center>
                                        </td>
                                        <td>
                                            GOOD
                                        </td>
                                        <td>10</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                    </tr>
                                    <tr class="child-row1" style="display: table-row;">
                                        <td></td>
                                        <td>Billing Quality</td>
                                        <td><a href="{{ route("alert") }}">10</a></td>
                                        <td>15</td>
                                        <td>15</td>
                                        <td>15</td>
                                        <td>15</td>
                                    </tr>
                                    <tr class="child-row1" style="display: table-row;">
                                        <td></td>
                                        <td>Customer Behavior</td>
                                        <td>Another New Project description</td>
                                        <td>45</td>
                                        <td>45</td>
                                        <td>45</td>
                                        <td>45</td>
                                    </tr>
                                    <tr class="child-row1" style="display: table-row;">
                                        <td></td>
                                        <td>Loyalty Program</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>
                                    <tr class="child-row1" style="display: table-row;">
                                        <td></td>
                                        <td>Blacklist</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>
                                    <tr class="child-row1" style="display: table-row;">
                                        <td></td>
                                        <td>Competitor</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>

                                    <tr class="parent" id="row2" title="Click to expand/collapse"
                                        style="cursor: pointer;">
                                        <td>
                                            <center><i class="fas fa-fw fa-minus"></i></center>
                                        </td>
                                        <td>
                                            ALERT
                                        </td>
                                        <td>Bill Gates</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                    </tr>
                                    <tr class="child-row2" style="display: table-row;">
                                        <td></td>
                                        <td>Billing Quality</td>
                                        <td><a href="{{ route("alert") }}">10</a></td>
                                        <td>15</td>
                                        <td>15</td>
                                        <td>15</td>
                                        <td>15</td>
                                    </tr>
                                    <tr class="child-row2" style="display: table-row;">
                                        <td></td>
                                        <td>Customer Behavior</td>
                                        <td>Another New Project description</td>
                                        <td>45</td>
                                        <td>45</td>
                                        <td>45</td>
                                        <td>45</td>
                                    </tr>
                                    <tr class="child-row2" style="display: table-row;">
                                        <td></td>
                                        <td>Loyalty Program</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>
                                    <tr class="child-row2" style="display: table-row;">
                                        <td></td>
                                        <td>Blacklist</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>
                                    <tr class="child-row2" style="display: table-row;">
                                        <td></td>
                                        <td>Competitor</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>

                                    <tr class="parent" id="row3" title="Click to expand/collapse"
                                        style="cursor: pointer;">
                                        <td>
                                            <center><i class="fas fa-fw fa-minus"></i></center>
                                        </td>
                                        <td>
                                            HIGH ALERT
                                        </td>
                                        <td>Bill Gates</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                    </tr>
                                    <tr class="child-row3" style="display: table-row;">
                                        <td></td>
                                        <td>Billing Quality</td>
                                        <td><a href="{{ route("alert") }}">10</a></td>
                                        <td>15</td>
                                        <td>15</td>
                                        <td>15</td>
                                        <td>15</td>
                                    </tr>
                                    <tr class="child-row3" style="display: table-row;">
                                        <td></td>
                                        <td>Customer Behavior</td>
                                        <td>Another New Project description</td>
                                        <td>45</td>
                                        <td>45</td>
                                        <td>45</td>
                                        <td>45</td>
                                    </tr>
                                    <tr class="child-row3" style="display: table-row;">
                                        <td></td>
                                        <td>Loyalty Program</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>
                                    <tr class="child-row3" style="display: table-row;">
                                        <td></td>
                                        <td>Blacklist</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>
                                    <tr class="child-row3" style="display: table-row;">
                                        <td></td>
                                        <td>Competitor</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>

                                    <tr class="parent" id="row4" title="Click to expand/collapse"
                                        style="cursor: pointer;">
                                        <td>
                                            <center><i class="fas fa-fw fa-minus"></i></center>
                                        </td>
                                        <td>
                                            ALERT FOR RECYCLE
                                        </td>
                                        <td>Bill Gates</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                    </tr>
                                    <tr class="child-row4" style="display: table-row;">
                                        <td></td>
                                        <td>Billing Quality</td>
                                        <td><a href="{{ route("alert") }}">10</a></td>
                                        <td>15</td>
                                        <td>15</td>
                                        <td>15</td>
                                        <td>15</td>
                                    </tr>
                                    <tr class="child-row4" style="display: table-row;">
                                        <td></td>
                                        <td>Customer Behavior</td>
                                        <td>Another New Project description</td>
                                        <td>45</td>
                                        <td>45</td>
                                        <td>45</td>
                                        <td>45</td>
                                    </tr>
                                    <tr class="child-row4" style="display: table-row;">
                                        <td></td>
                                        <td>Loyalty Program</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>
                                    <tr class="child-row4" style="display: table-row;">
                                        <td></td>
                                        <td>Blacklist</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>
                                    <tr class="child-row4" style="display: table-row;">
                                        <td></td>
                                        <td>Competitor</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>

                                    <tr class="parent" id="row5" title="Click to expand/collapse"
                                        style="cursor: pointer;">
                                        <td>
                                            <center><i class="fas fa-fw fa-minus"></i></center>
                                        </td>
                                        <td>
                                            CHURN
                                        </td>
                                        <td>Bill Gates</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                    </tr>
                                    <tr class="child-row5" style="display: table-row;">
                                        <td></td>
                                        <td>Billing Quality</td>
                                        <td><a href="{{ route("alert") }}">10</a></td>
                                        <td>15</td>
                                        <td>15</td>
                                        <td>15</td>
                                        <td>15</td>
                                    </tr>
                                    <tr class="child-row5" style="display: table-row;">
                                        <td></td>
                                        <td>Customer Behavior</td>
                                        <td>Another New Project description</td>
                                        <td>45</td>
                                        <td>45</td>
                                        <td>45</td>
                                        <td>45</td>
                                    </tr>
                                    <tr class="child-row5" style="display: table-row;">
                                        <td></td>
                                        <td>Loyalty Program</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>
                                    <tr class="child-row5" style="display: table-row;">
                                        <td></td>
                                        <td>Blacklist</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>
                                    <tr class="child-row5" style="display: table-row;">
                                        <td></td>
                                        <td>Competitor</td>
                                        <td>More New Stuff</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>

                                </tbody>

                                <tfoot class="thead text-white">
                                    <tr>
                                        <td>
                                            Total
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td rowspan="2"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('before-footer')
<script type="text/javascript">
    function handleSelect(elm) 
    { 
        window.location = elm.value; 
    } 
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {  
            $('tr.parent')  
                .css("cursor", "pointer")  
                .attr("title", "Click to collapse/expand")  
                .click(function () {  
                    $(this).siblings('.child-' + this.id).toggle();  
                });  
            $('tr[@class^=child-]').hide().children('td');  
    });  
</script>

@endsection