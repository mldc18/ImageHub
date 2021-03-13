@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="glass col-md-4 px-5 py-5">
            <h1 class="my-3">Explore moments.</h1>
            <div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="username" class="text-md-right">{{ __('username') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input id="firstname" type="firstname" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname">
                        @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="firstname" class="text-md-right">{{ __('firstname') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input id="lastname" type="lastname" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
                        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="lastname" class="text-md-right">{{ __('lastname') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="email" class="text-md-right">{{ __('email') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="password" class="text-md-right">{{ __('password') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input id="password-confirm" type="text" class="form-control" name="password_confirmation"  required autocomplete="new-password">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm') }}</label>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger text-light fw-bold">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection
