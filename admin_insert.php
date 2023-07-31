<?php 
include "includes/config.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {

    $user_id = $_POST['user_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];
        $user_type = $_POST['user_type'];

		//write sql query

		$sql = "INSERT INTO `user`(  `user_id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `user_type`, `gender`)
        VALUES (  '$user_id', '$first_name','$last_name','$email','$phone_number','$password','$user_type', '$gender')";

        echo $sql;
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

?>