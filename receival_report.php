<?php
  include ("sessionhandler.php");
  include_once 'receival_header.php';
?>
<?php

$conn =  mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'parcelDB');

//WEEK
$monday = date('Y-m-d', strtotime('monday this week'));
$sunday = date('Y-m-d', strtotime('sunday this week'));
$select_week_receival = "SELECT COUNT(*) FROM receival WHERE Status='Received' AND date_receival BETWEEN '$monday' AND '$sunday'";
$select_week_notreceival = "SELECT COUNT(*) FROM receival WHERE Status='Not Received' AND date_receival BETWEEN '$monday' AND '$sunday'";
$select_week_pending = "SELECT COUNT(*) FROM receival WHERE Status='Pending' AND date_receival BETWEEN '$monday' AND '$sunday'";

$result_receival = mysqli_query($conn, $select_week_receival);
if($result_receival){
    $data = mysqli_fetch_array($result_receival);
    $total_week_receival = $data[0];
}

$result_notreceival = mysqli_query($conn, $select_week_notreceival);
if($result_notreceival){
    $data = mysqli_fetch_array($result_notreceival);
    $total_week_notreceival = $data[0];
}

$result_pending = mysqli_query($conn, $select_week_pending);
if($result_pending){
    $data = mysqli_fetch_array($result_pending);
    $total_week_pending = $data[0];
}

// MONTH
$month1st = date('Y-m-d', strtotime('first day of this month'));
$monthLast = date('Y-m-d', strtotime('last day of this month'));
$select_month_receival = "SELECT COUNT(*) FROM receival WHERE Status='Received' AND date_receival BETWEEN '$month1st' AND '$monthLast'";
$select_month_notreceival = "SELECT COUNT(*) FROM receival WHERE Status='Not Received' AND date_receival BETWEEN '$month1st' AND '$monthLast'";
$select_month_pending = "SELECT COUNT(*) FROM receival WHERE Status='Pending' AND date_receival BETWEEN '$month1st' AND '$monthLast'";

$result_month_receival = mysqli_query($conn, $select_month_receival);
if($result_month_receival){
    $data = mysqli_fetch_array($result_month_receival);
    $totalMonthReceival = $data[0];
}

$result_month_notreceival = mysqli_query($conn, $select_month_notreceival);
if($result_month_notreceival){
    $data = mysqli_fetch_array($result_month_notreceival);
    $totalMonthNotReceival = $data[0];
} 

$result_month_pending = mysqli_query($conn, $select_month_pending);
if($result_month_pending){
    $data = mysqli_fetch_array($result_month_pending);
    $totalMonthPending= $data[0];
} 

//OVERALL
$query = "SELECT Status, count(*) as number FROM receival GROUP BY status";  
$query_run = mysqli_query($conn, $query);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="DARWISYAH FAKHIRA BT ANUAR CB20021">
    <title>Report of Receival</title>
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
          ['Status', "Duration of Receival", { role: "style" } ],
          ['Received', <?php echo $total_week_receival?>, "#022e57"],
          ['Not Received', <?php echo $total_week_notreceival?>, "#fb9300"],
          ['Pending', <?php echo $total_week_pending?>, "#4a1c40"],
        ]);

        var options = {
          title: 'Total Number of Goods Status Weekly'
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
          ['Status', "Duration of Receival", { role: "style" } ],
          ['Received', <?php echo $totalMonthReceival?>, "#022e57"],
          ['Not Received', <?php echo $totalMonthNotReceival?>, "#fb9300"],
          ['Pending', <?php echo $totalMonthPending?>, "#4a1c40"],
        ]);

        var options = {
          title: 'Total Number of Goods Status Monthly'
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
                      title: 'Total Number of Goods',  
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
   <br>
   <!--Table-->
   <div class="container-fluid">
       <div class="jumbotron">
           <div class="card">
               <div class="card-header">
                 <h5 class="card-title">Graph of Weekly and Monthly Receival Status</h5>
               </div>

                <div class="card-body"><center>Total Number of Received Goods Weekly</center>
                    <div class="col-lg-6 m-auto">
                        <div class="card">
                            <div class="card-body"  style="background-color: #dbebd4;">
                                <div id="LineChart" style="width: 600px; height: 350;"></div>
                            </div>
                        </div>
                    </div>            
                </div>

               <div class="card-body"><center>Total Number of Received Goods Monthly</center>
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
