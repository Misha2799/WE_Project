<?php 
include ("sessionhandler.php");
include "includes/config.php";
// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
		

		$id= $_POST['id'];
			$user_id= $_POST['user_id'];
			$first_name = $_POST['first_name'];
			$last_name =  $_POST['last_name'];
			$phone_number =  $_POST['phone_number'];
			$email =  $_POST['email'];
			$password  =$_POST['password'];
			$gender =  $_POST['gender'];
			$user_type =  $_POST['user_type'];

		// write the update query
		$sql = "UPDATE `user` SET `user_id`='$user_id', `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`phone_number`='$phone_number',`password`='$password',`user_type`='$user_type' ,`gender`='$gender' WHERE `id`='$id'";
		
		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo '<script type="text/javascript"> alert("Data Saved") </script>';
			header("refresh:0.5; url=admin_userlist.php");
			  }else{
			echo '<script type="text/javascript"> alert("Data Not Saved") </script>'; 
			header("refresh:0.5; url=admin_userlist.php"); 
			  }
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$update =true;

	// write SQL to get user data
	$sql = "SELECT * FROM `user` WHERE `id`='$id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$id=$row['id'];
			$user_id= $row['user_id'];
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$phone_number = $row['phone_number'];
			$email = $row['email'];
			$password  = $row['password'];
			$gender = $row['gender'];
			$user_type = $row['user_type'];
			
		
			
		}
	}
}	
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
   </div>
   <br>

<body>
<div class="container-fluid">
    <div class="jumbotron">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update User Form </h4>
            </div><br>
            <div class="card-body">
			<form action="" method="post" enctype="multipart/form-data">
		  <fieldset>
		    <legend>Personal information:</legend>
			<input type="hidden" name="id" value=" <?php echo $id; ?>">
			User ID:<br>
		    <input type="user_id" name="user_id" class="form-control" value="<?php echo $user_id; ?>">
		    <br>
		    First name:<br>
		    <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
		    
		    <br>
		    Last name:<br>
		    <input type="text" name="last_name" class="form-control"value="<?php echo $last_name; ?>">
		    <br>
		    Email:<br>
		    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
		    <br>
			Phone number:<br>
		    <input type="phone_number" name="phone_number" class="form-control" value="<?php echo $phone_number; ?>">
		    <br>
		    Password:<br>
		    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
		    <br>
		    Gender:<br>
		    <input class="form-check-input" type="radio" name="gender" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?> >Male
		    <input class="form-check-input" type="radio" name="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?>>Female
		    <br><br>
			<br>
				<label>User Type :</label><br>
				<select name="user_type" class="form-control">
				<option value="Admin">Admin</option>
				<option value="Officer">Pusat Mel Officer</option>
				<option value="Warden">Warden</option>
				<option value="Student">Student</option>
				</select></br>
			<center>
                            <button type="submit" name="update" value="submit" class="btn btn-success">Submit</button>
                            <a href="admin_userlist.php" class="btn btn-primary">View</a>
             <center>
		  </fieldset>
		  <div><br>
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

