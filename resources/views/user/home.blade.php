@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/user/home.css')}}">
@endsection

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>.
            </div>
        </div>
    </div>
</div> -->

<div class="container p-3">
    <div class="ataslist row justify-content-between">
        <div class="judul col-lg-6 col-md-6 col-12 row ">
            <span style="color: #372074;">Facilities</span>
            <span style="color: #FFB13E;">Listing</span>
        </div>
        <div class="buttons col-lg-6 col-md-6 col-12 row justify-content-lg-end justify-content-md-end p-2">
            <button type="button" class="btn btn-light mx-3">Favorites</button>
            <button type="button" class="btn btn-light">See all</button>
        </div>
    </div>
    <div class="listfasilitas row mt-2">
    <div class="col-lg-3 col-md-4 col-sm-6 my-3">
        <div class="card p-3">
            <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Anoooooo</h5>
                <div class="btnCard row justify-content-between">
                    <a href="#" class="btn btn-primary">Detail</a>
                    <a href="#" class="btn btn-primary">Favorite &hearts;</a>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 my-3">
        <div class="card p-3">
            <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Anoooooo</h5>
                <div class="btnCard row justify-content-between">
                    <a href="#" class="btn btn-primary">Detail</a>
                    <a href="#" class="btn btn-primary">Favorite &hearts;</a>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 my-3">
        <div class="card p-3">
            <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Anoooooo</h5>
                <div class="btnCard row justify-content-between">
                    <a href="#" class="btn btn-primary">Detail</a>
                    <a href="#" class="btn btn-primary">Favorite &hearts;</a>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 my-3">
        <div class="card p-3">
            <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Anoooooo</h5>
                <div class="btnCard row justify-content-between">
                    <a href="#" class="btn btn-primary">Detail</a>
                    <a href="#" class="btn btn-primary">Favorite &hearts;</a>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 my-3">
        <div class="card p-3">
            <img src="https://picsum.photos/200/200" class="card-img-top pt-3" alt="...">
            <div class="card-body">
                <h5 class="card-title">Anoooooo</h5>
                <div class="btnCard row justify-content-between">
                    <a href="#" class="btn btn-primary">Detail</a>
                    <a href="#" class="btn btn-primary">Favorite &hearts;</a>
                </div>
                
            </div>
        </div>
    </div>
    </div>
    
</div>

@endsection
