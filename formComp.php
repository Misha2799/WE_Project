<?php
include ("sessionhandler.php");

//Display some data from students table
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'parcelDB');
$query = "SELECT first_name, last_name, phone_number FROM user ORDER BY id ASC ";
$query_run = mysqli_query($conn,$query);


// while($row = mysqli_fetch_array($query_run)){
//     $fname = $row['first_name']; 
//     $lname = $row['last_name'];
//     $phonenum = $row['phone_number'];
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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script> -->

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
   <!--Form-->
   <div class="container-fluid">
       <div class="jumbotron">
           <div class="card">
               <div class="card-header">
                 <h5 class="card-title">Complaint Form</h5>
                 Tell us what happened with your parcel
               </div><br>
             <div class="container" style="background-color: #dbebd4;">
                <div class="jumbotron">
                    <form action="insert_Comp.php" method="POST" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><label for="date">Date </label></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td><input type="date" class="form-control" name="date" id="date" required></td>
                            </tr>
                            <tr>
                                <td><label for="Name">Name </label></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>    
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td>AMIRUL ISYRAF</td>
                             </tr>
                            <tr>
                                <td><label for="id">Matric ID </label></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td><input type="text" name="user_id" class="form-control" placeholder="Enter Your Matric ID" ?></td>
                            </tr>
                            <tr>
                                <td><label for="phoneNum">Phone Number </label></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td>01234455554</td>
                            </tr>
                            <tr>
                                <td><label for="type">Complaint Type </label></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td>
                                    <select id="type" name="type" class="form-control">
                                        <option value="Damaged Goods">Damaged Goods</option>
                                        <option value="Lost Goods">Lost Goods</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="desc">Description </label></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td><textarea id="desc" name="desc" rows="4" cols="50" class="form-control" required></textarea></td>                                                           
                            </tr>
                            <tr>
                                <td><label for="img">Attachment </label></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td><input type="file" name="image" class="form-control" id="file" required></td>                                                           
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>                           
                        </table>
                        <br>
                        <center>
                            <button type="submit" name="insert" value="submit" class="btn btn-success">Submit</button>
                            <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" name="insert" value="submit" class="btn btn-primary"><a href="tablestd.php">Back</button></a>
                        <center>
                    </form>
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
</body>
</html>


<!-- <script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script> -->
