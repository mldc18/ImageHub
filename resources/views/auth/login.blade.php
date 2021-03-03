@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="glass col-md-4 px-5 py-5">
            <center>
                <img src="https://gm1.ggpht.com/KRZH1z5DuY0VN2JcPtGLibd9Gm99DO3Wz41MQB6jiMjmv8LJVla5kPl04N6LlBB4pBQ-5u4mWrcHVALQ2FNB32FpeYVr8IB8d8f0RrXSjCcPH8Qy8ygb9Rlg_Wfl4VVt6LpcsGsFvIufMdSWTXPbL97Kig8x3n_6_6BfUBLkJlEKyyBSyvBRCeCCjqpg80QmSgQiDKGajIsYB0aiudaD_QXW8UPSxPwL_HCJ_nd3tRiXIGa7z-CE_adSs9ebDejN9sjaIP2HRW5VLZZksHRRHEElw4BJp3e4_QY4CgHEeN5be6jCS2eBKHykorhoyhQhNbeNGsRNcLnLNsKlktaWYXRs0_A5zXAMR-XTEtRFPBA64YYrWEBZMzZ-uDj6JH4z6e8rfQhQjywKs_nSn1CGWxMRMzJzxnQo8dpUaMty2BqpmTlh9GSldN4rDUpXAuNsNyLcBWI0A6CutelC4X0tMS79WQWhFgdBgRUWLqaqavDeVCg_28MBUYyfarrkIXLdyHAoaZUGs1gBG0SyNI40tX2m_quz6_nWZ-T5mg1gtjxLGcoy7EfeCIwu9xKRuLZsbP-4ps-bOzwoBAUkclxd7NJ0J8MkiI5mP6LEPKyxTxBo5ga0-lxGpTg-CMEtR-PC-9kfCZa23_3mf-XVI9BLYvcn3KJ0ChNUFev29i9KqbZ-eLWo27zHofrdz0kDovO-P-V3C-WdAfiWOIOOLxV3RVKMia_dx-cb_cXJIxIoQ2vC_ZNW4jRQK4T7xdCroiR3_l6n=s0-l75-ft-l75-ft" height="140px" class="mb-5" style="border-radius: 50%">
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