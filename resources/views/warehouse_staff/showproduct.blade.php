@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">
@section('content')
@extends('layouts.warehousebase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>
    <h2>Edit Product</h2><br>
    <form action="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@edit') }}" method="POST" name="add_name" id="add_name">
      {{ csrf_field() }}
      <div class="container1">
        <div class="row">
          <div class="col-25">
            @foreach ($stocks as $key => $item)
            <input type="text" class="form-control w-75" id="id" name="id" value="{{ $item->id }}" hidden>
            <label for="code">Code:</label>
            <input type="text" class="form-control w-75" id="code" name="code" value="{{ $item->code }}" required>
            <label for="product_name">Product Name:</label>
            <input type="text" class="form-control w-75" id="product_name" name="product_name" value="{{ $item->product_name }}" >
            <label for="location">Location:</label>
            <input type="text" class="form-control w-75" id="location" name="location" value="{{ $item->location }}" >
            <label for="low_stock_alert">Low Stock Alert:</label>
            <input type="number" class="form-control w-75" id="low_stock_alert" name="low_stock_alert" value="{{ $item->low_stock_alert }}" >
            @endforeach
    <br>
<a><button type="submit" class="btn btn-success">Confirm</button></a>
<a role="button" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@productMaintenance') }}" class="btn btn-secondary">Back</a>
     
 </form>
  </div>
</div>
</div>
@endsection