@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">
@section('content')
@extends('layouts.warehousebase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>
    <h2>Stock Adjustment</h2>
    <br>
    <a href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@addStockAdjustment') }}"><button type="button" class="btn btn-secondary">Add New</button></a>
    <br><br>
    <table id="staff" class="table table-striped table-bordered">
      <tr>
          <th style = "width: 20%;">Invoice Prefix</th>
          <th>Date</th>
          <th style = "width: 11%;">Action</th>
      </tr>
      @if(isset($stocks))
      @foreach ($stocks as $key => $item)
      <tr style="vertical-align: middle;">
          <td >{{ $item->invoice_prefix }}</td>
          <td>{{ $item->date }}</td>
          <td>
          <a href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@showDataStockAdjustment', $item->invoice_prefix) }}"><button type="button" class="btn btn-primary btn-icon fas fa-eye"></button></a>
          </td>
      </tr>
      @endforeach
      @endif
  </table>  
  <br>
</div>
</div>
</div>
@endsection