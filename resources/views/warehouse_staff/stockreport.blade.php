@extends('layouts.app')
<link href="/css/main.css" rel="stylesheet">

@section('content')
@extends('layouts.warehousebase')
<div class="main_content">
    <div class="header"> 
    <div class="mycontent">
    <br>        
        
    <h2>Stock History</h2>
    <br>
    <table id="staff" class="table table-striped table-bordered">
        <tr>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Location</th>
            <th>Activity</th>
            <th>Adjustment</th>
            <th>Current Quantity</th>
            <th>Date</th>
        </tr>
        @foreach ($activities as $key => $item)
        <tr style="vertical-align: middle;">
            <td >{{ $item->code }}</td>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->location }}</td>
            <td>{{ $item->activity }}</td>
            @if($item->variance>0) 
            <td>+{{ $item->variance }}</td>
            @else
      <td>{{ $item->variance }}</td>        
@endif
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->updated_at }}</td>
        </tr>
        @endforeach
    </table>  
    {{ $activities->links() }}
    </div>
</div>

</div>
@endsection

