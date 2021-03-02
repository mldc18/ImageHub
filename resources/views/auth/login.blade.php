@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="glass col-md-4 px-5 py-5">
            <center>
                <img src="https://girlwiththetattoos.com/wp-content/uploads/2020/09/pinterest-logo.png" height="120px" class="mb-5">
            </center>
            <div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="email" class="text-md-right">{{ __('Email') }}</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="password" class="text-md-right">{{ __('Password') }}</label>
                        </div>
                    <div class="form-group mb-2">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-block btn-danger text-light fw-bold">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div class="d-grid">
                            <a href="/sign-in/google" class="btn btn-block btn-info text-light fw-bold">
                                <img src="https://cdn.icon-icons.com/icons2/2119/PNG/512/google_icon_131222.png" style="margin-right:15px;" height="25px"> {{ __('Continue with Google') }}
                            </a>
                        </div>
                    </div>
                    {{-- <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-4">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        </div>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection