@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">
@section('content')
@extends('layouts.warehousebase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>
    <h2>View Stock Adjustment</h2>
    <br>
    <div class="container1">
      <form action="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@storeStockAdjustment') }}" method="POST">
        {{ csrf_field() }}
          <div class="row">
            <div class="col-25">
              <label for="invoice-prefix">Invoice Prefix</label>
            </div>
            <div class="col-75">
              <input type="text" class="form-control" id="invoice_prefix" name="invoice_prefix" value="{{ $stocks[0]->invoice_prefix }}" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="date">Date</label>
            </div>
            <div class="col-75">
              <input type="text" class="form-control" id="date" name="date" value="{{ $stocks[0]->date }}" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="customer">Description</label>
            </div>
            <div class="col-75">
              <input type="text" class="form-control" id="description" name="description" value="{{ $stocks[0]->description }}" readonly>
            </div>
          </div>
        </div>
        <br>
        <table id="staff" class="table table-striped table-bordered">
            <tbody>
            <tr>
              <th>Code</th>
              <th style="width:20%">Name</th>
              <th>Current Qty</th>
              <th>Adjusted Qty</th>
              <th>Variance</th>
              <th>Location</th>
              <th>Remark</th>
            </tr>
              @foreach ($stocks as $key => $item)
            <tr style="vertical-align: middle;">
                <td >{{ $item->code }}</td>
                <td >{{ $item->name }}</td>
                <td >{{ $item->quantity_available }}</td>
                <td>{{ $item->new_quantity }}</td>
                <td>{{ $item->quantity_adjusted }}</td>
                <td>{{ $item->location }}</td>
                <td>{{ $item->remark }}</td>
            </tr>
            @endforeach
          </tbody>
          </table>
       
          <a role="button" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@stockAdjustment') }}" class="btn btn-secondary">Back</a>
        </form>
</div>
<style>    
    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }
    
    .container1 {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
      margin-right: 50px;
    }
    
    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }
    
    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }
    
    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    
    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }    

    .button7 {
  background-color: red;
  color: white;
  border: none;
  width: 30px;
  height: 30px;
  border-radius: 4px;
}

.button8 {
  background-color: rgb(55, 105, 241);
  color: white;
  border: none;
  width: 30px;
  height: 30px;
  border-radius: 4px;
}
    </style>
</div>
</div>
@endsection