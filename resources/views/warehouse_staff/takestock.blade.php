@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">

@section('content')
@extends('layouts.warehousebase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>        
        
    <h2>Stock Take</h2>
    <br>
    <a href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@addNewStockTake') }}"><button type="button" class="btn btn-secondary">Add New</button></a>
    <br><br>
    <table id="staff" class="table table-striped table-bordered">
        <tr>
            <th>Doc No</th>
            <th>Location</th>
            <th>Date</th>
            <th style = "width: 11%;">Action</th>
        </tr>
        @foreach ($stocks as $key => $item)
        <tr style="vertical-align: middle;">
            <td >{{ $item->doc_no }}</td>
            <td>{{ $item->location }}</td>
            <td>{{ $item->doc_date }}</td>
            <td>
            <a href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@showData', $item->doc_no) }}"><button type="button" class="btn btn-primary btn-icon fas fa-eye"></button></a>
            </td>
        </tr>
        @endforeach
    </table>  
    </div>
</div>

</div>
@endsection

