<?php

session_start();

 if (isset($_SESSION['HTTP_USER_AGENT'])) {
     if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
         session_destroy();
         header("Location: login.php");
         exit();
     }
 }
 
 if (!isset($_SESSION['user_id']) && !isset($_SESSION['password']) && !isset($_SESSION['user_type'])) {
     session_destroy();
     header("Location: login.php");
     exit();
 }


?>