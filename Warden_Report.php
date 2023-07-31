<?php
include ("sessionhandler.php");
$conn =  mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'parcelDB');

//WEEK
$monday = date('Y-m-d', strtotime('monday this week'));
$sunday = date('Y-m-d', strtotime('sunday this week'));
$select_week_ready = "SELECT COUNT(*) FROM parcel WHERE Status='Ready to collect' AND date_collect BETWEEN '$monday' AND '$sunday'";
$select_week_collect = "SELECT COUNT(*) FROM parcel WHERE Status='Collected' AND date_collect BETWEEN '$monday' AND '$sunday'";

$result_ready = mysqli_query($conn, $select_week_ready);
if($result_ready){
    $data = mysqli_fetch_array($result_ready);
    $total_week_ready = $data[0];
}

$result_collect = mysqli_query($conn, $select_week_collect);
if($result_collect){
    $data = mysqli_fetch_array($result_collect);
    $total_week_collect = $data[0];
}

// MONTH
$month1st = date('Y-m-d', strtotime('first day of this month'));
$monthLast = date('Y-m-d', strtotime('last day of this month'));
$select_month_ready = "SELECT COUNT(*) FROM parcel WHERE Status='Ready to collect' AND date_collect BETWEEN '$month1st' AND '$monthLast'";
$select_month_collect = "SELECT COUNT(*) FROM parcel WHERE Status='Collected' AND date_collect BETWEEN '$month1st' AND '$monthLast'";

$result_month_ready = mysqli_query($conn, $select_month_ready);
if($result_month_ready){
    $data = mysqli_fetch_array($result_month_ready);
    $total_month_ready = $data[0];
}

$result_month_collect = mysqli_query($conn, $select_month_collect);
if($result_month_collect){
    $data = mysqli_fetch_array($result_month_collect);
    $total_month_collect = $data[0];
} 


//OVERALL
$query = "SELECT Status, count(*) as number FROM parcel GROUP BY status";  
$query_run = mysqli_query($conn, $query);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report of Warden</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheet1.css">
    <link rel="stylesheet" type="text/js" href="javascript1.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  

    <!--GRAPH WEEKLY-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Status', "Duration of Collection", { role: "style" } ],
          ['Ready to collect', <?php echo $total_week_ready?>, "#022e57"],
          ['Collected', <?php echo $total_week_collect?>, "#fb9300"],
          
        ]);

        var options = {
          title: 'Total Number of Parcel By Status Weekly'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('LineChart'));

        chart.draw(data, options);
      }
    </script>

    <!--GRAPH MONTHLY-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Status', "Duration of Collection", { role: "style" } ],
          ['Ready to collect', <?php echo $total_month_ready?>, "#022e57"],
          ['Collected', <?php echo $total_month_collect?>, "#fb9300"],
    
        ]);

        var options = {
          title: 'Total Number of Parcel By Status Monthly'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('column'));

        chart.draw(data, options);
      }
    </script>

    <!--GRAPH OVERALL-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Status', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($query_run))  
                          {  
                               echo "['".$row["Status"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Parcel By Status',  
                      //is3D:true,  
                      //pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script> 
    </script>
</head>

<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="Parcel.jpeg" alt="logo" height="70px" width="130px">
        </a>
        <p class="navbar-text navbar-right">Signed in as</p>
    </div>
</nav>
    <!---Navigation bar-->
    <!-- Change the nav bar based on the mockup interface  -->
    <div class="topnav">
        <a href="Warden_interface.php">Collected List</a>
        <a href="Warden_Report.php">Report</a>
        <a href="login.php" style="float:right">Logout</a>
   </div>
   <br>
   <br>
   <!--Table-->
   <div class="container-fluid">
       <div class="jumbotron">
           <div class="card">
               <div class="card-header">
                   <h2>Residency Warden</h2>
                 <h4 class="card-title">Report</h4>
               </div><br>
               <div class="card-body">
                <h3 align="center">Collection Report</h3>
                <br />
                <div class="card-body"><center>Total Number of Collection Weekly</center>
                    <div class="col-lg-6 m-auto">
                        <div class="card">
                            <div class="card-body"  style="background-color: #dbebd4;">
                                <div id="LineChart" style="width: 600px; height: 350;"></div>
                            </div>
                        </div>
                    </div>            
                </div>

               <div class="card-body"><center>Total Number of Collection Monthly</center>
                    <div class="col-lg-6 m-auto">
                        <div class="card">
                            <div class="card-body"  style="background-color: #dbebd4;">
                                <div id="column" style="width: 600px; height: 350;"></div>
                            </div>
                        </div>
                    </div>            
               </div>

               <div class="card-body"><center>Total Number of Parcel</center>
                    <div class="col-lg-6 m-auto">
                        <div class="card">
                            <div class="card-body"  style="background-color: #dbebd4;">
                                <div id="piechart" style="width: 600px; height: 350px;"></div>
                            </div>
                        </div>
                    </div>            
               </div>

             <br>

                </div>
            </div>
                   
       </div>
   </div>
   
   <footer>
       <center>
           Copyright 2021. All Rights Reserved
       </center>
   </footer>
<!--    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
</body>
</html>
