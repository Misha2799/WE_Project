<!-- isikan.php -->
<!-- To insert data of masuk.php into database. -->
<?php

include("dbase.php");

//Dapatkan Tarikh Dan Masa Masuk
extract( $_POST );
$query = "INSERT INTO parcel (parcel_id,officer_id,warden_id,user_id,parcel_type,date_arrival,date_collect,status,date_change_status) VALUES('$Parcel','$Officer','$Warden','$Student','$Type','$Arrival','$Collect','$Status','$DStatus')";

if (mysqli_query($conn, $query)) {
    echo "<script type='text/javascript'> window.location='arrival.php' </script>";
	
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

?>

