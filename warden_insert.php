<?php
$conn =  mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'parcelDB');

if(isset($_POST['insert_warden'])) 
{   
    $img = $_FILES['provepic']['name'];
    $ext = pathinfo($img, PATHINFO_EXTENSION);
    $allowed = array('jpg', 'png', 'jpeg');

    $tm=$_FILES['provepic']['tmp_name'];
    move_uploaded_file($tm, "uploads/".$img);

    $track_id = $_POST['track_id'];

    //Insert data
    $query3 = "INSERT INTO parcel (`provepic`) VALUES ('$img')";
    $query_run3 = mysqli_query($conn,$query3);
    echo $query3; 
    

    if($query_run3){
        
        echo '<script type="text/javascript"> alert("Data Saved") </script>';
        header("refresh:0.5; url=warden_interface.php");
    }
    else{
        echo '<script type="text/javascript"> alert("Data Not Saved") </script>'; 
        header("refresh:0.5; url=warden_interface.php"); 
    }

}

?>