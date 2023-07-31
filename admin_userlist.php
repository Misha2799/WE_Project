<?php 
include ("sessionhandler.php");
include ("includes/config.php") ;

//write the query to get data from users table

$sql = "SELECT * FROM user";

//execute the query

$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="NUR ANIS FARHAIN BINTI ZURIZAM CD17063">
    <title>User Form </title>
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
<!--Form-->
   <div class="container-fluid">
       <div class="jumbotron">
           <div class="card">
               <div class="card-header">
                 <h5 class="card-title">User Lists</h5>
                 Listing of user using UMP Parcel portal
               </div><br>
               <div class="card-body">
                   <div class="row">
                       <div class="col-md-12">
                          <a href=admin_create.php>
                              <p>
                                  <button type="submit" name="add" class="btn btn-primary badge-pill" style="float:right">
                                  <i class="fa fa-plus">Add New User</i>
                                  </button>                          
                                <p>                                       
                          </a>                      
                      </div>
          
               
   
    <div class="container" style="background-color: #dbebd4;">
                  <div class="jumbotron">
	<div class="container">
  
   
<table class="table">

	<thead>
		<br><br><br><tr>
    <th>User ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
    <th>Phone Number</th>
    <th>Password</th>
    <th>Gender</th>
    <th>User Type</th>
    <th>Action</th>

	  </tr>
	</thead>
  
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
		?>

         
          <tr>
          <td><?php echo $row['user_id']; ?></td>
					<td><?php echo $row['first_name']; ?></td>
					<td><?php echo $row['last_name']; ?></td>
					<td><?php echo $row['email']; ?></td>
          <td><?php echo $row['phone_number']; ?></td>
          <td><?php echo $row['password']; ?></td>
					<td><?php echo $row['gender']; ?></td>
					<td><?php echo $row['user_type']; ?></td>
         
          <td><a class="btn btn-info" href="admin_update.php?id=<?php echo $row['id']; ?>">Edit</a></td>
          <td><a class="btn btn-danger" href="admin_delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>  
          </tr>



         
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>
  <div class="footer">
  <center>
  <h5>Copyright 2021.All Right Reserved<h5>
  <center>

</body>
</html>
