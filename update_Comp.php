<?php 
$conn =  mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'parcelDB');

if(isset($_POST['update']))
{
    // $fn = $_FILES['image']['name'];
    // $tm=$_FILES['image']['tmp_name'];
    // move_uploaded_file($tm, "uploads/".$fn); 

    extract($_POST);
    $query = "UPDATE complain SET type_complaint='$type', desc_complaint='$desc' WHERE id=$id";
    $query_run = mysqli_query($conn,$query);
    

    if($query_run){
        echo '<script type="text/javascript"> alert("Successfully Update") </script>';
        header("refresh:1; url=tablestd.php");
    }
    else{
        echo '<script type="text/javascript"> alert("Data Not Update") </script>';
    }
}
?>











