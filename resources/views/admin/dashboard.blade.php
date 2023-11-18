@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">

@section('content')
@extends('layouts.base')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>
    <h2>Purchasing Staff</h2>
    <br>
        <a href="{{ action('App\Http\Controllers\Admin\DashboardController@addStaff') }}"><button type="button" class="btn btn-secondary">Add Employee</button></a>
        <br><br>
        <table id="staff" class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th style = "width: 20%;">Action</th>
            </tr>
            @foreach ($users as $key => $item)
            <tr style="vertical-align: middle;">
                {{--  Proper output encoding  --}}
                <td >{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <a role="button" href="{{ action('App\Http\Controllers\Admin\DashboardController@showData', $item->id) }}" class="btn btn-secondary btn-icon fas fa-edit"> <span class="material-icons-outlined"></span></a>
                    <a role="button" href="{{ action('App\Http\Controllers\Admin\DashboardController@delete', $item->id) }}" class="btn btn-danger btn-icon fas fa-trash-alt"> <span class="material-icons-outlined"></span></a>
                    <i class="bi bi-trash"></i>
                </td>
            </tr>
            @endforeach
        </table>   
    </div>
</div>
</div>
@endsection

