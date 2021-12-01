@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/user/detailFacility.css')}}">
@endsection

@section('content')
    <div class="container pt-5">
        <div class="ataslist row justify-content-between py-5">
            <div class="judul col-lg-6 col-md-6 col-12 row ">
                <span style="color: #372074;">Facilities</span>
                <span style="color: #FFB13E;">Listing</span>
            </div>
            <div class="buttons col-lg-6 col-md-6 col-12 row justify-content-lg-end justify-content-md-end p-2">
                <a href="{{ route('home') }}"><button type="button" class="btn btn-light px-4">Back</button></a>
            </div>
        </div>
    </div>
    <div class="backgroundDesc">
        <div class="isidetailF row px-3 justify-content-evenly mx-auto">
            <div class="pictF col-lg-6 col-md-6 col-12 text-center p-5">
                <img src="{{ asset('storage/Images/Fasilitas') . '/' . $fasility['image'] }}" width="90%" height="100%" alt="" class="rounded">
            </div>
            <div class="textDetail col-lg-4 col-md-6 col-12 py-lg-5 ps-md-2 py-md-2 py-sm-1">
                <h1>{{ $fasility['fasilityName'] }}</h1>
                <p>{{ $fasility['description'] }}</p>
                <a href="#" id="btn-booked" class="btn btn-light">Booked</a>
                <a href="#" class="btn btn-light mx-2">Favorite &hearts;</a>
            </div>
        </div>
    </div>
    

    </div>
@endsection

@section('custom-js')
<!-- code js or link js -->
@endsection
