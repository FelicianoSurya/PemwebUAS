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
                <button type="button" class="btn btn-light px-4">Add</button>
            </div>
        </div>
    </div>
<div class="container d-flex align-items-center justify-content-center">
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
                        <td>{{ $i }}</td>
                        <td><img src="{{ asset('storage/Images/Fasilitas/') . '/' . $fasility['image'] }}" alt="" width="60%" height="100%"></td>
                        <td>{{ $fasility['fasilityName'] }}</td>
                        <td>
                            <div class="d-flex justify-content-center operation">
                                <form href="">
                                    <input type="hidden" name="button" value="Edit">
                                    <button type="submit">
                                      <img src="{{asset('images/table/edit.svg')}}" alt="">
                                    </button>
                                </form>
                                <form href="">
                                    <input type="hidden" name="button" value="Delete">
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
</div>

@endsection

@section('custom-js')
<script>
    $(document).ready(function() {
	$('#example').DataTable();
 } );
</script>
    
@endsection
