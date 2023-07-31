<?php include ("sessionhandler.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Form Admin </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheet1.css">
    <link rel="stylesheet" type="text/js" href="javascript1.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="Parcel.jpeg" alt="logo" height="70px" width="130px">
		    </a>
        <?php 
				echo "Signed in as " . $_SESSION['user_id']; ?>
			</div>  
    </nav>
    <!---Navigation bar-->
    <!-- Change the nav bar based on the mockup interface  -->
    <div class="topnav">
        <a href="#">Home</a>
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="admin_userlist.php">User List</a>
        <span>
        <a style="float:right" onclick="window.location.href='logout.php'" >Logout</a>
   </div>
    </br>
  
</div>
<div class="container-fluid">
       <div class="jumbotron">
           <div class="card">
           
<div class="main">
    <h2>UNIVERSITI MALAYSIA PAHANG</h2>
    
    <img src="image\ump.jpg" width="100%" style="height:300px;" >UMP Malaysia</div>
    <p><h4>ABOUT US</h4></p>
    <p>Established as a technical university in 2002, Universiti Malaysia Pahang (UMP) offers a variety of engineering- and technology-based technical programmes, including high-level Technical and Vocational Education and Training (TVET).
Ranked as one of the best in Research and Innovation within the classifications of Malaysia Technical University Network (MTUN) and Non-Research University (Non RU), UMP is steadfastly committed to innovating and developing unique academic programmes through strategic international collaborations. A milestone of such innovation is UMP’s world class dual-degree engineering programme offered in collaboration with Germany’s Karlsruhe University of Applied Sciences (HsKA) – now seen as the benchmark for other public institutions of higher learning in Malaysia. In the field of research, UMP collaborates with local industries to focus on industry-related applications. Such research collaboration enriches the teaching and learning modules at the university, while simultaneously promotes commercialization of research output and products.</p>
    <br>
    <h2>KEJURUTERAAN GERMAN @ UMP</h2>
    <img src="image\img.jpg" width="100%" style="height:400px;" >Pusat Mel</div>
    <p><h4>UMP bekerjasama dengan Hochschule Karlsruhe (HsKA) & Hochschule Reutlingen (HsRT)</h4></p>
    <p>Program dwi-ijazah di antara UMP dan HsKA melibatkan Ijazah Sarjana Muda Kejuruteraan Mekatronik. Manakala program dwi-ijazah di antara UMP dan HsR pula melibatkan Ijazah Sarjana Muda Kejuruteraan Perniagaan. Eksekutif yang dilengkapi dengan kemahiran teknikal dan pengetahuan dalam pengurusan perniagaan dikatakan menjadi buruan, terutamanya dalam mencapai kehendak dan cabaran dalam revolusi industri.</p>
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
</body>
</html>

