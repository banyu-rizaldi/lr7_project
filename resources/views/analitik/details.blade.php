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
    High Alert>Service Quality>0-6 Bulan>Detail> UNSPEC <br><br>

    <a href="{{ route('alert') }}" type="button" class="btn btn-primary">Back</a><br><br>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="form-group col-12">
                            <table class="table table-responsive table-hover col-12" style="width:100%" border="1">
                                <thead class="thead text-white">
                                    <tr>
                                        <td rowspan="3">
                                            <label>No</label>
                                        </td>
                                        <td rowspan="2">
                                            <label>Witel</label>
                                        </td>
                                        <td rowspan="2">
                                            <label>ND</label>
                                        </td>
                                        <td rowspan="2">
                                            <label>Kategori Pelanggan</label>
                                        </td>
                                        <td rowspan="2">
                                            <label>Layanan / Paket</label>
                                        </td>
                                        <td rowspan="2">
                                            <label>TGL PS</label>
                                        </td>
                                        <td colspan="7">
                                            <center>Length of Stay Pelanggan</center>
                                        </td>
                                        <td rowspan="2">
                                            <label>Action</label>
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
                                        <td>1</td>
                                        <td>JAKUT</td>
                                        <td>213123</td>
                                        <td>ASDASD</td>
                                        <td>NBMBNM</td>
                                        <td>1/1/2021</td>
                                        <td>KLKLKL</td>
                                        <td>MNMNMNMN</td>
                                        <td>MNMNMNMN</td>
                                        <td>MNMNMNMN</td>
                                        <td>MNMNMNMN</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="#" class="badge badge-danger">Ukur</a>
                                            <a href="#" class="badge badge-danger">NOSSA</a>
                                            <a href="#" class="badge badge-danger">Retart ONT</a>
                                        </td>
                                    </tr>

                                </tbody>

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