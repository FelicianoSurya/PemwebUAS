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
            <a href="{{ route('favorite') }}"><button type="button" class="btn btn-light mx-3">Favorites</button></a>
            <a href="{{ route('home') }}"><button type="button" class="btn btn-light">See all</button></a>
        </div>
    </div>
    <div class="listfasilitas row mt-2">
    @foreach($datas as $data)
    <div class="col-lg-3 col-md-4 col-sm-6 my-3" id="box-fav-{{ $data['fasility']->id }}">
        <div class="card p-3">
            <img src="{{ asset('storage/Images/Fasilitas') .'/'. $data['fasility']->image }}" class="card-img-top" alt="...">
            <div class="card-body pb-0">
                <h5 class="card-title">{{ $data['fasility']->fasilityName }}</h5>
                <div class="btnCard row justify-content-between">
                    <input type="hidden" id="userID" value="{{ Auth()->user()->id }}">
                    <input type="hidden" id="fasilityID" value="{{ $data['fasility']->id }}">
                    <a href="{{ Route('facilityDetail', $data['fasility']->fasilityID) }}" class="btn btn-light">Detail</a>
                    <button id="btn-fav-{{ $data['fasility']->id }}" class="btn 
                    @php
                        $fav = 'no';
                    @endphp
                    @foreach($favorites as $favorite)
                        @if($favorite['fasilityID'] == $data['fasility']->id && $favorite['userID'] == Auth()->user()->id)
                            @php
                                $fav = $favorite['id'];
                            @endphp
                        @endif
                    @endforeach
                    @php
                        if($fav == 'no') echo 'btn-light btn-favorite';
                        else echo 'btn-danger btn-notFavorite';
                    @endphp
                    ">Favorite &hearts;</button>
                    <input type="hidden" id="favoriteID" value="@php echo $fav @endphp">
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
</div>

@endsection

@section('custom-js')
<script>
    $(document).ready(function(){
        $(".btn-favorite").click(function(e){
            let userID = $(this).closest('.card-body').children('div').children('#userID').val();
            let fasilityID = $(this).closest('.card-body').children('div').children('#fasilityID').val();
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url : 'getFavorite',
                method : "POST",
                data : {
                    userID : userID,
                    fasilityID : fasilityID,
                    _token : _token
                },
                success : function(result){
                    $('#btn-fav-' + result.fasilityID).removeClass('btn-light').addClass('btn-danger');
                    location.href();
                }
            });
        });
        $('.btn-notFavorite').click(function(e){
            let _token   = $('meta[name="csrf-token"]').attr('content');
            let favoriteID = $(this).closest('.card-body').children('div').children('#favoriteID').val();
            $.ajax({
                url : 'favorite/' + favoriteID,
                method : 'DELETE',
                data : {
                    _token : _token
                },
                success : function(result){
                    $('#box-fav-' + result.id).addClass('d-none');
                }
            })
        });
    });
</script>
@endsection