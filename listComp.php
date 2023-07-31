<?php
include ("sessionhandler.php");

//Timezone
date_default_timezone_set("Asia/Kuala_Lumpur"); 

$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'parcelDB');
$query = "SELECT * FROM `complain`";
$query_run = mysqli_query($conn,$query);

$query1 = "SELECT user_id, first_name FROM user";
$query_run1 = mysqli_query($conn,$query1);


while($row = mysqli_fetch_array($query_run1)){
    $user_id= $row['user_id']. "<br>";
    $fname = $row['first_name']. "<br>";
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="DARWISYAH FAKHIRA BT ANUAR CB20021">
    <title>Complaint Form </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheet1.css">
    <link rel="stylesheet" type="text/js" href="javascript1.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->

    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <style>
        body{
        background-color: #b6d7a8;
    }

    .topnav {
        overflow: hidden;
        background-color: #f2f2f2;
    }
    
    /* Style the topnav links */
    .topnav a {
    float: left;
    display: block;
    color: #333;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    margin: auto;
    }
    
    /* Change color on hover */
    a:hover{
    background-color: #6b9456;
    color: #f2f2f2;
    }

    @media screen and (max-width: 400px) {
    .topnav a {
        float: none;
        width: 100%;
    }
    }

    .dropdown {
    float: left;
    overflow: hidden;
    }

    .dropdown .dropbtn {
    font-size: 16px;  
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
    }

    .dropdown:hover .dropbtn {
    background-color: red;
    }

    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    }

    .dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
    }

    .dropdown-content a:hover {
    background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
    display: block;
    }

</style>

</head>

<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="Parcel.jpeg" alt="logo" height="70px" width="130px">
        </a>
        <p class="navbar-text navbar-right"><?php echo "Signed in as " . $_SESSION['user_id']; ?></p>
    </div>
</nav>
    <!---Navigation bar-->
    <div class="topnav">
        <a href="arrival.php">Good List</a>
        <a href="listComp.php">Complaint</a>
        <a href="graph.php">Complaint Report</a>
        <a href="login.php" style="float:right">Logout</a>
    </div>
