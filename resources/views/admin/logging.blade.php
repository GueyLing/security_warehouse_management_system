@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">

@section('content')
@extends('layouts.base')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>
    <h2>Logging and Analytics Information</h2>
    <br>
        <table id="staff" class="table table-striped table-bordered">
            <tr>
                <th>Admin Name</th>
                <th>Action Done</th>
                <th>Employee Name</th>
                <th>Time</th>
                {{-- <th style = "width: 20%;">Action</th> --}}
            </tr>
            @foreach ($users as $key => $item)
            <tr style="vertical-align: middle;">
                <td >{{ $item->admin_name }}</td>
                <td>{{ $item->action }}</td>
                <td>{{ $item->employee_name }}</td>
                <td>{{ $item->updated_at }}</td>
            </tr>
            @endforeach
        </table>   
    </div>
</div>
</div>
@endsection

