<?php

include ("includes/config.php");
session_start();

if(isset($_POST['user_id'])){
    $userid = $_POST['user_id'];
    $pass = $_POST['password'];
    $user_type = $_POST['user_type'];

    $sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$userid' AND password='$pass' AND user_type='$user_type'");
    
    if(mysqli_num_rows($sql) > 0){
        session_start();
        $_SESSION['user_id'] = $userid;
        $_SESSION['password'] = $pass;
        $_SESSION['user_type'] = $user_type;

        if($user_type == "Admin"){
                header("location: index.php");
        }else if($user_type == "Student"){
            header("location: view_delivery.php");
        }else if($user_type == "Officer"){
            header("location: arrival.php");
        }else if($user_type == "Warden"){
            header("location: Warden_interface.php");
        } else {
           exit(); 
        }
        
    }else{
        echo "<script>
        
        alert('User id or password is invalid');
        
        window.location.href = 'login.php';
        
        </script>";
    }

}

?>
        
        
        
        
        