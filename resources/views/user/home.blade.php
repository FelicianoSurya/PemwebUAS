@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/user/home.css')}}">
@endsection

@section('content')

<div class="container p-3 mt-5">
    <div class="ataslist row justify-content-between pt-5">
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
    @foreach($facilities as $fasility)
    <div class="col-lg-3 col-md-4 col-sm-6 my-3">
        <div class="card p-3">
            <img src="{{ asset('storage/Images/Fasilitas') .'/'. $fasility['image'] }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $fasility['fasilityName'] }}</h5>
                <div class="btnCard row justify-content-between">
                    <a href="{{ Route('facilityDetail', $fasility['fasilityID']) }}" class="btn btn-light">Detail</a>
                    <a href="#" class="btn btn-light">Favorite &hearts;</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
    
</div>

@endsection
