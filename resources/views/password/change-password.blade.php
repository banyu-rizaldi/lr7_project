@extends('layouts.master')

@section('content')

<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Change Password</h3>

                        @if (Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (Session::get('failed'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                    </div>
                    <div class="card-body">
                        <form action="{{ URL::to('update-password') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label for="">Old Password</label>
                                    <input type="password" name="old_password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm New Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            <button type="submit" class="btn btn-primary col-lg-12 mt-3">Change Password</button>
                        </form>
                    </div>      
                </div>
            </div>

    </div><!-- /.container-fluid -->
</section>
@endsection



@section('after-footer')

@endsection

@section('before-footer')

@endsection