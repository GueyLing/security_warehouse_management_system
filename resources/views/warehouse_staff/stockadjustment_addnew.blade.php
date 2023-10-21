@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">
@section('content')
@extends('layouts.warehousebase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>
    <h2>Add New Stock Adjustment</h2><br>
    <form action="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@storeStockAdjustment') }}" method="POST" name="add_name" id="add_name">
      {{ csrf_field() }}
      <div class="container1">
        <div class="row">
          <div class="col-25">
            <label for="invoice-prefix">Invoice Prefix</label>
          </div>
          <div class="col-75">
            <input type="text" class="form-control" id="invoice_prefix" name="invoice_prefix" placeholder="Invoice Prefix" required>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="date">Date</label>
          </div>
          <div class="col-75">
            <input type="date" class="form-control" id="date" name="date" placeholder="Date">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="customer">Description</label>
          </div>
          <div class="col-75">
            <input type="text" class="form-control" id="description" name="description" placeholder="Description">
          </div></div>
      </div>
      <br>
      <div class="table-responsive">
        <table id="staff" class="table table-striped table-bordered">
<tbody>
<tr>
<th>Code</th>
<th style="width:20%">Name</th>
<th>Location</th>
<th>Current Qty</th>
<th>Adjusted Qty</th>
<th>Variance</th>
<th>Remark</th>
<th width="8%">Action</th>
</tr>
<tr>
<td><input type="text" id ="0" name="code[]" onkeyup="GetDetail(this.value, this.id)" value="" class="form-control" placeHolder="Code"></td>
<td><input type="text" id="name0" name="name[]" class="form-control" placeHolder="Product Name" readonly></td>
<td><input type="text" id="location0" name="location[]" class="form-control" placeHolder="Location" readonly></td>
<td><input type="text" id="quantity0" name="quantity_available[]" class="form-control" placeHolder="Quantity" onkeyup="subtract();" readonly></td>
<td><input type="text" min="0" name="new_quantity[]" class="form-control" onkeyup="subtract();" placeHolder="New Qty"></td>
<td><input type="number" min="0" class="form-control" name="quantity_adjusted[]" placeHolder="Variance" readonly></td>
<td><input type="text" name="remark[]" placeHolder="Remark" class="form-control"></td>
<td><input type="button" id="delPOIbutton" class="button button7" value="-" onclick="deleteRow(this)" />
<input type="button" class="button button8" id="adds" style="float:right;" value="+" onclick="insRow()" /></td>
</tr>
</tbody>
</table>
<a><button type="submit" class="btn btn-success">Confirm</button></a>
<a role="button" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@stockAdjustment') }}" class="btn btn-secondary">Back</a>
      </div>
 </form>
  </div>
</div>
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
          <script>
            function insRow() {
    console.log('hi');
    var x = document.getElementById('staff').getElementsByTagName('tbody')[0];
    var new_row = x.rows[1].cloneNode(true);
    var len = x.rows.length;
    var inp = new_row.cells[0].getElementsByTagName('input')[0];
        inp.id += len;
        inp.value = '';
        var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
        inp1.id += len;
        inp1.value = '';
        var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
        inp2.id += len;
        inp2.value = '';
        var inp3 = new_row.cells[3].getElementsByTagName('input')[0];
        inp3.id += len;
        inp3.value = '';
        var inp4 = new_row.cells[4].getElementsByTagName('input')[0];
        inp4.id += len;
        inp4.value = '';
        var inp5 = new_row.cells[5].getElementsByTagName('input')[0];
        inp5.id += len;
        inp5.value = '';
    x.appendChild(new_row);
  }

  function deleteRow(row) {
    var x=document.getElementById('staff');
     var len = x.rows.length;
     if(len>2){
       var i=row.parentNode.parentNode.rowIndex;
       document.getElementById('staff').deleteRow(i);
     }
     else{
       alert("Can't delete the first row");
     }
}

            $(document).ready(function(){
      $('#submit').click(function(){
           $.ajax({
                url:"/warehousestaff_storestockadjustment",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(response)
                {
                     console.log(response);
                }
           });
      });
 });
      
            // onkeyup event will occur when the user 
            // release the key and calls the function
            // assigned to this event
            function GetDetail(str, code) {
                if (str.length == 0) {
                    document.getElementById("name").value = "";
                    return;
                }
                else {
      
                    // Creates a new XMLHttpRequest object
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
      
                        // Defines a function to be called when
                        // the readyState property changes
                        if (this.readyState == 4 && 
                                this.status == 200) {
                              
                            // Typical action to be performed
                            // when the document is ready
                            var myObj = JSON.parse(this.responseText);
      
                            // Returns the response data as a
                            // string and store this array in
                            // a variable assign the value 
                            // received to first name input field
                              
                            document.getElementById
                                ("name"+code).value = myObj[0];
                                document.getElementById
                                ("quantity"+code).value = myObj[1];
                                document.getElementById
                                ("location"+code).value = myObj[2];
                              
                            // Assign the value received to
                            // last name input field
                            // document.getElementById(
                            //     "last_name").value = myObj[1];
                        }
                    };
      
                    // xhttp.open("GET", "filename", true);
                    xmlhttp.open("GET", "/warehousestaff_retrieve/" + str, true);
                      
                    // Sends the request to the server
                    xmlhttp.send();
                }
            }
        </script>
<script>
  function subtract() {
  
var h1 = document.getElementsByName("quantity_available[]");
console.log(h1)
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
@endsection