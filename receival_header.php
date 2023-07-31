<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>

    <script src="https://kit.fontawesome.com/f83132fa5c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/bootsrap.css">
    <link rel="stylesheet" href="CSS/custom.css">
    <link rel="stylesheet" type="text/css" href="stylesheet1.css">
    
     <style>
        body {
            background-color: #b6d7a8;
        }
     </style>
</head>
<body>
    <img src="Parcel.jpeg" class="img-thumbnail" alt="UMPParcelLogo" height="70px" width="130px">
    <p style="float:right"> <?php echo "Signed in as " . $_SESSION['user_id']; ?></p>
    <br><br>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="view_delivery.php">Delivery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="view_collect.php">Collection</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="receival_index.php">Receival</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="receival_report.php">Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tablestd.php">Complaint</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav justify-content-end"> 
                        <li class="nav-item" text-right>
                            <a class="nav-link" href="login.php">Log Out</a>
                        </li>
                    </ul>
                </div>
        </nav>
        <br>
    </header>

    