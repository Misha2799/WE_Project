<?php
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'parcelDB');

if(isset($_POST['update']))
{ 
    extract ($_POST);
    $id = $_POST['id'];
    $query ="UPDATE complain SET status_complaint='$status' WHERE id=$id";
    $query_run = mysqli_query($conn,$query);
    // echo $query;


    if($query_run){
        echo '<script type="text/javascript"> alert("Successfully Update") </script>';
        header("refresh:1; url=listComp.php");
    }
    else{
        echo '<script type="text/javascript"> alert("Data Not Update") </script>';
    }
}

?>