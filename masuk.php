<?php include ("sessionhandler.php");?>

<!-- masuk.php -->
<!-- Interface of insert data. -->
<html>
<head>
<title>Add More Parcel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet"type="text/css" href="style.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="stylesheet1.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <!-- Change the nav bar based on the mockup interface  -->
    <div class="topnav">
        <a href="arrival.php">Good List</a>
        <a href="listComp.php">Complaint</a>
        <a href="graph.php">Complaint Report</a>
        <a href="login.php" style="float:right">Logout</a>
    </div>


    <br>
    <!--Table-->
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Goods Arrival</h4>
                </div><br>
                <div class="card-body">
                <!-- Begin your code here  -->
                    <div class="container">
                        <form method="post" action="isikan.php">
                            <div class="row">
                                <div class="col-25">
                                    <label for="fname">Parcel ID</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" required id="fname" pattern="[A-Z0-9]+" name="Parcel" title="First two letter in uppercase and followed by numbers" placeholder="Ex:PG701234">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">
                                    <label for="Officer">Officer ID</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" required id="fname" pattern="[A-Z0-9]+" name="Officer" value="<?php echo $_SESSION['user_id']; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">
                                    <label for="Officer">Warden ID</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" required id="fname" pattern="[A-Z0-9]+" name="warden" title="student_id" placeholder="Ex:PM0001">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">
                                    <label for="Officer">Student ID</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" required id="fname" pattern="[A-Z0-9]+" name="Student" title="student_id" placeholder="Ex:PM0001">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">
                                    <label for="country">Parcel Type</label>
                                </div>
                                <div class="col-75">
                                    <select id="country" name="Type">
                                    <option value="Box">Box</option>
                                    <option value="Document">Document</option>
                                    <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">
                                    <label for="lname">Date of Arrived</label>
                                </div>
                                <div class="col-75">
                                    <input type="datetime-local" required id="birthday" name="Arrival" style="width:200px; height:40px;">
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-25">
                                    <label for="lname">Date of Collected</label>
                                </div>
                                <div class="col-75">
                                    <input type="datetime-local" required id="birthday" name="Collect" style="width:200px; height:40px;">
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-25">
                                    <label for="country">Status</label>
                                </div>
                                <div class="col-75">
                                    <select id="country" name="Status">
                                    <option value="Received">Received</option>
                                    <option value="Not delivered">Not delivered</option>
                                    <option value="Collected">Collected</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">
                                    <label for="lname">Date of change status</label>
                                </div>
                                <div class="col-75">
                                    <input type="datetime-local" required id="birthday" name="DStatus" style="width:200px; height:40px;">
                                </div>
                            </div><br><br><br>
                            
                            <div class="row">
                                <input type="submit" value="Hantar">
                            </div>
                        </form>
                    <div class="k2v"align="center"><a href="arrival.php">Back</a></div>
                    </div>   
                </div>
            </div>    
        </div>
    </div>
    <footer>
        <center>
            Copyright 2021. All Rights Reserved
        </center>
    </footer>
<br><br>
</body>
</html>