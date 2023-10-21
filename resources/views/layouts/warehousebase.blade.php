<!-- Side Menu Bar -->
<link href="main.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="wrapper">
    <div class="sidebar">
        <br><br><br><br>
        <h2>ETCM</h2>
        <ul>
        <li><a role="button" class="dropdown-btn" style="text-decoration: none"><i class="fas fa-address-card"></i>&nbsp;&nbsp;&nbsp;&nbsp;Stock<i class="fas fa-caret-down"></i></a>
  </button>
  <div class="dropdown-container">
    <a style="text-decoration: none;" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@stockAdjustment') }}">  &nbsp;  &nbsp;  &nbsp; <small> Stock Adjustment</small> </a>
    <a style="text-decoration: none;" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@stockIssue') }}">  &nbsp;  &nbsp;  &nbsp; <small> Stock Issue</small> </a>
    <a style="text-decoration: none;" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@stockReceived') }}">  &nbsp;  &nbsp;  &nbsp; <small> Stock Received</small> </a>
    <a style="text-decoration: none;" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@stockTake') }}">  &nbsp;  &nbsp;  &nbsp; <small> Stock Take</small> </a>
  </div></li>
  
  <li><a role="button" class="dropdown-btn" style="text-decoration: none"><i class="fas fa-bars"></i>&nbsp;&nbsp;&nbsp;&nbsp;Reports<i class="fas fa-caret-down"></i></a>
  </button>
  <div class="dropdown-container">
    <a style="text-decoration: none;" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@stockReport') }}">  &nbsp;  &nbsp;  &nbsp; <small> Stock History</small> </a>
    <a style="text-decoration: none;" href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@lowStockAlert') }}">  &nbsp;  &nbsp;  &nbsp; <small> Low Stock Alert</small> </a>
  </div></li>
  <li><a href="{{ action('App\Http\Controllers\WarehouseStaff\DashboardController@productMaintenance') }}"  style="text-decoration: none"><i class="fas fa-check-square"></i>&nbsp;&nbsp;&nbsp;&nbsp;Product</a></li>
    </ul>
    </div>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');
    
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
      }
    
      body{
         background-color: #f3f5f9;
      }
    
      .wrapper{
        display: flex;
        position: relative;
      }
    
      .wrapper .sidebar{
        width: 200px;
        height: 100%;
        background: #140b42;
        padding: 0px 0px;
        position: fixed;
      }
    
      .wrapper .sidebar h2{
        color: #fff;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 30px;
      }
    
      .wrapper .sidebar ul{
        padding-left: 0px;
      }
    
      .wrapper .sidebar ul li{
        padding: 15px 0px 15px 0px;
        border-bottom: 1px solid #bdb8d7;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        border-top: 1px solid rgba(255,255,255,0.05);
      }
    
      /* Style the sidenav links and the dropdown button */
      .dropdown-btn {
        padding: 0px;
        text-decoration: none;
        font-size: 15px;
        color: #f5eeee;
        display: block;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        outline: none;
      }
    
      .dropdown-container {
        display: none;
        background-color: #282348;
        padding-left: 8px;
      }
    
    
      .wrapper .sidebar ul li a{
        color: #fdfdfd;
        display: block;
      }
    
      .wrapper .sidebar ul li a .fas{
        width: 25px;
      }
    
      .dropdown-container a{
        padding: 10px 0px;
        position: relative;
      }
    
      .dropdown-container a:hover{
        padding: 10px 15px;
        position: relative;
        transition-duration: 0.2s;
      }
      
      .wrapper .sidebar ul li:hover{
        background-color: #140b42;
        padding-left: 0px;
      }
    
      .wrapper .sidebar ul li:hover a{
        color: rgb(255, 255, 255);
      }
    
      .wrapper .main_content{
        width: 100%;
        margin-left: 200px;
      }
    
      .wrapper .main_content .header{
        padding: 20px;
        background: #fff;
        color: #717171;
        border-bottom: 1px solid #e0e4e8;
      }
    
      .wrapper .main_content .info{
        margin: 20px;
        color: #717171;
        line-height: 25px;
      }
    
      .wrapper .main_content .info div{
        margin-bottom: 20px;
      }
    
      .fas{
          padding: 12px;
      }
    
      .mycontent{
        margin-left: 250px;
      }
    
      .alert-danger{
        width:870px;
      }
    
        </style>
    <script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }
    </script>
</div>