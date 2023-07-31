<?php
include ("sessionhandler.php");

$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'parcelDB');

$monday = date('Y-m-d', strtotime('monday this week'));
$sunday = date('Y-m-d', strtotime('sunday this week'));
$select_week_damage = "SELECT COUNT(*) FROM complain WHERE type_complaint='Damaged Goods' AND complaint_date BETWEEN '$monday' AND '$sunday'";
$select_week_lost = "SELECT COUNT(*) FROM complain WHERE type_complaint='Lost Goods' AND complaint_date BETWEEN '$monday' AND '$sunday'";

$result_damage = mysqli_query($conn, $select_week_damage);
if($result_damage){
    $data = mysqli_fetch_array($result_damage);
    $totalWeekDamage = $data[0];
    // echo $totalWeekDamage;
}

$result_lost = mysqli_query($conn, $select_week_lost);
if($result_lost){
    $data = mysqli_fetch_array($result_lost);
    $total_week_lost = $data[0];
    // echo $total_week_lost;
}

//SQL MONTH
$month1st = date('Y-m-d', strtotime('first day of this month'));
$monthLast = date('Y-m-d', strtotime('last day of this month'));

$select_month_damage = "SELECT COUNT(*) FROM complain WHERE type_complaint='Damaged Goods' AND complaint_date BETWEEN '$month1st' AND '$monthLast'";
$select_month_lost = "SELECT COUNT(*) FROM complain WHERE type_complaint='Lost Goods' AND complaint_date BETWEEN '$month1st' AND '$monthLast'";


$result_month_damage = mysqli_query($conn, $select_month_damage);
if($result_month_damage){
    $data = mysqli_fetch_array($result_month_damage);
    $totalMonthDamage = $data[0];
    // echo $totalMonthDamage;
}


$result_month_lost = mysqli_query($conn, $select_month_lost);
if($result_month_lost){
    $data = mysqli_fetch_array($result_month_lost);
    $totalMonthLost = $data[0];
    // echo $totalMonthLost;
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="DARWISYAH FAKHIRA BT ANUAR CB20021">
    <title>Complaint Form </title>
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
          ['Type of Complaint', "Number of Complaint", { role: "style" } ],
          ['Damaged Goods', <?php echo $totalWeekDamage?>, "#022e57"],
          ['Lost Goods', <?php echo $total_week_lost?>, "#fb9300"],
        ]);

        var options = {
          title: 'Total Number of Complaints Weekly'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));

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
          ['Type of Complaint', "Number of Complaint", { role: "style" } ],
          ['Damaged Goods', <?php echo $totalMonthDamage?>, "e4bad4"],
          ['Lost Goods', <?php echo $totalMonthLost?>, "4a1c40"],
        ]);

        var options = {
          title: 'Total Number of Complaints Monthly'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('column'));

        chart.draw(data, options);
      }
    </script>
</head>

<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="Parcel.jpeg" alt="logo" height="70px" width="130px">
        </a>
        <p class="navbar-text navbar-right"><?php echo "Signed in as " . $_SESSION['user_id']; ?></p>
    </div>
</nav>
    <!---Navigation bar-->
    <div class="topnav">
        <a href="arrival.php">Good List</a>
        <a href="listComp.php">Complaint</a>
        <a href="graph.php">Complaint Report</a>
        <a href="login.php" style="float:right">Logout</a>
    </div>

   <br>
   <!--Table-->
   <div class="container-fluid">
       <div class="jumbotron">
           <div class="card">
               <div class="card-header">
                 <h5 class="card-title">Graph of Weekly and Monthly Report of Complaint Type</h5>
               </div>

                <div class="card-body"><center>Total Number of Complaint Weekly</center>
                    <div class="col-lg-6 m-auto">
                        <div class="card">
                            <div class="card-body"  style="background-color: #dbebd4;">
                                <div id="piechart" style="width: 550px; height: 350;"></div>
                            </div>
                        </div>
                    </div>            
                </div>

               <div class="card-body"><center>Total Number of Complaint Monthly</center>
                    <div class="col-lg-6 m-auto">
                        <div class="card">
                            <div class="card-body"  style="background-color: #dbebd4;">
                                <div id="column" style="width: 550px; height: 300;"></div>
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

