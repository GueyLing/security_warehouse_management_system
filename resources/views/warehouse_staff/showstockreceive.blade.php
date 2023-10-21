@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">

@section('content')
@extends('layouts.warehousebase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
        <br>        
        <h2>View Stock Receive</h2>
        <br>
        <label for="docNo">Doc No:</label>
        {{ $data[0]->docNo }}<br>
        <label for="docDate">Doc Date:</label>
        {{ $data[0]->docDate }}<br>
        <label for="description">Description:</label>
        {{ $data[0]->description }}<br>
    <br>
        <table id="staff" class="table table-striped table-bordered">
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Location</th>
                <th>Description</th>
            </tr>
            @foreach ($data as $key => $stockreceive)
            <tr style="vertical-align: middle;">
                <td ><input type="text" class="form-control" name="product_code[]" value="{{ $stockreceive->product_code }}" readonly></td>
                <td ><input type="text" class="form-control" name="product_name[]" value="{{ $stockreceive->product_name }}" readonly></td>
                <td ><input type="text" class="form-control" name="quantity[]" value="{{ $stockreceive->quantity }}" readonly></td>
                <td><input type="text" class="form-control" name="location[]" value="{{ $stockreceive->location }}" readonly></td>
                <td><input type="text" class="form-control" name="remark[]" value="{{ $stockreceive->remark }}" readonly></td>
            </tr>
            @endforeach
        </table>  
        <a role="button" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@stockReceived') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
</div>
@endsection