@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('content')
@extends('layouts.purchasingbase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>         
    <h2>Stock Summary</h2><br>
    <div class="search">
        <input type="search" name="search" id="search" 
        placeholder="Search Something Here" class="form-control w-75">
   </div>
    <br>
    <table id="staff" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Location</th>
            <th>Quantity</th>
        </tr></thead>
        <tbody class="alldata" style="border-width: thin;">
        @foreach ($stocks as $key => $item)
        <tr style="vertical-align: middle;">
            <td >{{ $item->code }}</td>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->location }}</td>
            <td>{{ $item->quantity }}</td>
        </tr>
        @endforeach
    </tbody>
        <tbody id="Content" class="searchdata" style="border-width: thin;">
        </tbody>
    </table>  
    </div>
</div>
<script>
    $('#search').on('keyup',function(){
       $value = $(this).val();

       if($value){
        $('.alldata').hide();
        $('.searchdata').show();
       }
       else{
        $('.alldata').show();
        $('.searchdata').hide();
       }

       $.ajax({
        type:'get',
        url:'{{ URL::to('/purchasingstaff_search') }}',
        data:{'search':$value},

        success:function(data){
            console.log(data);
            $('#Content').html(data) ;
        }
       });
    })
    </script>
</div>
@endsection