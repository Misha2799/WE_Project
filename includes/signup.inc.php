<?php

if (isset($_POST["submit"]))
{
    $user_id = $_POST['user_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];
    $user_type = $_POST['user_type'];

    require_once 'config.php';
    require_once 'functions.inc.php';
    
    if (emptyInputSignup($user_id, $first_name, $last_name,$email,$phone_number , $password,$gender, $user_type) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUserID($user_id) !== false) {
        header("location: ../signup.php?error=invalidUserID");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if (invalidPassword($password) !== false) {
        header("location: ../signup.php?error=invalidPassword");
        exit();
    }
    if (uidExists($conn, $user_id) !== false) {
        header("location: ../signup.php?error=useridtaken");
        exit();
    }
}


else{
    header("location: ../signup.php");
}