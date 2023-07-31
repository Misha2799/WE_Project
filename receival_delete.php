<?php
    $connection =  mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,'parcelDB');
        
        $id = $_GET['id'];
        $query = "DELETE FROM receival WHERE id=$id";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Successfully Deleted"); </script>';
            header("refresh:0.5; url=receival_index.php");
        }
        else
        {
            echo '<script> alert("Data Fail To Delete. Please go back to the previous page"); </script>';
            header("refresh:0.5; url=receival_index.php");
        }
?>