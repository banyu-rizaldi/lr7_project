@extends('layouts.master')
@section('title','Project Pertama')

@section('judul1')
<a href="{{ route('dashboard') }}">Dashboard</a>
<li class="breadcrumb-item active">Master Data</li>
<li class="breadcrumb-item active"><a href="{{ route('dossier_datek') }}">Dossier Datek</a></li>
<li class="breadcrumb-item active">Tambah Data Dossier Kuadran</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data Dossier Datek</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('dossier_datek.simpan') }}" method="POST">
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
                                        <label @error('abrv_art') class="text-danger" @enderror> Product Citem
                                            @error('abrv_art')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="abrv_art" value="{{ old('abrv_art') }}"
                                            class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('Iart') class="text-danger" @enderror> Paket Indihome
                                            @error('Iart')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="Iart" value="{{ old('Iart') }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('Itarif') class="text-danger" @enderror> Paket Inet Only
                                            @error('Itarif')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="Itarif" value="{{ old('Itarif') }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <button class="btn btn-dark" type="reset">Reset</button>
                        <a href="{{ route('dossier_datek') }}" class="btn btn-warning">Back</a>
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