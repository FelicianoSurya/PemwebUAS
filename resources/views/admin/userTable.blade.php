@extends('layouts.app')

@section('custom-css')
<!-- link css -->
@endsection

@section('content')
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($news as $new){ ?>
                <tr>
                    <td>1</td>
                    <td>Anooo</td>
                    <td>ano@dea.com</td>
                    <td>Manager</td>
                </tr>
            <?php $no++; } ?>
        </tbody>
    </table>
@endsection

@section('custom-js')
<script>
    $(document).ready(function() {
    $('#example').DataTable();
    } );
</script>
    
@endsection
