@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('content')
@extends('layouts.warehousebase')
<div class="modal fade" id="selectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@selectLocation') }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Stock Take Location</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            {{-- <span aria-hidden="true">&times;</span> --}}
          </button>
        </div>
        <div class="modal-body">
            <label for="docno">Location:</label>
            <select name="location" class="form-control" id="location">
            <option value="">--Select Location--</option>
            @foreach($stocks as $stock)
            <option value="{{ $stock->location }}">{{ $stock->location }}</option>
            @endforeach
              </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>        
    <form action="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@store') }}" method="POST">
          {{ csrf_field() }}
    <h2>Add New Stock Take</h2>
    <br>
    <label for="description">Location:</label>
    <a><button type="button" class="btn btn-primary selectStock" style="padding: 2px 10px;">Select Location</button></a><br><br>
    <label for="doc_no">Doc No:</label>
    <input type="text" class="form-control w-75" id="docno" name="docno" required>
    <label for="doc_date">Doc Date:</label>
    <input type="date" class="form-control w-75" id="docdate" name="docdate">
    <label for="description">Description:</label>
    <input type="text" class="form-control w-75" id="description" name="description"><br style="line-height:15px;">
<br>
@if(isset($locations))
{{ $locations[0]->location }}
    <table id="staff" class="table table-striped table-bordered">
        <tr>
            <th>Product Name</th>
            <th>Code</th>
            <th>Quantity Available</th>
            <th>New Quantity on hand</th>
            <th>Quantity Adjusted</th>
            <th>Remark</th>
        </tr>
        <input type="hidden" class="form-control" name="location" value="{{ $locations[0]->location }}">
        @foreach ($locations as $key => $item)
        <tr style="vertical-align: middle;">
            <td ><input type="text" class="form-control" name="product_name[]" value="{{ $item->product_name }}" readonly></td>
            <td ><input type="text" class="form-control" name="code[]" value="{{ $item->code }}" readonly></td>
            <td ><input type="text" class="form-control" name="quantity_available[]" value="{{ $item->quantity }}" onkeyup="subtract();" readonly></td>
            <td><input type="text" class="form-control" name="new_quantity[]" value="{{ $item->quantity }}" onkeyup="subtract();"></td>
            <td><input type="text" class="form-control" name="quantity_adjusted[]" placeholder="0" readonly></td>
            <td><input type="text" class="form-control" name="remark[]"></td>
        </tr>
        @endforeach
        @endif
    </table>  
    <a><button type="submit" class="btn btn-success">Confirm</button></a>
    <a role="button" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@stockTake') }}" class="btn btn-secondary">Back</a>
</div>
</form>
</div>
<script>
    $(document).ready(function(){
        $('.selectStock').click(function(e){
            e.preventDefault();
            $('#selectModal').modal('show');
        });
    });

    function subtract() {
  var h1 = document.getElementsByName("quantity_available[]");
  for(var i = 0;i <h1.length; i++)
{
      var txtFirstNumberValue = document.getElementsByName("quantity_available[]")[i].value;
      var txtSecondNumberValue = document.getElementsByName('new_quantity[]')[i].value;
      var result = parseInt(txtSecondNumberValue) - parseInt(txtFirstNumberValue);
      if (!isNaN(result)) {
         document.getElementsByName('quantity_adjusted[]')[i].value = result;
      }}
}
</script>
</div>
@endsection

