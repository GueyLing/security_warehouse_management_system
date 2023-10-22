@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">

@section('content')
@extends('layouts.warehousebase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>        
        
    <h2>Product Maintenance</h2>
    <br>

    <a href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@addNewProduct') }}"><button type="button" class="btn btn-secondary">Add New</button></a>
    <br><br>
    <table id="staff" class="table table-striped table-bordered">
        <tr>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Location</th>
            <th>Low Stock Level</th>
            <th>Action</th>
        </tr>
        @foreach ($stocks as $key => $item)
        <tr style="vertical-align: middle;">
            <td >{{ $item->code }}</td>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->location }}</td>
            <td>{{ $item->low_stock_alert }}</td>
            <td><a role="button" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@showProductData', $item->id) }}" class="btn btn-secondary btn-icon fas fa-edit"> <span class="material-icons-outlined"></span></a>
            <a role="button" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@deleteProduct', $item->id) }}" class="btn btn-danger btn-icon fas fa-trash-alt"> <span class="material-icons-outlined"></span></a>
            <i class="bi bi-trash"></i>
            </td>
        </tr>
        @endforeach
    </table>  
    </div>
</div>

</div>
@endsection

