<?php
    $connection =  mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,'parcelDB');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
	    $parcel_id = $_POST['parcel_id'];
	    $Feedbacks = $_POST['Feedbacks'];
	    $Status = $_POST['Status'];

        $query = "UPDATE receival SET parcel_id='$parcel_id', Feedbacks='$Feedbacks', Status='$Status' WHERE id=$id";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Successfully Update"); </script>';
            header("refresh:0.5; url=receival_index.php");
        }
        else
        {
            echo '<script> alert("Data Fail To Update. Please go back to the previous page"); </script>';
            header("refresh:0.5; url=UpdateReceival.php");
        }
    }
?>