@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/admin/addFacility.css')}}">
<style>
    .invalid-feedback{
        display:inline !important;
    }
</style>
@endsection

@section('content')
<div class="container pt-5" id="">
    <div class="modal-dialog row" style="width:100%;margin-top:50px">	
        <div class="modal-content p-4 col-md-12">
            <div class="modal-header d-flex justify-content-center">
                <span style="margin-right:5px;color:#372074;">Add</span><span class="ms-4" style="color:#FFB13E">Facility</span>
            </div>
            <div class="modal-body">
            @if(Auth()->user()->role == 'admin')
            <form method="POST" action="{{ url('admin/facilities') }}" enctype="multipart/form-data">
            @elseif(Auth()->user()->role == 'management')
            <form method="POST" action="{{ url('manager/facilities') }}" enctype="multipart/form-data">
            @endif

                @csrf
                
                <div class="form-group row flex-column">
                    <label for="fasilityID" class="col-md-12 col-form-label">{{ __('Fasility ID') }}</label>

                    <div class="col-md-12">
                        <input id="fasilityID" type="text" class="form-control" name="fasilityID" >
                    </div>

                    @error('fasilityID')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row flex-column ">
                    <label for="name" class="col-md-12 col-form-label">{{ __('Name') }}</label>

                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control" name="fasilityName" >
                    </div>
                    @error('fasilityName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row flex-column">
                    <label for="image" class="col-md-5 col-form-label">{{ __('Facility Picture') }}</label>

                    <div class="col-md-12 row flex-column img-invalid       ">
                        <input type="file" placeholder="Facility Picture" id="image" name="image" class="form-control @error('image') is-invalid @enderror" name="email" value="{{ old('image') }}" />

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row flex-column">
                    <label for="desc" class="col-md-5 col-form-label">{{ __('Description') }}</label>
                    <textarea name="description" id="description" cols="30" rows="7" placeholder="Description"></textarea>
                    
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group modal-btn row justify-content-end align-items-end mb-0">
                    <div class="col-3">
                        <button type="submit" class="btn btn-light px-4">
                            {{ __('Book') }}
                        </button>
                    </div>
                    <div class="col-3">
                        @if(Auth()->user()->role == 'admin')
                        <a href="{{ url('admin/facilities') }}"><button type="button" class="btn btn-danger" class="close">Cancel</button></a>
                        @elseif(Auth()->user()->role == 'management')
                        <a href="{{ url('facilities') }}"><button type="button" class="btn btn-danger" class="close">Cancel</button></a>
                        @endif
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<!-- code js or link js -->
@endsection
