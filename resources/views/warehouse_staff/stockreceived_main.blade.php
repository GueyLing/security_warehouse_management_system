{{-- refer to takestock.blade.php --}}
@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">

@section('content')
@extends('layouts.warehousebase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
        <br>
        <h2>Stock Received</h2>
        <br>
        <a href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@addNewStockReceived') }}"><button type="button" class="btn btn-secondary">Add New</button></a>
        <br><br>
        
        <table id="staff" class="table table-striped table-bordered">
          <tr>
            <th>Doc No</th>
            <th>Doc Date</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
          @foreach ($data as $key => $stockreceive)
          <tr>
            <td>{{ $stockreceive->docNo }}</td>
            <td>{{ $stockreceive->docDate }}</td>
            <td>{{ $stockreceive->description }}</td>
            <td><a href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@showStockReceive', $stockreceive->docNo) }}"><button type="button" class="btn btn-primary btn-icon fas fa-eye"></button></a></td>
          </tr>
          @endforeach
        </table>
    </div>
</div>
</div>
@endsection
