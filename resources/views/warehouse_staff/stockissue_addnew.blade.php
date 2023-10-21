{{-- refer to takestock.blade.php --}}
@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">

@section('content')
@extends('layouts.warehousebase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
        <br>
        <h2>Add New Stock Issue</h2>
        <br>
        
          <form action="warehousestaff_addnewstockissue" method="POST">
                @csrf
                <div class="container1">
                <div class="row">
                  <div class="col-25">
                    <label for="invoice_prefix">Invoice Prefix</label>
                  </div>
                  <div class="col-75">
                    <input type="text" class="form-control" name="invoice_prefix"  placeholder="Invoice Prefix" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="date">Date</label>
                  </div>
                  <div class="col-75">
                    <input type="date" class="form-control" name="date" placeholder="Date">
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="customer">Customer</label>
                  </div>
                  <div class="col-75">
                    <input type="text" class="form-control" name="customer" placeholder="Customer">
                  </div>
                </div>
      </div>

  <br>
  <table id="staff" class="table table-striped table-bordered">
    <tbody>
    <tr>
      <th>Code</th>
      <th>Name</th>
      <th>Qty/UOM</th>
      <th>Location</th>
      <th>Description</th>
      <th width="8%">Action</th>
    </tr>
    <tr>
      <td><input type="text" id="0" class="form-control" onkeyup="GetDetail(this.value, this.id)" name="prod_code[]"  value="" placeHolder="Product Code" ></td>
      <td><input type="text" id="product_name0" class="form-control" name="prod_name[]" placeHolder="Product Name" ></td>
      <td><input type="number" id="quantity0" min="0" class="form-control" name="qty[]" placeHolder="Quantity" ></td>
      <td><input type ="text"id="location0" class="form-control" name="location[]" placeHolder="Location" ></td>
      <td><input type="text" placeHolder="Remark" class="form-control" name="remark[]"></td>
      <td><input type="button" id="delPOIbutton" class="button button7" value="-" onclick="deleteRow(this)" />
      <input type="button" class="button button8" id="addmorePOIbutton" style="float:right;" value="+" onclick="insRow()" /></td>
    </tr>
  </tbody>
  </table>
  <a><button type="submit" class="btn btn-success">Confirm</button></a>
  <a role="button" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@stockIssue') }}" class="btn btn-secondary">Back</a>
</form>
<br><br>
    </div>
</div>
<style>
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
    x.appendChild(new_row);
  }
  
  // onkeyup event will occur when the user 
            // release the key and calls the function
            // assigned to this event
            function GetDetail(str, code) {
                if (str.length == 0) {
                    document.getElementById("product_name").value = "";
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
                                ("product_name"+code).value = myObj[0];
                                // document.getElementById
                                // ("quantity"+code).value = myObj[1];
                                document.getElementById
                                ("location"+code).value = myObj[2];
                              
                            // Assign the value received to
                            // last name input field
                            // document.getElementById(
                            //     "last_name").value = myObj[1];
                        }
                    };
      
                    // xhttp.open("GET", "filename", true);
                    xmlhttp.open("GET", "/warehousestaff_retrievestockreceived/" + str, true);
                      
                    // Sends the request to the server
                    xmlhttp.send();
                }
            }</script>
</div>
@endsection