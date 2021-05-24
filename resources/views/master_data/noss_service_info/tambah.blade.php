@extends('layouts.master')
@section('title','Project Pertama')

@section('judul1')
<a href="{{ route('dashboard') }}">Dashboard</a>
<li class="breadcrumb-item active">Master Data</li>
<li class="breadcrumb-item active"><a href="{{ route('noss_service_info') }}">Noss Service Info</a></li>
<li class="breadcrumb-item active">Tambah Data Service Info</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data Noss Service Info</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('noss_service_info.simpan') }}" method="POST">
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
                                        <label @error('TECHNOLOGY') class="text-danger" @enderror> TECHNOLOGY
                                            @error('TECHNOLOGY')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="TECHNOLOGY" value="{{ old('TECHNOLOGY') }}"
                                            class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('STP_TARGET') class="text-danger" @enderror> STP_TARGET
                                            @error('STP_TARGET')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="STP_TARGET" value="{{ old('STP_TARGET') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('STP_PORT') class="text-danger" @enderror> STP_PORT
                                            @error('STP_PORT')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="STP_PORT" value="{{ old('STP_PORT') }}" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('SP_TARGET') class="text-danger" @enderror> SP_TARGET
                                            @error('SP_TARGET')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="SP_TARGET" value="{{ old('SP_TARGET') }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('SP_PORT') class="text-danger" @enderror> SP_PORT
                                            @error('SP_PORT')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="SP_PORT" value="{{ old('SP_PORT') }}" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label @error('SERVICE_STATUS') class="text-danger" @enderror> SERVICE_STATUS
                                            @error('SERVICE_STATUS')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="SERVICE_STATUS" value="{{ old('SERVICE_STATUS') }}"
                                            class="form-control">
                                    </div>
                                </div>

                            </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <button class="btn btn-dark" type="reset">Reset</button>
                        <a href="{{ route('noss_service_info') }}" class="btn btn-warning">Back</a>
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