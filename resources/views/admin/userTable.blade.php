@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/admin/userTable.css')}}">
@endsection

@section('content')
<div class="container pt-5">
        <div class="ataslist row justify-content-between py-5">
            <div class="judul col-lg-6 col-md-6 col-12 row ">
                <span style="color: #372074;">User</span>
                <span style="color: #FFB13E;">Listing</span>
            </div>
            <div class="buttons col-lg-6 col-md-6 col-12 row justify-content-lg-end justify-content-md-end p-2">
                <button type="button" class="btn btn-light px-4">Add</button>
            </div>
        </div>
    </div>
<div class="container d-flex align-items-center justify-content-center">
        <table id="example" class="table table-striped " style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                    <tr class="text-center">
                        <td>1</td>
                        <td>Anooo</td>
                        <td>ano@dea.com</td>
                        <td>Manager</td>
                        <td>
                            <div class="d-flex justify-content-around operation">
                                <form href="">
                                    <input type="hidden" name="button" value="Edit">
                                    <button>
                                      <img src="{{asset('images/table/edit.svg')}}" alt="">
                                    </button>
                                </form>
                                <form href="">
                                    <input type="hidden" name="button" value="Delete">
                                    <button>
                                      <img src="{{asset('images/table/delete.svg')}}" alt="">
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
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
