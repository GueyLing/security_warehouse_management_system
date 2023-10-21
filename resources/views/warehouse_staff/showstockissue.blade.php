@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">

@section('content')
@extends('layouts.warehousebase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
        <br>        
        <h2>View Stock Issue</h2>
        <br>
        <label for="invoice_prefix">Invoice Prefix:</label>
        {{ $datas[0]->invoice_prefix }}<br>
        <label for="date">Date:</label>
        {{ $datas[0]->date }}<br>
        <label for="customer">Customer:</label>
        {{ $datas[0]->customer }}<br>
       
    <br>
        <table id="staff" class="table table-striped table-bordered">
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Location</th>
                <th>Remark</th>
            </tr>
            @foreach ($datas as $key => $stockissue)
            <tr style="vertical-align: middle;">
                <td ><input type="text" class="form-control" name="prod_code[]" value="{{ $stockissue->prod_code }}" readonly></td>
                <td ><input type="text" class="form-control" name="prod_name[]" value="{{ $stockissue->prod_name }}" readonly></td>
                <td ><input type="text" class="form-control" name="qty[]" value="{{ $stockissue->qty }}" readonly></td>
                <td><input type="text" class="form-control" name="location[]" value="{{$stockissue->location }}" readonly></td>
                <td><input type="text" class="form-control" name="remark[]" value="{{ $stockissue->remark }}" readonly></td>
            </tr>
            @endforeach
        </table>  
        <a role="button" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@stockIssue') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
</div>
@endsection