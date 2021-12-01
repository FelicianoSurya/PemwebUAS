@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/user/detailFacility.css')}}">
@endsection

@section('content')
<div class="modal" style="background-color:rgba(0,0,0,0.5);" id="myModal" role="dialog">
    <div class="modal-dialog" style="width:100%;margin-top:50px">	
        <div class="modal-content p-4">
            <div class="modal-header">
            <h4 class="modal-title" style="display:flex;justify-content:center; width:100%"><span style="margin-right:5px;color:#372074;">Booking</span><span class="ms-4" style="color:#FFB13E">Form</span></h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('bookingAdd') }}">
                @csrf
                <input type="hidden" name="userID" value="{{ Auth()->user()->id }}">
                <div class="form-group row flex-column">
                    <label for="fasilityID" class="col-md-12 col-form-label">{{ __('Fasility ID') }}</label>

                    <div class="col-md-12">
                        <input id="fasilityID" disabled type="text" class="form-control" name="fasilityID" value="{{ $fasility['fasilityID'] }}" required  autofocus>
                        <input id="fasilityID" type="hidden" class="form-control" name="fasilityID" value="{{ $fasility['id'] }}">
                    </div>
                </div>

                <div class="form-group row flex-column">
                    <label for="date" class="col-md-12 col-form-label">{{ __('Reservation Date') }}</label>

                    <div class="col-md-12">
                        <input id="bookingDate" type="date" class="form-control @error('date') is-invalid @enderror" name="bookingDate" required>

                        @error('bookingDate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row flex-column">
                    <label for="start" class="col-md-12 col-form-label">{{ __('Start Time') }}</label>

                    <div class="col-md-12">
                        <input id="startTime" type="time" class="form-control @error('startTime') is-invalid @enderror" name="startTime" required>

                        @error('startTime')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row flex-column">
                    <label for="endTime" class="col-md-12 col-form-label">{{ __('End Time') }}</label>

                    <div class="col-md-12">
                        <input id="endTime" type="time" class="form-control @error('date') is-invalid @enderror" name="endTime" required>

                        @error('endTime')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group modal-btn row justify-content-end align-items-end mb-0">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-light px-4">
                            {{ __('Book') }}
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-danger" class="close" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

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
<script>
    $(document).ready(function(){
        $('#btn-booked').click(function(){
            $('#myModal').modal({
            keyboard: false,
            show: true,
            backdrop: 'static'
        	});
        })
    })
    @if(session('validate')){
        $(document).ready(function(){
            $('#myModal').modal({
            keyboard: false,
            show: true,
            backdrop: 'static'
        	});
        });
    }
    @elseif(session('status') == 'invalid'){
        $(document).ready(function() {
                Swal.fire({
                icon: 'error',
                title: 'Invalid',
                text: "Booking Gagal! Silahkan masukan waktu dengan benar!",    
                showCloseButton : true
            });
        });
    }
    @elseif(session('status') == 'already'){
        $(document).ready(function() {
                Swal.fire({
                icon: 'error',
                title: 'Already Booking at that time!',
                text: "Booking Gagal! Kamu sudah Booking di Jam Tersebut!",    
                showCloseButton : true
            });
        });
    }
    @elseif(session('status') == 'crash'){
        $(document).ready(function() {
                Swal.fire({
                icon: 'error',
                title: 'Crash!',
                text: "Booking Gagal! Tempat sudah dibooking pada jam tersebut!",    
                showCloseButton : true
            });
        });
    }
    @elseif(session('status') == 'success'){
        $(document).ready(function() {
                Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "Booking Berhasil!",    
                showCloseButton : true
            });
        });
    }
    @endif
</script>
@endsection
