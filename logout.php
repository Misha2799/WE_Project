<?php
session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["password"]);
unset($_SESSION["user_type"]);
header("Location: login.php");
?>