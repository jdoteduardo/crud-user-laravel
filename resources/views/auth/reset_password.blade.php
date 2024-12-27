@extends('layouts.auth')

@section('body-class', 'register-page')

@section('content')
<div class="register-box">
    <div class="register-logo"> <a href="{{ route('login') }}"><b>Admin</b>LTE</a> </div> <!-- /.register-logo -->
    <div class="card">
        <div class="card-body register-card-body">
            <p class="register-box-msg">Reset password</p>
            <form action="{{ route('password.update') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ request()->token }}">
                <div class="input-group mb-3"> 
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" 
                        value="{{ request()->email }}">
                    <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3"> 
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3"> 
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
                    <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                </div>
                <div class="d-grid gap-2"> <button type="submit" class="btn btn-primary">Reset Password</button> </div>
            </form>
        </div> <!-- /.register-card-body -->
    </div>
</div>
@endsection