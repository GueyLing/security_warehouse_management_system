@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">

@section('content')
@extends('layouts.base')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>
    <h2>Add New Purchasing Staff</h2>
    <br> 
    @if(\Session::has('error'))
    <div class="alert alert-danger">
        {!! \Session::get('error') !!}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
    <div>{{$error}}</div>
    @endforeach
    </div>
    @endif
    <form action="{{ action('App\Http\Controllers\Admin\DashboardController@store') }}" method="POST">
    <div class="form-group">
        {{ csrf_field() }}
    <label for="name">Name:</label><br>
    <input type="text" class="form-control w-75" id="name" name="name" value="{{old('name')}}"><br>

    <label for="email">Email:</label><br>
    <input type="text" class="form-control w-75" id="email" name="email" value="{{old('email')}}"><br>

    <label for="password">Password:</label><br>
    <input type="text" class="form-control w-75" id="password" name="password" value="{{old('password')}}"><br>

    {{-- <label for="role">Role:</label><br>
    <select class="form-control w-75" name="role" id="role">
    <option value="">--Select a role--</option>
    <option value="purchasing_staff" @if (old('role') == "purchasing_staff") {{ 'selected' }} @endif>Purchasing Staff</option>
    <option value="warehouse_staff" @if (old('role') == "warehouse_staff") {{ 'selected' }} @endif>Warehouse Staff</option>
    </select> --}}
</div>
<br>
<a><button type="submit" class="btn btn-success">Add</button></a>
<a role="button" href="{{ action('App\Http\Controllers\Admin\DashboardController@index') }}" class="btn btn-secondary">Cancel</a>
</form>
    </div>
</div>
</div>
@endsection

