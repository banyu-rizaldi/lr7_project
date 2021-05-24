@extends('layouts.master')
@section('title','Project Pertama')
@section('judul','Analytics')

<style>
    .center {
        margin: auto;
        width: 80%;
        border: 3px;
        padding: 30px;
    }

    .thead {
        background-color: #B20110;
    }
</style>

@section('content')

<div class="container-fluid">
    High Alert>Service Quality>0-6 Bulan>Detail <br><br>

    <a href="{{ route('analitik') }}" type="button" class="btn btn-primary">Back</a><br><br>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="form-group col-12">
                            <table class="table table-hover col-12" style="width:100%" border="1">
                                <thead class="thead text-white">
                                    <tr>
                                        <td rowspan="2">
                                            <label class="center">Category</label>
                                        </td>
                                        <td colspan="7">
                                            <center>Length of Stay Pelanggan</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                        <td>6</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>GGN > 5x</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('details') }}">UNSPEC > 5x</a></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>IP 10 > 5x</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            %
                                        </td>
                                        <td></td>
                                        <td></td>
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

@push('page-scripts')

@endpush

@push('after-scripts')

@endpush