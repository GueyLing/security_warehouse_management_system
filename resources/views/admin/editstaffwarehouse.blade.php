@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">

@section('content')
@extends('layouts.base')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>
    <h2>Edit Warehouse Staff</h2>
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
    <form action="{{ action('App\Http\Controllers\Admin\DashboardController@editWarehouse') }}" method="POST">
    <div class="form-group">
        {{ csrf_field() }}
    <input type="hidden" name="id" value={{ $users->id }}>
    <label for="name">Name:</label><br>
    <input type="text" value="{{ (Input::old('name')) ?: $users->name }}" class="form-control w-75" id="name" name="name"><br>

    <label for="email">Email:</label><br>
    <input type="text" value="{{ (Input::old('email')) ?: $users->email }}" class="form-control w-75" id="email" name="email"><br>

    <label for="password">Password:</label><br>
    <input type="text" class="form-control w-75" id="password" name="password"><br>

    <label for="phone_no">Phone Number:</label><br>
    <input type="text" class="form-control w-75" id="phone_no" name="phone_no" value="{{ (Input::old('phone_no')) ?: $users->phone_no }}"><br>

    <label for="ic_passport_no">IC Number/ Passport Number:</label><br>
    <input type="text" class="form-control w-75" id="ic_passport_no" name="ic_passport_no" value="{{ (Input::old('ic_passport_no')) ?: $users->ic_passport_no }}"><br>

    <label for="role">Role:</label><br>
    <select class="form-control w-75" name="role" id="role">
        <option value="">--Select a role--</option>
        <option value="warehouse_staff" {!! old('role', $users->role) == "warehouse_staff" ? 'selected="selected"' : '' !!}>Warehouse Staff</option>
        <option value="purchasing_staff" {!! old('role', $users->role) == "purchasing_staff" ? 'selected="selected"' : '' !!}>Purchasing Staff</option>
    </select>
</div>
<br>
<a><button type="submit" class="btn btn-success">Update</button></a>
<a role="button" href="{{ action('App\Http\Controllers\Admin\DashboardController@indexWarehouse') }}" class="btn btn-secondary">Cancel</a>
</form>
    </div>
</div>
</div>
@endsection

