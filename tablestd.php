<?php
include ("sessionhandler.php");

$conn =  mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'parcelDB');
$query = "SELECT * FROM `complain`";
$query_run = mysqli_query($conn,$query);

// $query1 = "SELECT std_id FROM students";
// $query_run1 = mysqli_query($conn,$query1);

// while($row = mysqli_fetch_array($query_run1)){
//     $id = $row['std_id']. "<br>";
// } 

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
        <a href="view_delivery.php">Delivery</a>
        <a href="view_collection.php">Collection</a>
        <a href="receival_index.php">Receival</a>
        <a href="receival_report.php">Report</a>
        <a href="tablestd.php">Complaint</a>
        <a href="login.php" style="float:right">Logout</a>
   </div>

   <br>
   <!--Table-->
   <div class="container-fluid">
       <div class="jumbotron">
           <div class="card">
               <div class="card-header">
                 <h4 class="card-title">Student Complaint List</h4>
               </div><br>
               <div class="card-body">
                   <div class="row">
                       <div class="col-md-12">
                           <a href=formComp.php>
                                <button type="submit" name="add" class="btn btn-primary badge-pill" style="float:right">
                                <i class="fa fa-plus"> Make Complaint</i>
                                </button>
                           </a>
                       </div> 
                   </div><br>
               <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Complaint ID</th>
                    <th scope="col">Type of Complaint</th>
                    <th scope="col">Complaint Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                      while($row = mysqli_fetch_array($query_run)){

                        echo "<tr>";
                        echo "<th>" .$row['id']."</th>";
                        echo "<td>" .$row['type_complaint']. "</td>";
                        echo "<td>" .$row['status_complaint']. "</td>";
                        echo "<td>"?> 
                            <!--EDIT-->
                            <a href="edit_Comp.php?id=<?php echo $row['id'];?>">
                            <button type="button" name="update" class="btn btn-warning badge-pill">EDIT</button></a>

                            <!--DELETE-->
                            <a href="delete_Comp.php?id=<?php echo $row['id'];?>">
                            <button type="button" name="edit" class="btn btn-danger badge-pill">DELETE</button></a>
                            <?php "</td>" ?>
                            <?php echo "</tr>"?>
                    <?php
                      }
                    ?>
                 </tbody>
                </table>
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

