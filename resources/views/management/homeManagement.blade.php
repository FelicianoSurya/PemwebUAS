@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/management/home.css')}}">
@endsection

@section('content')
<div class="container mt-5 pt-5">
    <div class="isihome">
        <div class="d-flex box-home row my-3 justify-content-center">
        @if(Auth()->user()->role == 'management')
        <div class="col-md-6 col-8 p-3">
                <a href="{{ url('manager/facilities') }}">
                    <div class="box-choices">
                        <img src="{{asset('images/admin/application.png')}}" class="card-img-top w-100" alt="...">
                        <div class="card-body pt-3">
                            <h3 class="card-text text-center">Facilities</h3>
                        </div>
                    </div>
                </a>   
            </div>
            <div class="col-md-6 col-8 p-3">
                <a href="{{ url('manager/requestListing') }}">
                    <div class="box-choices">
                        <img src="{{asset('images/admin/request.png')}}" class="card-img-top w-100" alt="...">
                        <div class="card-body pt-3">
                            <h3 class="card-text text-center">Requests</h3>
                        </div>
                    </div>
                </a>   
            </div>
            <!-- <a class="col-6 " href="{{ url('facilities') }}">
                <div class="card mx-3 p-2">
                    <img src="{{asset('images/admin/application.png')}}" class="card-img-top w-100" alt="...">
                    <div class="card-body">
                        <h3 class="card-text text-center">Facilities</h3>
                    </div>
                </div>
            </a>
            <div class="w-100 d-sm-none d-block"></div>
            <a class="col-6 " href="{{ url('manager/requestListing') }}">
                <div class="card mx-3 p-2">
                    <img src="{{asset('images/admin/request.png')}}" class="card-img-top w-100" alt="...">
                    <div class="card-body">
                        <h3 class="card-text text-center">Requests</h3>
                    </div>
                </div>
            </a> -->
        @elseif(Auth()->user()->role == 'admin')

            <div class="col-lg-4 col-md-6 col-8  p-3">
                <a href="{{ url('management') }}">
                    <div class="box-choices">
                        <img src="{{asset('images/admin/user.png')}}" class="card-img-top w-100" alt="...">
                        <div class="card-body pt-3">
                            <h3 class="card-text text-center">Users</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-8 p-3">
                <a href="{{ url('admin/facilities') }}">
                    <div class="box-choices">
                        <img src="{{asset('images/admin/application.png')}}" class="card-img-top w-100" alt="...">
                        <div class="card-body pt-3">
                            <h3 class="card-text text-center">Facilities</h3>
                        </div>
                    </div>
                </a>   
            </div>
            <div class="col-lg-4 col-md-6 col-8 p-3">
                <a href="{{ url('admin/requestListing') }}">
                    <div class="box-choices">
                        <img src="{{asset('images/admin/request.png')}}" class="card-img-top w-100" alt="...">
                        <div class="card-body pt-3">
                            <h3 class="card-text text-center">Requests</h3>
                        </div>
                    </div>
                </a>   
            </div>
        @endif
        </div>
    </div>
</div>
@endsection
