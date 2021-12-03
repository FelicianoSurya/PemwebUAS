@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/user/detailFacility.css')}}">
@endsection

@section('content')
<div class="container py-5 mt-5">
    <div class="modal-dialog w-100 m-auto" >	
        <div class="modal-content p-4">
            <div class="modal-header">
            <h4 class="bookingForm-title modal-title" style="display:flex;justify-content:center; width:100%"><span style="margin-right:5px;color:#372074;">Booking</span><span class="ms-4" style="color:#FFB13E">Form</span></h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('bookingAdd') }}">
                @csrf
                <input type="hidden" name="userID" value="{{ Auth()->user()->id }}">
                <div class="form-group row flex-column">
                    <label for="fasilityName" class="col-md-12 col-form-label">{{ __('Fasility Name') }}</label>

                    <div class="col-md-12">
                        <select name="fasilityID" class="form-control" id="id">
                            <option value="">Fasililty Name</option>
                            @foreach($fasilities as $fasility)
                            <option value="{{ $fasility['id'] }}">{{ $fasility['fasilityName'] }}</option>
                            @endforeach
                        </select>
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

                <div class="form-group modal-btn row justify-content-center align-items-end mb-0">
                    <div class="col-md-4 col-sm-4 col-6 text-center">
                        <button type="submit" class="btn btn-light px-4">
                            {{ __('Book') }}
                        </button>
                    </div>
                    <div class="col-md-4 col-sm-4 col-6 text-center">
                        <a href="{{ route('home') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
                    </div>
                </div>
            </form>
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
    @elseif(session('status') == 'invalid')
        $(document).ready(function() {
            Swal.fire({
            icon: 'error',
            title: 'Invalid',
            text: "Booking Gagal! Silahkan masukan waktu dengan benar!",    
            showCloseButton : true
        });
    });
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
