@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">
@section('content')
@extends('layouts.warehousebase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>
    <h2>Add New Product</h2><br>
    <form action="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@storeProduct') }}" method="POST" name="add_name" id="add_name">
      {{ csrf_field() }}
      <div class="container1">
        <div class="row">
          <div class="col-25">
            <label for="code">Code:</label>
            <input type="text" class="form-control w-75" id="code" name="code" required>
            <label for="product_name">Product Name:</label>
            <input type="text" class="form-control w-75" id="product_name" name="product_name">
            <label for="location">Location:</label>
            <input type="text" class="form-control w-75" id="location" name="location">
            <label for="low_stock_alert">Low Stock Alert:</label>
            <input type="number" class="form-control w-75" id="low_stock_alert" name="low_stock_alert">

    <br>
<a><button type="submit" class="btn btn-success">Confirm</button></a>
<a role="button" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@productMaintenance') }}" class="btn btn-secondary">Back</a>
     
 </form>
  </div>
</div>
</div>
@endsection