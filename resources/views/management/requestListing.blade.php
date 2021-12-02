@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/management/request.css')}}">
@endsection

@section('content')
<div class="container pt-5">
        <div class="ataslist row justify-content-between py-5">
            <div class="judul col-lg-6 col-md-6 col-12 row ">
                <span style="color: #372074;">Request</span>
                <span style="color: #FFB13E;">Listing</span>
            </div>
            
            <div class="buttons col-lg-6 col-md-6 col-12 row justify-content-lg-end justify-content-md-end p-2">
            @if(Auth()->user()->role != 'user')
                @if(Auth()->user()->role == 'admin')
                <a href="{{ route('requestListingWaiting') }}"><button type="button" class="btn btn-light mx-3">Waiting</button></a>
                <a href="{{ route('requestListingAdmin') }}"><button type="button" class="btn btn-light mx-3">All Request</button></a>
                @elseif(Auth()->user()->role == 'management')
                <a href="{{ route('requestListingWaitingManager') }}"><button type="button" class="btn btn-light mx-3">Waiting</button></a>
                <a href="{{ route('requestListingManager') }}"><button type="button" class="btn btn-light mx-3">All Request</button></a>
                @endif
            @else
                <a href="{{ route('userRequest') }}"><button type="button" class="btn btn-light mx-3">Waiting</button></a>
                <a href="{{ route('userHistory') }}"><button type="button" class="btn btn-light mx-3">History</button></a>
            @endif
            </div>
        </div>
    </div>
<div class="container tabelReq d-flex flex-column align-items-center justify-content-center">
        <table id="example" class="table table-striped " style="width:100%">
            <thead>
                <tr class="text-center">
                    <th width="5%">No</th>
                    <th width="10%">Requester</th>
                    <th width="15%">Requested Facility</th>
                    <th width="15%">Date</th>
                    <th width="10%">Start Time</th>
                    <th width="10%">End Time</th>
                    <th width="15%">Status</th>
                    @if(Auth()->user()->role != 'user')
                    <th width="10%">Operation</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php $i = 0; @endphp
                    @foreach($bookings as $booking)
                    @php $i++ @endphp
                        <tr class="text-center">
                            <td class="text-center align-middle">{{ $i }}</td>
                            <td class="text-center align-middle">{{ $booking['user']['name'] }}</td>
                            <td class="text-center align-middle">{{ $booking['fasility']['fasilityName'] }}</td>
                            <td class="text-center align-middle">{{ date('d-m-Y', strtotime($booking['bookingDate'])) }}</td>
                            <td class="text-center align-middle">{{ $booking['startTime'] }}</td>
                            <td class="text-center align-middle">{{ $booking['endTime'] }}</td>
                            <td class="text-center align-middle">
                                @if($booking['status'] == 'waiting')
                                    @if(Auth()->user()->role == 'user')
                                    Waiting for Approved
                                    @else
                                    Waiting
                                    @endif
                                @elseif($booking['status'] == 'approved')
                                    Approved
                                @elseif($booking['status'] == 'rejected')
                                    Rejected
                                @endif
                            </td>
                    @if(Auth()->user()->role != 'user')
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center align-items-center operation">
                                    @if(Auth()->user()->role == 'management')
                                        @if($booking['status'] == 'waiting')
                                        <form action="{{ url('manager/booking/approved') . '/' . $booking['id'] }}">
                                            <button>
                                            <img src="{{asset('images/table/check.svg')}}" alt="">
                                            </button>
                                        </form>
                                        <form action="{{ url('manager/booking/rejected') . '/' . $booking['id'] }}">
                                            <button>
                                            <img src="{{asset('images/table/cross.svg')}}" alt="">
                                            </button>
                                        </form>
                                    @else
                                        Done
                                    @endif
                                @elseif(Auth()->user()->role == 'admin')
                                    <form action="{{ url('admin/requestListing/delete') . '/' . $booking['id'] }}">
                                        <button>
                                        <img src="{{asset('images/table/delete.svg')}}" alt="">
                                        </button>
                                    </form>
                                @endif
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
            </tbody>
        </table>
        <div class="col d-flex justify-content-center">
            {{ $bookings->links("pagination::bootstrap-4") }}
        </div>
</div>
@endsection

@section('custom-js')
<script>
    @if($status = Session::get('approved'))
        $(document).ready(function() {
            Swal.fire({
            icon: 'success',
            title: 'Approved',
            text: "Request Listing Approved!", 
        });
    });
    @elseif($status = Session::get('delete'))
        $(document).ready(function() {
                Swal.fire({
                icon: 'success',
                title: 'Delete',
                text: "Request Listing Berhasil Dihapus!", 
            });
        });
    @endif
    @if($status = Session::get('rejected'))
    $(document).ready(function() {
            Swal.fire({
            icon: 'success',
            title: 'Rejected',
            text: "Request Listing Rejected", 
        });
    });
    @endif
</script>
@endsection
