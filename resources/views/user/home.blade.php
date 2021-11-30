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

<div class="container">
    <div class="ataslist row ">
        <div class="judul col row">
            <span style="color: #372074;">Facilities</span>
            <span style="color: #FFB13E;">Listing</span>
        </div>
        <div class="buttons col row justify-content-end">
            <button type="button" class="btn btn-light mx-3">Favorite</button>
            <button type="button" class="btn btn-light">See all</button>
        </div>
    </div>
    <div class="listfasilitas row justify-content-center mt-5">
    <div class="card col-lg-3 col-md-4 col-sm-6 mb-2">
        <img src="https://picsum.photos/200/200" class="card-img-top pt-3" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <div class="card col-lg-3 col-md-4 col-sm-6 mb-2">
        <img src="https://picsum.photos/200/200" class="card-img-top pt-3" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <div class="card col-lg-3 col-md-4 col-sm-6 mb-2">
        <img src="https://picsum.photos/200/200" class="card-img-top pt-3" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <div class="card col-lg-3 col-md-4 col-sm-6 mb-2">
        <img src="https://picsum.photos/200/200" class="card-img-top pt-3" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <div class="card col-lg-3 col-md-4 col-sm-6 mb-2">
        <img src="https://picsum.photos/200/200" class="card-img-top pt-3" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    </div>
    
</div>

@endsection
