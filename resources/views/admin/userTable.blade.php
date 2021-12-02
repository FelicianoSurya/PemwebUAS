@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/admin/Table.css')}}">
@endsection

@section('content')
<div class="container pt-5">
        <div class="ataslist row justify-content-between py-5">
            <div class="judul col-lg-6 col-md-6 col-12 row ">
                <span style="color: #372074;">User</span>
                <span style="color: #FFB13E;">Listing</span>
            </div>
            <div class="buttons col-lg-6 col-md-6 col-12 row justify-content-lg-end justify-content-md-end p-2">
                <a href="{{ url('management/create') }}"><button type="button" class="btn btn-light px-4">Add</button></a>
            </div>
        </div>
    </div>
<div class="container d-flex align-items-center justify-content-center">
        <table id="example" class="table table-striped " style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0; @endphp
                @foreach($users as $user)
                    @php $i++ @endphp
                    <tr class="text-center">
                        <td>{{ $i }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>@if($user['role'] == 'management')
                                Employee
                            @else
                                User
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center operation">
                                <form action="{{ url('management/form') . '/' . $user['id']}}">
                                    <button>
                                      <img src="{{asset('images/table/edit.svg')}}" alt="">
                                    </button>
                                </form>
                                <form action="{{ url('management/delete') . '/' . $user['id'] }}">
                                    <button>
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
    @if($status = Session::get('success'))
        $(document).ready(function() {
            Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "User Berhasil Ditambahkan!", 
        });
    });
    @elseif($status = Session::get('delete'))
        $(document).ready(function() {
                Swal.fire({
                icon: 'success',
                title: 'Delete',
                text: "User Berhasil Dihapus!", 
            });
        });
    @endif
    @if($status = Session::get('edit'))
    $(document).ready(function() {
            Swal.fire({
            icon: 'success',
            title: 'Edit',
            text: "User Berhasil Diedit!", 
        });
    });
    @endif
</script>
    
@endsection
