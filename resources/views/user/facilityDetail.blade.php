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
                <button type="button" class="btn btn-light px-4">Back</button>
            </div>
        </div>
    </div>
    <div class="backgroundDesc">
        <div class="isidetailF row px-3 justify-content-evenly mx-auto">
            <div class="pictF col-lg-6 col-md-6 col-12 text-center">
                <img src="https://picsum.photos/500/400" alt="" class="rounded p-5">
            </div>
            <div class="textDetail col-lg-4 col-md-6 col-12 py-lg-5 ps-md-2 py-md-2 py-sm-1">
                <h1>Basketball Court</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui consectetur, rem eum ullam expedita aperiam ipsam temporibus veritatis quae unde ab! Deleniti corporis laudantium illum maxime, provident illo ad suscipit in harum libero veritatis odit, accusantium eligendi labore accusamus voluptatum mollitia ipsum, explicabo quisquam ab. Soluta perspiciatis ea, debitis doloribus minima commodi nesciunt tenetur impedit corrupti, deleniti repellendus fugit ratione.</p>
                <a href="#" class="btn btn-light">Detail</a>
                <a href="#" class="btn btn-light mx-2">Favorite &hearts;</a>
            </div>
        </div>
    </div>
    

    </div>
@endsection

@section('custom-js')
<!-- code js or link js -->
@endsection
