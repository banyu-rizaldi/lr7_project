
@extends('layouts.master')
@section('judul', 'Alert Report Edit')

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
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                
                                <div class="col-lg-12">
                                    <form action="{{ route('alert.update',$alert->NOTEL) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> NOTEL </label>
                                                    <input type="text" name="NOTEL" value="{{ $alert->NOTEL }}" class="form-control" readonly>
                                                </div>
                                            </div>
            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label > WITEL </label>
                                                    <input type="text" name="WITEL" value="{{ $alert->WITEL }}" class="form-control" readonly>
                                                </div>
                                            </div>
            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label > STO </label>
                                                    <input type="text" name="STO" value="{{ $alert->STO }}" class="form-control" readonly>
                                                </div>
                                            </div>
            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label > BULAN ALERT </label>
                                                    <input type="text" name="BULAN_ALERT" value="{{ $alert->BULAN_ALERT }}" class="form-control" readonly>
                                                </div>
                                            </div>
            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label > ATRIBUT </label>
                                                    <input type="text" name="ATRIBUT" value="{{ $alert->ATRIBUT }}" class="form-control" readonly>
                                                </div>
                                            </div>
            
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <label > TGL PS </label>
                                                    <input type="text" name="TGL_PS" value="{{ $alert->TGL_PS }}" class="form-control" readonly>
                                                </div>
                                            </div>
            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label > AGE </label>
                                                    <input type="text" name="AGE" value="{{ $alert->AGE }}" class="form-control" readonly>
                                                </div>
                                            </div>
            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label > ALERT </label>
                                                    <input type="text" name="ALERT" value="{{ $alert->ALERT }}" class="form-control" readonly>
                                                </div>
                                            </div>
            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label > SCORE </label>
                                                    <input type="text" name="SCORE" value="{{ $alert->SCORE }}" class="form-control" readonly>
                                                </div>
                                            </div>
            
                                            <div class="col-md-6">
                                                
                                                <div class="form-group">
                                                    <label @error('STATUS') class="text-danger" @enderror> STATUS
                                                        @error('STATUS')
                                                        | {{ $message }}
                                                        @enderror</label>
                                                    <select name="STATUS" class="custom-select" id="STATUS"> 
                                                        <option value="Open" {{ old('STATUS') == 'Open' ? 'selected' : '' }}>Open</option>
                                                        <option value="Contacted" {{ old('STATUS') == 'Contacted' ? 'selected' : '' }}>Contacted</option>
                                                        <option value="Uncontacted" {{ old('STATUS') == 'Uncontacted' ? 'selected' : '' }}>Uncontacted</option>
                                                        <option value="In-Progress" {{ old('STATUS') == 'In-Progress' ? 'selected' : '' }}>In-Progress</option>
                                                        <option value="Closed" {{ old('STATUS') == 'Closed' ? 'selected' : '' }}>Closed</option>
                                                    </select>
                                                </div>
                                            </div>
            
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> DESKRIPSI </label>
                                                    <textarea name="DESKRIPSI" class="form-control" id="DESKRIPSI"
                                                    placeholder="DESKRIPSI.....">{{ old('DESKRIPSI') }}</textarea>
                                                </div>
                                            </div>
            
                                        </div>

                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label > NAMA PEMILIK </label>
                                                    <input type="text" name="NAMA_PEMILIK" value="{{ $alert->NAMA_PEMILIK }}" class="form-control" readonly>
                                                </div>
                                            </div>
            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label > RELASI </label>
                                                    <input type="text" name="RELASI" value="{{ $alert->RELASI }}" class="form-control" readonly>
                                                </div>
                                            </div>
            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label > EMAIL </label>
                                                    <input type="text" name="EMAIL"  value="{{ $alert->EMAIL }}" class="form-control" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label > PHONE </label>
                                                    <input type="text" name="PHONE" value="{{ $alert->PHONE }}"  class="form-control" readonly>
                                                </div>
                                            </div>
            
            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label > FILE </label>
                                                    <input type="file" name="FILE" value="{{ $alert->FILE }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                
                                

                            </div>

                            
                        </div>
                        <div class="card-footer text-left">
                            <button class="btn btn-warning mr-1" type="submit">Update</button>
                            <a href="{{ route('alert.index') }}" class="btn btn-info">Back</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

           
        </div>
    </section>

    
@endsection

@section('before-footer')
    
@endsection

@section('after-footer')

@endsection

@section('middle-footer')
   
@endsection
