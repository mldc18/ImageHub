@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-default">
                <h1>Reset Password</h1>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        <a href="/">Return to homepage</a>
                    @else
                    <div class="alert alert-info">
                        Your password has expired, please change it.
                    </div>
                    <form class="form-horizontal" method="POST" action="{{ route('password.post_expired') }}">
                        {{ csrf_field() }}

                        <div class="form-floating mb-2">
                            <input id="current_password" type="text" class="form-control" name="current_password" required="">
                            @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="current_password" class="col-md-4 control-label">Current</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="password" class="text-md-right">{{ __('Password') }}</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input id="password-confirm" type="text" class="form-control" name="password_confirmation"  required autocomplete="new-password">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm') }}</label>
                        </div>

                        <div class="form-group">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection