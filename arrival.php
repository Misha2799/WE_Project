<?php
include('./dbase.php');
include ("sessionhandler.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goods Arrival</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheet1.css">
    <link rel="stylesheet"type="text/css" href="style.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        table-layout: fixed;
      }
    
      td, th {
        border: 3px solid  #dddddd;
        text-align: left;
        padding: 8px;
        width: 100px;
      }
    
      tr:nth-child(even) {
        background-color: #dddddd;
      }
    </style>
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
    <!-- Change the nav bar based on the mockup interface  -->
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
                    <h4 class="card-title">Goods Arrival</h4>
                </div><br>
                <div class="card-body">
                <center>
                <a href="statistics.php"><b>Click Here for See Goods Arrival Statistics</b></a>
                </center>
                  <ol>
                
                  <?php
                  echo "
                      <div id='right'>
                      <div class='table_container'>
                      <div class='sub-table-container' >
                          <table class='tg' class='tc' style='undefined;table-layout: fixed; width: 100%; height:500px'>
                              <colgroup>
                              <col style='width: 25%'>
                              <col style='width: 25%'>
                              <col style='width: 25%'>
                              <col style='width: 25%'>
                              <col style='width: 25%'>
                          </colgroup>
                          <tr>";
                              $str="select count(*) from parcel;";
                              mysqli_query($conn, $str);
                              $result=mysqli_query($conn, $str);
                              $row=mysqli_fetch_array($result);
                              echo "<th class='tg-031e' rowspan='5'><div class='num'>$row[0]</div><br><div class='stats_head'>Total Num of Parcel</div></th>";

                              $str="select count(*) from parcel where status='Received';";
                              mysqli_query($conn, $str);
                              $result=mysqli_query($conn, $str);
                              $row=mysqli_fetch_array($result);
                              echo "<td class='tg-031e'><div class='stats_sub'>Status Received:<div class='num_sub'>$row[0]</div></div></td>";

                              $str="select count(*) from parcel where status='Collected';";
                              mysqli_query($conn, $str);
                              $result=mysqli_query($conn, $str);
                              $row=mysqli_fetch_array($result);
                              echo "<td class='tg-031e'><div class='stats_sub'>Status Collected:<div class='num_sub'>$row[0]</div></div></td>";

                              $str="select count(*) from parcel where status='Not delivered';";
                              mysqli_query($conn, $str);
                              $result=mysqli_query($conn, $str);
                              $row=mysqli_fetch_array($result);
                              echo "<td class='tg-031e'><div class='stats_sub'>Status Not delivered:<div class='num_sub'>$row[0]</div></div></td>";
                      
                          $str="select * from parcel;";
                          mysqli_query($conn, $str);
                          $result=mysqli_query($conn, $str);
                          $sum=0;
                          while ($row=mysqli_fetch_array($result)) {
                              $int = (int)$row[3];
                              $sum=$sum+$int;
                          }
                          echo "<td class='tg-031e'><div class='stats_sub'>Total No of Parcels:<div class='num_sub'>$sum</div></div></td>

                          </tr>";

                          echo "
                          </tr>
                      </table>

                  </div>
              </div>"; 
                    ?>

                    <?php
                    
                    $query = "SELECT * FROM parcel";
                    $result = mysqli_query($conn,$query);
                    
                    if (mysqli_num_rows($result) > 0){
                        // output data of each row
                      ?>
                      <table>
                      <tr>
                        <th style="width:95px">Parcel ID</th>
                        <th style="width:95px">Officer ID</th>
                        <th style="width:95px">Warden ID</th>
                        <th style="width:95px">Student ID</th>
                        <th>Parcel Type</th>
                        <th>Date Arrival</th>
                        <th>Date Collect</th>
                        <th>Status</th>
                        <th>Date Change Status</th>
                        <th style="width:115px">Action</th>
                      </tr>
                      <tr>
                        <td style="width:80px"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      </table>
                      <?php
                      while($row = mysqli_fetch_assoc($result)){
                        $Parcel = $row["parcel_id"];
                        $Officer = $row["officer_id"];
                        $Warden = $row["warden_id"];
                        $Student = $row["user_id"];
                        $Type = $row["parcel_type"];
                        $Arrival = $row["date_arrival"];
                        $Collect = $row["date_collect"];
                        $Status = $row["status"];
                        $DStatus = $row["date_change_status"];
                      ?>
                        <table>
                        <tr>
                          <td style="width:95px"><?php echo $row["parcel_id"]; ?></td>
                          <td style="width:95px"><?php echo $row["officer_id"]; ?></td>
                          <td style="width:95px"><?php echo $row["warden_id"]; ?></td>
                          <td style="width:95px"><?php echo $row["user_id"]; ?></td>
                          <td><?php echo $row["parcel_type"]; ?></td>
                          <td><?php echo $row["date_arrival"]; ?></td>
                          <td><?php echo $row["date_collect"]; ?></td>
                          <td><?php echo $row["status"]; ?></td>
                          <td><?php echo $row["date_change_status"]; ?></td>
                          <td style="width:115px"><a href="ubah.php?id=<?php echo $row["parcel_id"]; ?>">Change</a> | <a href="buang.php?id=<?php echo $row["parcel_id"]; ?>">Delete</a></td>
                        </tr>
                        <tr>
                          <td style="width:130px"></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        
                        </table>
                    
                      <?php
                        }
                    } else {
                        echo "0 results";
                    
                    }
                    ?>
                    </ol>
                    <div class="p2v"align="center"><a href="masuk.php">Add more</a></div>
                    <br><br>      

                </div>
                              <!-- Begin your code here  -->
                              </div>    
                      </div>
                  </div>
	
  <footer>
        <center>
            Copyright 2021. All Rights Reserved
        </center>
    </footer>
</body>
</html>