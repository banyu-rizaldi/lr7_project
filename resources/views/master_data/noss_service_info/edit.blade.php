@extends('layouts.master')
@section('title','Project Pertama')

@section('judul1')
<a href="{{ route('dashboard') }}">Dashboard</a>
<li class="breadcrumb-item active">Master Data</li>
<li class="breadcrumb-item active"><a href="{{ route('noss_service_info') }}">Noss Service Info</a></li>
<li class="breadcrumb-item active">Edit Data Service Info</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('noss_service_info.update',$data_noss->NOTEL) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('NOTEL') class="text-danger" @enderror> NOTEL
                                            @error('NOTEL')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="NOTEL" @if (old('NOTEL'))
                                            value="{{ old('NOTEL') }}" @else value="{{ $data_noss->NOTEL }}"
                                            @endif class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('TECHNOLOGY') class="text-danger" @enderror> TECHNOLOGY
                                            @error('TECHNOLOGY')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="TECHNOLOGY" @if (old('TECHNOLOGY'))
                                            value="{{ old('TECHNOLOGY') }}" @else value="{{ $data_noss->TECHNOLOGY }}"
                                            @endif class="form-control">
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
                                        <input type="text" name="STP_TARGET" @if (old('STP_TARGET'))
                                            value="{{ old('STP_TARGET') }}" @else value="{{ $data_noss->STP_TARGET }}"
                                            @endif class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('STP_PORT') class="text-danger" @enderror> STP_PORT
                                            @error('STP_PORT')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="STP_PORT" @if (old('STP_PORT'))
                                            value="{{ old('STP_PORT') }}" @else value="{{ $data_noss->STP_PORT }}"
                                            @endif class="form-control">
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
                                        <input type="text" name="SP_TARGET" @if (old('SP_TARGET'))
                                            value="{{ old('SP_TARGET') }}" @else value="{{ $data_noss->SP_TARGET }}"
                                            @endif class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label @error('SP_PORT') class="text-danger" @enderror> SP_PORT
                                            @error('SP_PORT')
                                            | {{ $message }}
                                            @enderror</label>
                                        <input type="text" name="SP_PORT" @if (old('SP_PORT'))
                                            value="{{ old('SP_PORT') }}" @else value="{{ $data_noss->SP_PORT }}"
                                            @endif class="form-control">
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
                                        <input type="text" name="SERVICE_STATUS" @if (old('SERVICE_STATUS'))
                                            value="{{ old('SERVICE_STATUS') }}" @else value="{{ $data_noss->SERVICE_STATUS }}"
                                            @endif class="form-control">
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
