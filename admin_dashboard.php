<?php 
include ("sessionhandler.php");
include "includes/config.php";

$select_week_student = "SELECT COUNT(*) FROM user WHERE user_type='Student' " ;
$select_week_officer = "SELECT COUNT(*) FROM user WHERE user_type='Officer'" ;
$select_week_warden= "SELECT COUNT(*) FROM user WHERE user_type='Warden'  ";

$result_student = mysqli_query($conn, $select_week_student);
if($result_student){
    $data = mysqli_fetch_array($result_student);
    $totalWeekStudent = $data[0];
    // echo $totalWeekDamage;
}

$result_officer = mysqli_query($conn, $select_week_officer);
if($result_officer){
    $data = mysqli_fetch_array($result_officer);
    $total_week_officer = $data[0];
    // echo $total_week_lost;
}

$result_warden = mysqli_query($conn, $select_week_warden);
if($result_warden){
    $data = mysqli_fetch_array($result_warden);
    $totalWeekWarden = $data[0];
    // echo $totalWeekDamage;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="NUR ANIS FARHAIN BINTI ZURIZAM CD17063">
    <title>Dashboard </title>
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
          ['Type of User', "Number of User", { role: "style" } ],
          ['Students', <?php echo $totalWeekStudent?>, "#022e57"],
          ['Officer', <?php echo $total_week_officer?>, "#022e57"],
          ['Warden', <?php echo $totalWeekWarden?>, "#022e57"],
        ]);

        var options = {
          title: 'Total Number of User Weekly'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));

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
        <?php 

            echo "Signed in as " . $_SESSION['user_id']; ?>
            </div>

               

    </div>
    </nav>
<!---Navigation bar-->
  <div class="topnav">
        <a href="index.php">Home</a>
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="admin_userlist.php">User List</a>
        </span>
                <a style="float:right" onclick="window.location.href='logout.php'" >Logout</a>
    </div>

 <br>
   <!--Table-->
   <div class="container-fluid">
       <div class="jumbotron">
           <div class="card">
               <div class="card-header">
                 <h5 class="card-title">Total User Reached This Website</h5>
               </div><br>
        <div class="row justify-content-center text-light mb-4">
            <div class="col-sm-2">
                <div class="card bg-warning">
                    <div class="card-header">Students </div>
                    <div class="card-body">
                        <h1 class="display-4">
                            <center>
                                <?php 
                                    $select_week_student = "SELECT COUNT(*) FROM user WHERE user_type='Student'";
                                    $result_student = mysqli_query($conn, $select_week_student);
                                    if($result_student){
                                        $data = mysqli_fetch_array($result_student);
                                        $totalWeekStudent = $data[0];
                                        echo $totalWeekStudent;
                                    }
                                ?>
                            </center>
                        </h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="card bg-danger">
                    <div class="card-header">Officer Mel</div>
                    <div class="card-body">
                        <h1 class="display-4">
                            <center>
                                <?php 
                                    $select_week_warden = "SELECT COUNT(*) FROM user WHERE user_type='Officer";
                                    $result_officer = mysqli_query($conn, $select_week_officer);
                                    if($result_officer){
                                        $data = mysqli_fetch_array($result_officer);
                                        $total_week_officer = $data[0];
                                        echo $total_week_officer;
                                    }
                                ?>
                            </center>
                        </h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="card bg-info">
                    <div class="card-header">Warden</div>
                    <div class="card-body">
                        <h1 class="display-4">
                            <center>
                                <?php 
                                    $select_week_warden = "SELECT COUNT(*) FROM user WHERE user_type='Warden'";
                                    $result_warden = mysqli_query($conn, $select_week_warden);
                                    if($result_warden){
                                        $data = mysqli_fetch_array($result_warden);
                                        $totalWeekWarden = $data[0];
                                        echo $totalWeekWarden;
                                    }
                                ?>
                            </center>
                        </h1>
                    </div>
                </div>
            </div>


        </div>    

        


                <div class="card-body"><center>Total Number User reached this Website </center>
                    <div class="col-lg-6 m-auto">
                        <div class="card">
                            <div class="card-body"  style="background-color: #dbebd4;">
                                <div id="piechart" style="width: 550px; height: 350;"></div>
                            </div>
                        </div>
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

