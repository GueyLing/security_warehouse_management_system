Dear all, <br><br>

You receive this alert because the current stock of the following products are lower than the "Low Stock Alert Level"
threshold you have set.<br><br>

@foreach ($stocks as $key => $item)
<b>Product Name     :</b> {{ $item->product_name }}<br>
<b>Location         :</b> {{ $item->location }}<br>
<b>Current Quantity :</b> {{ $item->quantity }}<br>
<b>Alert If Below   :</b> {{ $item->low_stock_alert }}<br>
<br><br>
@endforeach