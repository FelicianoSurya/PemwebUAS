@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('content')
<div class="loginContainer d-flex align-items-center justify-content-center">
    <div class="row isilogin justify-content-center">
        <div class="col-md-12">
            <div class="card p-3">
                <div class="card-header text-center">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row flex-column">
                            <label for="email" class="col-md-4 col-form-label">{{ __('Email') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row flex-column">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if($errors->any())
                                <div class="col-12">
                                    @error('invalid')
                                    <p class="text-danger fw-bolder">{{$errors->first()}}</p>
                                    @enderror
                                </div>
                            @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-light px-4">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="col-md-12 d-flex text-center flex-column pt-3">
                                <span>Don't have an acccount?</span>
                                <span>
                                   <a href="{{ route('register') }}" style="color: #FFB13E;">Register</a>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
