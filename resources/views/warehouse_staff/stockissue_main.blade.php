{{-- refer to takestock.blade.php --}}
@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">

@section('content')
@extends('layouts.warehousebase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>
    <h2>Stock Issue</h2>
    <br>
    <a href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@addNewStockIssue') }}"><button type="button" class="btn btn-secondary">Add New</button></a>
    <br><br>
    <table id="staff" class="table table-striped table-bordered">
        <tr>
          <th>Invoice Prefix</th>
          <th>Date</th>
          <th>Customer</th>
          <th>Action</th>
        </tr>
        @foreach ($datas as $key => $stockissue)
          <tr>
            <td>{{ $stockissue->invoice_prefix }}</td>
            <td>{{ $stockissue->date }}</td>
            <td>{{ $stockissue->customer }}</td>
            <td><a href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@showStockIssue', $stockissue->invoice_prefix) }}"><button type="button" class="btn btn-primary btn-icon fas fa-eye"></button></a></td>
          </tr>
          @endforeach
        
      </table>
    </div>
</div>
</div>
@endsection