@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/admin/Table.css')}}">
@endsection

@section('content')
<div class="container pt-5">
        <div class="ataslist row justify-content-between py-5">
            <div class="judul col-lg-6 col-md-6 col-12 row ">
                <span style="color: #372074;">Facilities</span>
                <span style="color: #FFB13E;">Listing</span>
            </div>
            <div class="buttons col-lg-6 col-md-6 col-12 row justify-content-lg-end justify-content-md-end p-2">
                @if(Auth()->user()->role == 'admin')
                    <a href="{{ url('admin/facilities/create') }}"><button type="button" class="btn btn-light px-4 ml-lg-0 ml-3">Add</button></a>
                @elseif(Auth()->user()->role == 'management')
                    <a href="{{ url('manager/facilities/create') }}"><button type="button" class="btn btn-light px-4 ml-lg-0 ml-3">Add</button></a>
                @endif
            </div>
        </div>
    </div>
<div class="container box-facility d-flex align-items-center justify-content-center flex-column">
        <table id="example" class="w-100 table table-striped " style="width:100%">
            <thead>
                <tr class="text-center">
                    <th width="10%">No</th>
                    <th width="30%">Image</th>
                    <th width="40%">Name</th>
                    <th width="20%">Operation</th>
                </tr>
            </thead>
            <tbody>
                    @php $i = 0;  @endphp
                    @foreach($facilityListing as $fasility)
                    @php
                        $i++;
                    @endphp
                    <tr class="text-center">
                        <td class="text-center align-middle">{{ $i }}</td>
                        <td class="text-center align-middle"><img src="{{ asset('storage/Images/Fasilitas/') . '/' . $fasility['image'] }}" alt="" width="60%" height="100%"></td>
                        <td class="text-center align-middle">{{ $fasility['fasilityName'] }}</td>
                        <td class="text-center align-middle">
                            <div class="d-flex justify-content-center operation">
                                @if(Auth()->user()->role == 'admin')
                                <form action="{{ url('admin/facilities/form') . '/' . $fasility['id'] }}" method="GET">
                                @elseif(Auth()->user()->role == 'management')
                                <form action="{{ url('manager/facilities/form') . '/' . $fasility['id'] }}" method="GET">
                                @endif
                                    <button type="submit">
                                      <img src="{{asset('images/table/edit.svg')}}" alt="">
                                    </button>
                                </form>
                                @if(Auth()->user()->role == 'admin')
                                <form action="{{ url('admin/facilities/delete') . '/' . $fasility['id'] }}" method="GET">
                                @elseif(Auth()->user()->role == 'management')
                                <form action="{{ url('manager/facilities/delete') . '/' . $fasility['id'] }}" method="GET">
                                @endif
                                    <button type="submit">
                                      <img src="{{asset('images/table/delete.svg')}}" alt="">
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="col d-flex justify-content-center">
            {{ $facilityListing->links("pagination::bootstrap-4") }}
        </div>
</div>

@endsection

@section('custom-js')
<script>
@if($status = Session::get('success'))
        $(document).ready(function() {
            Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "Fasilitas Berhasil Ditambahkan!", 
        });
    });
@elseif(session('status') == 'delete')
    $(document).ready(function() {
            Swal.fire({
            icon: 'success',
            title: 'Delete',
            text: "Fasilitas Berhasil Dihapus!", 
        });
    });
@endif
@if($status = Session::get('info'))
$(document).ready(function() {
        Swal.fire({
        icon: 'success',
        title: 'Edit',
        text: "Fasilitas Berhasil Diedit!", 
    });
});
 @endif
</script>
    
@endsection
