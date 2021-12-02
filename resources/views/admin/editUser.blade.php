@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/admin/addFacility.css')}}">
@endsection

@section('content')
<div class="container pt-5" id="">
    <div class="modal-dialog row" style="width:100%;margin-top:50px">	
        <div class="modal-content p-4 col-md-12">
            <div class="modal-header d-flex justify-content-center">
                <span style="margin-right:5px;color:#372074;">Edit</span><span class="ms-4" style="color:#FFB13E">User</span>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ url('management/edit') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row flex-column">
                    <label for="email" class="col-md-4 col-form-label">{{ __('Email') }}</label>

                    <div class="col-md-12">
                        <input id="email" disabled type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user['email'] }}" required>
                        <input id="id" type="hidden" class="form-control @error('email') is-invalid @enderror" name="id" value="{{ $user['id'] }}" required>
                        <input type="hidden" id="pass" name="pass" value="no">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row flex-column">
                    <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>

                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user['name'] }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong> 
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row flex-column">
                    <label for="image" class="col-md-5 col-form-label">{{ __('Profile Picture') }}</label>

                    <div class="col-md-12">
                        <input class="form-control" type="file" placeholder="Profile Picture" id="image" name="image" class="form-control @error('image') is-invalid @enderror" name="Profile Picture" />


                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex">
                    <input type="checkbox" class="col-md-1 form-control" id="checkbox" style="width:20px;height:20px">
                    <label for="checkbox">Edit Password?</label>
                </div>
                <div class="form-group row flex-column">
                    <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" disabled  autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row flex-column">
                    <label for="password-confirm" class="col-md-6 col-form-label">{{ __('Confirm Password') }}</label>

                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" disabled autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group modal-btn row justify-content-end align-items-end mb-0">
                    <div class="col-3">
                        <button type="submit" class="btn btn-light px-4">
                            {{ __('Edit') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a href="{{ url('management') }}"><button type="button" class="btn btn-danger" class="close">Cancel</button></a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script>
    $(document).ready(function(){
        $('#checkbox').click(function(){
            if($(this).is(':checked')){
                $("#password").removeAttr('disabled');
                $("#password-confirm").removeAttr('disabled');
                $("#pass").val('yes');
            }else{
                $("#password").attr('disabled','disabled');
                $("#password-confirm").attr('disabled','disabled');
            }
        })
    });
</script>
@endsection
