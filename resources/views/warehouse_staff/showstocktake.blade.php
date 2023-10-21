@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">

@section('content')
@extends('layouts.warehousebase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
        <br>        
        <h2>View Stock Take</h2>
        <br>
        <label for="description">Location:</label>
        {{ $stocks[0]->location }}<br>
        <label for="doc_no">Doc No:</label>
        {{ $stocks[0]->doc_no }}<br>
        <label for="doc_date">Doc Date:</label>
        {{ $stocks[0]->doc_date }}<br>
        <label for="description">Description:</label>
        {{ $stocks[0]->description }}<br>
    <br>
        <table id="staff" class="table table-striped table-bordered">
            <tr>
                <th>Product Name</th>
                <th>Code</th>
                <th>Quantity Available</th>
                <th>New Quantity on hand</th>
                <th>Quantity Adjusted</th>
                <th>Remark</th>
            </tr>
            @foreach ($stocks as $key => $item)
            <tr style="vertical-align: middle;">
                <td >{{ $item->product_name }}</td>
                <td >{{ $item->code }}</td>
                <td >{{ $item->quantity_available }}</td>
                <td>{{ $item->new_quantity }}</td>
                <td>{{ $item->quantity_adjusted }}</td>
                <td>{{ $item->remark }}</td>
            </tr>
            @endforeach
        </table>  
        <a role="button" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@stockTake') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
</div>
@endsection

