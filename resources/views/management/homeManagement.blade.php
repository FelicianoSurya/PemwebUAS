@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/management/home.css')}}">
@endsection

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center isihome align-items-center">
        <div class="d-flex box-home col-12 my-3 justify-content-center">
        @if(Auth()->user()->role == 'management')
            <a href="{{ url('facilities') }}"><div class="card mx-3 p-2">
                <img src="https://picsum.photos/300/300" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-text text-center">Facilities</h3>
                </div>
            </div></a>
            <a href="{{ url('manager/requestListing') }}"><div class="card mx-3 p-2">
                <img src="https://picsum.photos/300/300" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-text text-center">Requests</h3>
                </div>
            </div></a>
        @elseif(Auth()->user()->role == 'admin')
            <a href="{{ url('management') }}"><div class="card mx-3 p-2">
                <img src="https://picsum.photos/300/300" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-text text-center">Users</h3>
                </div>
            </div></a>
            <a href="{{ url('admin/facilities') }}"><div class="card mx-3 p-2">
                <img src="https://picsum.photos/300/300" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-text text-center">Facilities</h3>
                </div>
            </div></a>
            <a href="{{ url('admin/requestListing') }}"><div class="card mx-3 p-2">
                <img src="https://picsum.photos/300/300" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-text text-center">Requests</h3>
                </div>
            </div></a>
        @endif
        </div>
    </div>
</div>
@endsection
