<?php
    $conn =  mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conn,'parcelDB');

if(isset($_POST['submit'])) 
{   
    $image = $_FILES['Proof']['name'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $allowed = array('jpg', 'png', 'jpeg');

    $tm=$_FILES['Proof']['tmp_name'];
    move_uploaded_file($tm,"uploads/".$image);

	$parcel_id = $_POST['parcel_id'];
	$Feedbacks = $_POST['Feedbacks'];
	$Status = $_POST['Status'];

    //Insert data
    $query = "INSERT INTO receival (`parcel_id`, `Proof`, `Feedbacks`, `Status`) VALUES ('$parcel_id', '$image','$Feedbacks','$Status')";
    $query_run = mysqli_query($conn,$query);
    // if(! in_array($ext, $allowed)){
    //     echo '<script type="text/javascript"> alert("File Type Are Error") </script>'; 
    // }
    echo $query;

    if($query_run){
        
        echo '<script type="text/javascript"> alert("Data Saved") </script>';
        header("refresh:0.5; url=receival_index.php");
    }
    else{
        echo '<script type="text/javascript"> alert("Data Not Saved") </script>'; 
        header("refresh:0.5; url=receival_index.php"); 
    }
}
?>