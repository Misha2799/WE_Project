<!--kemaskini.php-->
<!--To update data of ubah.php into database.-->
<?php
include ("dbase.php");

extract ($_POST);

//Dapatkan Tarikh Dan Masa Masuk

$query = "UPDATE parcel SET parcel_id = '$Parcel', officer_id = '$Officer', warden_id = '$Warden', user_id = '$Student', parcel_type = '$Type', date_arrival = '$Arrival', date_collect = '$Collect', status = '$Status', date_change_status = '$DStatus' WHERE parcel_id = '$idURL'";

$result = mysqli_query($conn,$query) or die ("Could not execute query in ubah.php");
if($result){
    echo "<script type = 'text/javascript'> window.location='arrival.php' </script>";
}

?>

