<meta Author= "ONG WEI CHENG" >
<?php
    $connection =  mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,'parcelDB');
    if(isset($_POST['delete_warden'])) {

      //$id = $_GET['parcel_id'];
        $query = "DELETE FROM parcel WHERE parcel_id = '$_GET[parcel_id]'";
        $query_run = mysqli_query($connection, $query);
        echo $query;

        if($query_run)
        {
            echo '<script> alert("Data Successfully Deleted"); </script>';
            header("refresh:0.5; url=warden_interface.php");
        }
        else
        {
            echo '<script> alert("Data Fail To Delete. Please go back to the previous page"); </script>';
            //header("refresh:0.5; url=warden_interface.php");
        }
}
      ?>
