<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<div class="wrapper">
    <div class="sidebar">
        <br><br><br><br>
        <h2>ETCM</h2>
        <ul>
            <li><a href="{{ action('App\Http\Controllers\Admin\DashboardController@index') }}"  style="text-decoration: none"><i class="fas fa-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;Purchasing Staff</a></li>
            <li><a href="{{ action('App\Http\Controllers\Admin\DashboardController@indexWarehouse') }}" style="text-decoration: none"><i class="fas fa-address-card"></i>&nbsp;&nbsp;&nbsp;&nbsp;Warehouse Staff</a></li>
            <li><a href="{{ action('App\Http\Controllers\Admin\DashboardController@logging') }}" style="text-decoration: none"><i class="fas fa-industry"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logging and Analytics</a></li>
        </ul> 
    </div>
    
</div>