<?php
include ("sessionhandler.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="NUR ANIS FARHAIN BINTI ZURIZAM CD17063">
    <title>Create Form Admin </title>
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
        <?php 
				echo "Signed in as " . $_SESSION['user_id']; ?>
    </div>
</nav>
    <!---Navigation bar-->
    <!-- Change the nav bar based on the mockup interface  -->
    <div class="topnav">
        <a href="index.php">Home</a>
        <a href="admin_dashboard.php">Dashboard</a>
        <a class="active" href="admin_userlist.php">User List</a>
        </span>
                <a style="float:right" onclick="window.location.href='logout.php'" >Logout</a>
   </div> <br>

</div>
<body>
<div class="container-fluid">
       <div class="jumbotron">
           <div class="card">
               <div class="card-header">
                 <h4 class="card-title">Sign Up Form </h4>
               </div><br>
               <div class="card-body">
               <form action="admin_insert.php" method="POST" enctype="multipart/form-data" >
                        <fieldset>
                          <legend>Personal information:</legend>
                          User ID:<br>
                          <input type="user_id" name="user_id" class="form-control" required>
                          <br>
                          First name:<br>
                          <input type="text" name="first_name" class="form-control"  required>
                          <br>
                          Last name:<br>
                          <input type="text" name="last_name" class="form-control" required>
                          <br>
                          Email:<br>
                          <input type="email" name="email" class="form-control" required>
                          <br>
                          Phone number:<br>
                          <input type="phone_number" name="phone_number" class="form-control" required>
                          <br>
                          Password:<br>
                          <input type="password" name="password" class="form-control" required>
                          <br>
                          <label>User Type :</label><br>
                          <select name="user_type" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Officer">Pusat Mel Officer</option>
                                <option value="Warden">Warden</option>
                                <option value="Student">Student</option>
                          </select></br>
                          Gender:<br>
                          <input class="form-check-input" type="radio" name="gender" value="Male">Male <br>
                          <input class="form-check-input" type="radio" name="gender" value="Female">Female <br>

                      
                          <center>
                              <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
                              <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                              <a href="admin_userlist.php" class="btn btn-primary">View</a>
                          <center>
                          
                        </fieldset>
                      </form>
               </div>    
       </div>
   </div>


<div class="footer">
  <center>
  <h5>Copyright 2021.All Right Reserved<h5>
  <center>

</body>
</html>