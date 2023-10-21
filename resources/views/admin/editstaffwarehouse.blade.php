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
</div>
<br>
<a><button type="submit" class="btn btn-success">Update</button></a>
<a role="button" href="{{ action('App\Http\Controllers\Admin\DashboardController@indexWarehouse') }}" class="btn btn-secondary">Cancel</a>
</form>
    </div>
</div>
</div>
@endsection

