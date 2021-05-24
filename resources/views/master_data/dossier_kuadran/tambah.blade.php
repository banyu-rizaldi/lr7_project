@extends('layouts.master')
@section('title','Project Pertama')

@section('judul1')
<a href="{{ route('dashboard') }}">Dashboard</a>
<li class="breadcrumb-item active">Master Data</li>
<li class="breadcrumb-item active"><a href="{{ route('dossier_kuadran') }}">Dossier Kuadran</a></li>
<li class="breadcrumb-item active">Tambah Data Dossier Kuadran</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data Dossier Kuadran</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('dossier_kuadran.simpan') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('NOTEL') class="text-danger" @enderror> NOTEL
                                            @error('NOTEL')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="NOTEL" value="{{ old('NOTEL') }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('KAWASAN') class="text-danger" @enderror> KAWASAN
                                            @error('KAWASAN')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="KAWASAN" value="{{ old('KAWASAN') }}"
                                            class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('ND_REF') class="text-danger" @enderror> ND_REF
                                            @error('ND_REF')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="ND_REF" value="{{ old('ND_REF') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('WITEL') class="text-danger" @enderror> WITEL
                                            @error('WITEL')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="WITEL" value="{{ old('WITEL') }}" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('DATEL') class="text-danger" @enderror> DATEL
                                            @error('DATEL')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="DATEL" value="{{ old('DATEL') }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('STO') class="text-danger" @enderror> STO
                                            @error('STO')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="STO" value="{{ old('STO') }}" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('GROUP_IH') class="text-danger" @enderror> GROUP_IH
                                            @error('GROUP_IH')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="GROUP_IH" value="{{ old('GROUP_IH') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('KWADRAN_INDIHOME') class="text-danger" @enderror>
                                            KWADRAN INDIHOME
                                            @error('KWADRAN_INDIHOME')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="KWADRAN_INDIHOME" value="{{ old('KWADRAN_INDIHOME') }}"
                                            class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('KWADRAN_INTERNET') class="text-danger" @enderror>
                                            KWADRAN_INTERNET
                                            @error('KWADRAN_INTERNET')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="KWADRAN_INTERNET" value="{{ old('KWADRAN_INTERNET') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('CITEM') class="text-danger" @enderror> CITEM
                                            @error('CITEM')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="CITEM" value="{{ old('CITEM') }}" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label @error('SPEED') class="text-danger" @enderror> SPEED
                                            @error('SPEED')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="SPEED" value="{{ old('SPEED') }}" class="form-control">
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <button class="btn btn-dark" type="reset">Reset</button>
                        <a href="{{ route('dossier_kuadran') }}" class="btn btn-warning">Back</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')

@endpush