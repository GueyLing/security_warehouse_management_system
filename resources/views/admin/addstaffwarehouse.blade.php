@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">

@section('content')
@extends('layouts.base')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>
    <h2>Add New Warehouse Staff</h2>
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
    <form action="{{ action('App\Http\Controllers\Admin\DashboardController@storeWarehouse') }}" method="POST">
    <div class="form-group">
        {{ csrf_field() }}
    <label for="name">Name:</label><br>
    <input type="text" class="form-control w-75" id="name" name="name" value="{{old('name')}}"><br>

    <label for="email">Email:</label><br>
    <input type="text" class="form-control w-75" id="email" name="email" value="{{old('email')}}"><br>

    <label for="password">Password:</label><br>
    <input type="text" class="form-control w-75" id="password" name="password" value="{{old('password')}}"><br>

    <label for="phone_no">Phone Number:</label><br>
    <input type="text" class="form-control w-75" id="phone_no" name="phone_no" value="{{old('phone_no')}}"><br>

    <label for="ic_passport_no">IC Number/ Passport Number:</label><br>
    <input type="text" class="form-control w-75" id="ic_passport_no" name="ic_passport_no" value="{{old('ic_passport_no')}}"><br>
    
</div>
<a><button type="submit" class="btn btn-success">Add</button></a>
<a role="button" href="{{ action('App\Http\Controllers\Admin\DashboardController@indexWarehouse') }}" class="btn btn-secondary">Cancel</a>
<br><br>
</form>
    </div>
</div>
</div>
@endsection