</div>

   <br>
   <!--Table-->
   <div class="container-fluid">
       <div class="jumbotron">
           <div class="card">
               <div class="card-header">
                 <h4 class="card-title">Complaint List</h4>
               </div><br>

            <div class="card-body">

                <h5 class="card-title"><center>Dashboard</center></h5>
               <div class="card-body">  

               <div class="row mb-4">
                   <div class="col-lg-6">
                        <div class="card">
                            <h4 class="card-title mt-2 mb-2" style="color:black"><center>WEEKLY</center></h4>
                            <div class="row justify-content-center text-light mb-4">
                                <div class="col-sm-5">
                                    <div class="card bg-warning">
                                        <div class="card-header">Damaged Goods</div>
                                        <div class="card-body">
                                            <h1 class="display-4">
                                                <center>
                                                    <?php 
                                                        $monday = date('Y-m-d', strtotime('monday this week'));
                                                        $sunday = date('Y-m-d', strtotime('sunday this week'));
                                                        $select_week_damage = "SELECT COUNT(*) FROM complain WHERE type_complaint='Damaged Goods' AND complaint_date BETWEEN '$monday' AND '$sunday'";
                                                        $result_damage = mysqli_query($conn, $select_week_damage);
                                                        if($result_damage){
                                                            $data = mysqli_fetch_array($result_damage);
                                                            $totalWeekDamage = $data[0];
                                                            echo $totalWeekDamage;
                                                        }
                                                   ?>
                                                </center>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="card bg-danger">
                                        <div class="card-header">Lost Goods</div>
                                        <div class="card-body">
                                            <h1 class="display-4">
                                                <center>
                                                <?php 
                                                    $monday = date('Y-m-d', strtotime('monday this week'));
                                                    $sunday = date('Y-m-d', strtotime('sunday this week'));
                                                    $select_week_lost = "SELECT COUNT(*) FROM complain WHERE type_complaint='Lost Goods' AND complaint_date BETWEEN '$monday' AND '$sunday'";
                                                    $result_lost = mysqli_query($conn, $select_week_lost);
                                                    if($result_lost){
                                                        $data = mysqli_fetch_array($result_lost);
                                                        $total_week_lost = $data[0];
                                                        echo $total_week_lost;
                                                    }
                                                ?> 
                                                </center>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class="col-lg-6">
                        <div class="card">
                            <h4 class="card-title mt-2 mb-2" style="color:black"><center>MONTHLY</center></h4>
                            <div class="row justify-content-center text-light mb-4">
                                <div class="col-sm-5">
                                    <div class="card bg-info">
                                        <div class="card-header">Damaged Goods</div>
                                        <div class="card-body">
                                            <h1 class="display-4">
                                                <center>
                                                    <?php 
                                                    $month1st = date('Y-m-d', strtotime('first day of this month'));
                                                    $monthLast = date('Y-m-d', strtotime('last day of this month'));
                                                    
                                                    $select_month_damage = "SELECT COUNT(*) FROM complain WHERE type_complaint='Damaged Goods' AND complaint_date BETWEEN '$month1st' AND '$monthLast'";
                                                    $result_month_damage = mysqli_query($conn, $select_month_damage);
                                                    if($result_month_damage){
                                                        $data = mysqli_fetch_array($result_month_damage);
                                                        $totalMonthDamage = $data[0];
                                                        echo $totalMonthDamage;
                                                    }                                          
                                                    ?>
                                                </center>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="card bg-success">
                                        <div class="card-header">Lost Goods</div>
                                        <div class="card-body">
                                            <h1 class="display-4">
                                                <center>
                                                    <?php 
                                                        $month1st = date('Y-m-d', strtotime('first day of this month'));
                                                        $monthLast = date('Y-m-d', strtotime('last day of this month'));
                                                        
                                                        $select_month_lost = "SELECT COUNT(*) FROM complain WHERE type_complaint='Lost Goods' AND complaint_date BETWEEN '$month1st' AND '$monthLast'";
                                                        $result_month_lost = mysqli_query($conn, $select_month_lost);
                                                        if($result_month_lost){
                                                            $data = mysqli_fetch_array($result_month_lost);
                                                            $totalMonthLost = $data[0];
                                                            echo $totalMonthLost;
                                                        }                                          
                                                    ?>
                                                </center>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
               </div>

                <!--Search button--> 
                <div class="col-md-3" style="float:right"> 
                <div class="form-group">
                    <div class="input-group col-md-6">
                        <input type="text" name="search_text" id="search_text" placeholder="Search by ID" class="form-control" />
                    </div>
                    <br>                    
                </div>
                </div>
               <br>                   

                <!--Table-->
               <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Complaint ID</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Type of Complaint</th>
                    <th scope="col">Complaint Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="result">
                <?php
                      while($row = mysqli_fetch_array($query_run)){

                        echo "<tr>";
                        echo "<th>" .$row['id']."</th>";
                        echo "<td>" .$row['user_id']."</td>";
                        echo "<td>" .$row['type_complaint']. "</td>";
                        echo "<td>" .$row['status_complaint']. "</td>";
                        echo "<td>"?>
                               
                            <!--EDIT-->
                            <a href="editMel.php?id=<?php echo $row['id'];?>">
                            <button type="button" name="update" class="btn btn-warning badge-pill">EDIT</button></a>

                            <!--VIEW-->
                            <a href="viewMel.php?id=<?php echo $row['id'];?>">
                            <button type="button" name="view" class="btn btn-success badge-pill">VIEW</button></a>
                            <?php echo "</tr>"?>
                    <?php
                      }
                    ?>

                 </tbody>
                 <div id="result"></div>
                </table>
            </div>
             <br>
       </div>
   </div>
   <footer>
       <center>
           Copyright 2021. All Rights Reserved
       </center>
   </footer>
<!--    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
    
    <!-- CDN Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    
</body>
</html>

    <!-- AJAX SEARCH -->
    <script>
    $(document).ready(function(){
        $("#search_text").on("keyup", function(){
            var value = $(this).val().toLowerCase();
            $("#result tr").filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            })
        })
    })
    // $(document) .ready(function(){
    //     load_data();

    //     function load_data(query)
    //     {
    //         $.ajax({
    //             url:"fetch.php",
    //             method:"POST",
    //             data: {query:query},
    //             success:function(data)
    //             {
    //                 $('#result').html(data);
    //             }
    //         });
    //     }
    //     $('#search_text').keyup(function(){
    //         var search = $(this).val();
    //         if(search != '')
    //         {
    //             load_data(search);
    //         }
    //         else {
    //             load_data();
    //         }
    //     });
    // });
    </script>