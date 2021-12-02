@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/management/home.css')}}">
@endsection

@section('content')
<div class="container isihome mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="d-flex col-12 my-3 justify-content-center">
            <div class="card mx-2">
                <img src="https://picsum.photos/300/300" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Facilities</p>
                </div>
            </div>
            <div class="card mx-2">
                <img src="https://picsum.photos/300/300" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Requests</p>
                </div>
            </div>
            <!-- <div class="card mx-2">
                <img src="https://picsum.photos/300/300" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Users</p>
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
