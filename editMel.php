<?php
include ("sessionhandler.php");

//Display some data from students table
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'parcelDB');

//Carry ID from complaint table
$id = $_GET['id'];

$date="";
$type="";
$desc="";

$query1 = "SELECT complaint_date,type_complaint,desc_complaint, image FROM complain WHERE id=$id";
$query_run1 = mysqli_query($conn,$query1);

while($row = mysqli_fetch_array($query_run1)){
    $date = $row['complaint_date']. "<br>"; 
    $type = $row['type_complaint']. "<br>";
    $desc = $row['desc_complaint'];
    $fn = $row['image'];
}  

//carry id from student table
$query ="SELECT user_id, first_name, last_name, phone_number FROM user";
$query_run = mysqli_query($conn,$query);


while($row = mysqli_fetch_array($query_run)){
    $fname = $row['first_name']. "<br>"; 
    $user_id = $row['user_id']. "<br>";
    $phonenum = $row['phone_number'];
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
        <a href="arrival.php">Good List</a>
        <a href="listComp.php">Complaint</a>
        <a href="graph.php">Complaint Report</a>
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
                    <form action="officerUpdate.php" method="POST" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><label for="officer">Officer ID </label></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="officer" id="officer" placeholder="Eg PM0001" value="<?php echo $_SESSION['user_id']; ?>" readonly></td>              
                            </tr>

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
                                <td><?php echo $date?></td>
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
                                <td><?php echo $fname?></td>
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
                                <td><?php echo $user_id?></td>
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
                                <td><?php echo $phonenum?></td>
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
                                <td><?php echo $type ?>
                                    <!-- <select id="type" name="type" class="form-control" value="">
                                        <option value="damage">Damaged Goods</option>
                                        <option value="lost">Lost Goods</option>
                                    </select> -->
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
                                <td><?php echo $desc?>
                                    <!-- <textarea id="desc" name="desc" rows="4" cols="50" class="form-control" required>
                                    
                                    </textarea> -->
                                </td>                                                           
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
                                <td><img src ="uploads/<?php echo $fn;?>" height="160" width="250" class="img-responsive"/></td>                                                           
                            </tr>

                            <tr>
                                <td><label for="status">Status </label></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>:</td>
                                <td>
                                    <select id="status" name="status" class="form-control" value="">
                                    <option value="In investigation">In investigation</option>
                                    <option value="Resolved">Resolved</option>
                                    </select> 
                                </td>                                                           
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                            </tr>                           
                        </table>
                        <br>
                        <center>
                            <input type="hidden" name="id" value="<?php echo $id?>"><button type="submit" name="update" class="btn btn-success">Submit</button>
                            <input type="hidden" name="id" value="<?php echo $id?>"><button type="submit" class="btn btn-primary"><a href="listComp.php">Back</a></button>
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
