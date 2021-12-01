@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/management/request.css')}}">
@endsection

@section('content')
<div class="container pt-5">
        <div class="ataslist row justify-content-between py-5">
            <div class="judul col-lg-6 col-md-6 col-12 row ">
                <span style="color: #372074;">User</span>
                <span style="color: #FFB13E;">Listing</span>
            </div>
            <div class="buttons col-lg-6 col-md-6 col-12 row justify-content-lg-end justify-content-md-end p-2">
                <button type="button" class="btn btn-light mx-3">Waiting</button>
                <button type="butotn" class="btn btn-light mx-3">All Request</button>
            </div>
        </div>
    </div>
<div class="container d-flex flex-column align-items-center justify-content-center">
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
                    <th width="10%">Operation</th>
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
                                Waiting
                            @elseif($booking['status'] == 'approved')
                                Approved
                            @elseif($booking['status'] == 'rejected')
                                Rejected
                            @endif
                        </td>
                        <td class="text-center align-middle">
                            @if($booking['status'] == 'waiting')
                            <div class="d-flex justify-content-center align-items-center operation">
                                <form href="">
                                    <input type="hidden" name="button" value="Edit">
                                    <button>
                                      <img src="{{asset('images/table/check.svg')}}" alt="">
                                    </button>
                                </form>
                                <form href="">
                                    <input type="hidden" name="button" value="Delete">
                                    <button>
                                      <img src="{{asset('images/table/cross.svg')}}" alt="">
                                    </button>
                                </form>
                            </div>
                            @else
                            Done
                            @endif
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        <div width="20%">
            {{ $bookings->links() }}
        </div>
</div>
@endsection

@section('custom-js')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection
