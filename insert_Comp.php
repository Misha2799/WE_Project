<?php
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'parcelDB');

if(isset($_POST['insert'])) 
{   
    $fn = $_FILES['image']['name'];
    $ext = pathinfo($fn, PATHINFO_EXTENSION);
    $allowed = array('jpg', 'png', 'jpeg');

    $tm=$_FILES['image']['tmp_name'];
    move_uploaded_file($tm, "uploads/".$fn);

    $user_id = $_POST['user_id'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $desc = $_POST['desc'];

    //Insert data
    $query = "INSERT INTO complain (`id`, `user_id`, `complaint_date`, `type_complaint`, `desc_complaint`,`image`) VALUES (DEFAULT,'$user_id','$date','$type','$desc','$fn')";
    $query_run = mysqli_query($conn,$query);
    echo $query;
    
    // if(! in_array($ext, $allowed)){
    //     echo '<script type="text/javascript"> alert("File Type Are Error") </script>'; 
    // }

    if($query_run){
        
        echo '<script type="text/javascript"> alert("Data Saved") </script>';
        header("refresh:0.5; url=tablestd.php");
    }
    else{
        echo '<script type="text/javascript"> alert("Data Not Saved") </script>'; 
        header("refresh:0.5; url=formComp.php"); 
    }
}
?>