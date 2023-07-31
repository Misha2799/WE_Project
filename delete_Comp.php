<?php
    $conn = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conn,'parcelDB');

    $query = "DELETE FROM complain WHERE id='$_GET[id]'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo '<script type="text/javascript"> alert("Successfully Delete") </script>';
        header("refresh:1; url=tablestd.php");
    }
    else{
        echo "Try again!!";
    }
  
    
?>