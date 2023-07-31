<meta Author= "ONG WEI CHENG" >
<?php
include ("sessionhandler.php");
$conn =  mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'parcelDB');

$query1 = "SELECT *  FROM parcel";
$query_run1 = mysqli_query($conn,$query1);

while($row = mysqli_fetch_array($query_run1)){
    $trackno = $row['parcel_id']. "<br>";
    $dateA = $row['date_arrival']. "<br>"; 
    $user_id = $row['user_id']. "<br>";
    $status = $row['status']. "<br>";
    $updatedate  = $row['date_collect']. "<br>";
    $warden_id = $row['warden_id']. "<br>";
    $posname= $row['posname']. "<br>";
    $img = $row['provepic']. "<br>";

    //$fn = $row['image'];
}

//carry id from student table
$query = "SELECT std_id, std_name, std_phonenumber FROM students";
$query_run = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($query_run)){
    $name = $row['std_name']. "<br>"; 
    $std_id = $row['std_id']. "<br>";
    $phonenum = $row['std_phonenumber'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View  </title>
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
                 <h4 class="card-title">Parcel Details</h4>
               </div><br>
               <div class="card-body">
               <div class="container" style="background-color: #dbebd4;">
                <div class="jumbotron">
                    <form  method="POST" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Tracking Number</td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td></td>
                                <td><?php echo $trackno?></td>
                                <td></td>
                                <td></td>
                                <td>Arrived</td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td></td>
                                <td><?php echo $dateA?></td>
                            </tr>
                            <tr>
                            <td>Student Name</td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td></td>
                                <td><?php echo $name?></td>
                                <td></td>
                                <td></td>
                                <td>Status:</td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td></td>
                                <td><?php echo $status?></td>
                                

                             </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td></td>
                                <td><?php echo $phonenum?></td>
                                <td></td>
                                <td></td>
                                <td>Update Date</td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td></td>
                                <td><?php echo $updatedate?></td>
                                
                            </tr>
                            <tr>
                                <td>Sender Name:</td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Warden ID:</td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td></td>
                                <td> <?php echo $_SESSION['user_id']; ?></td>
                            </tr>
                            <tr>
                                <td>Pos Services</td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td></td>
                                <td><?php echo $posname?></td>
                                <td></td>
                                <td></td>
                                <td>Prove Picture</td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td></td>
                                <td><img src ="uploads/<?php echo $img; ?>" height="160" width="250" class="img-responsive"></td>                                                           
                            </tr>
                            <!-- <input type="file" class="form-control" id="file" required> -->
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>                           
                        </table>
                        <br>
                        <center>
                            
                            <button type="back" name="back" class="btn btn-primary"><a href="Warden_interface.php">Back</a></button>
                        <center>
                    </form>
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

