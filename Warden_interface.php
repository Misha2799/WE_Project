<?php
include ("sessionhandler.php");
$conn =  mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'parcelDB');

$query1 = "SELECT *  FROM parcel";
$query_run1 = mysqli_query($conn,$query1);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta Author= "ONG WEI CHENG" >
    <title>Collected List </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheet1.css">
    <link rel="stylesheet" type="text/js" href="javascript1.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>

<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="Parcel.jpeg" alt="logo" height="70px" width="130px">
        </a>
        <p class="navbar-text navbar-right"> <?php echo "Signed in as " . $_SESSION['user_id']; ?></p>
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
   <!--Table-->
   <div class="container-fluid">
       <div class="jumbotron">
           <div class="card">
               <div class="card-header">
                   <h2>Residency Warden</h2>
                 <h4 class="card-title">Collected List</h4>
               </div><br>
               <div class="card-body">
               <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Parcel ID</th>
                                <th scope="col">Status[update date]</th>
                                <th scope="col">Collected Date</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                    while($row = mysqli_fetch_array($query_run1)){
                                        echo "<tr>";
                                            echo "<td>" .$row['parcel_id']."</td>";
                                            echo "<td>" .$row['status']. $row['date_change_status']."</td>";                                            
                                            echo "<td>" .$row['date_collect']."</td>";
                                            echo "<td>"?>

                                    <!--Add-->
                                    <a href="Warden_add.php?id=<?php echo $row['parcel_id'];?>">
                                    <button type="button" name="add_warden" class="btn btn-primary badge-pill">ADD</button></a>

                                    <!--View-->
                                    <a href="Warden_view.php?id=<?php echo $row ['parcel_id'];?>">
                                    <button type="button" name="view_warden" class="btn btn-warning badge-pill"> View</button></a>

                                    <!--Delete-->
                                    <a href="Warden_delete.php?id=<?php echo $row ['parcel_id'];?>">
                                    <button type="button" name="delete_warden" class="btn btn-danger badge-pill">Delete</button></a>


                                    <!--Notify-->
                                    <a href="updateParcelDetail.php?id=<?php echo $row ['parcel_id'];?>">
                                    <button type="button" name="notify" class="btn btn-success"> Notify</button> </a>
                                    <?php "</td>" ?>
                                    <?php echo "</tr>"?>
                                    <?php
                                    }
                                ?>        
                            </tr>
                            </tbody>
                        </table>
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

