@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/user/detailFacility.css')}}">
@endsection

@section('content')
    <div class="container">
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
    <div class="isidetailF row col-lg-6 col-12 px-3 justify-content-evenly">
        <div class="pictF text-center mx-auto">
            <img src="https://picsum.photos/300/200" alt="" class="rounded p-5">
        </div>
        <div class="textDetail col-lg-6 col-12 ps-2 py-md-2 py-sm-1 mx-auto">
            <h1>Basketball Court</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui consectetur, rem eum ullam expedita aperiam ipsam temporibus veritatis quae unde ab! Deleniti corporis laudantium illum maxime, provident illo ad suscipit in harum libero veritatis odit, accusantium eligendi labore accusamus voluptatum mollitia ipsum, explicabo quisquam ab. Soluta perspiciatis ea, debitis doloribus minima commodi nesciunt tenetur impedit corrupti, deleniti repellendus fugit ratione.</p>
            <a href="#" class="btn btn-light col-3">Detail</a>
            <a href="#" class="btn btn-light col-3 mx-2">Favorite &hearts;</a>
        </div>
    </div>
    <div class="container justify-content-start pt-3">
        <h1>Description</h1>
        <div class="isiDesc row">
                    <p class="col-2"> 
                       Court aspect <br>
                       Length<br>
                       Width<br>
                       Height<br>
                       Playing area
                    </p>
                    <p class="col-2">
                      Dimension<br>
                      100 m<br>
                      200 m<br>
                      10 m<br>
                      500 m <sup>2</sup>
                    </p>
                  </div>

    </div>
@endsection

@section('custom-js')
<!-- code js or link js -->
@endsection
