<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>

    <link rel="stylesheet" href="CSS/bootsrap.css">
    <link rel="stylesheet" href="CSS/custom.css">
    <style>
        body {
            background-color: #b6d7a8;
        }
     </style>
</head>
<body>
    <img src="Images/logo.jpeg" class="img-thumbnail" alt="UMPParcelLogo">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link disabled" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Delivery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Collection</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Receival</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav justify-content-end"> 
                        <li class="nav-item" text-right>
                            <a class="nav-link" href="receival_logout.php">Log Out</a>
                        </li>
                    </ul>
                </div>
        </nav>
    </header>
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="card">
                <div class="card-header" >
                    <br>
                    <h4 class="card-title" text-center>You have successfully Log Out!</h4> 
                    <br>
                </div>
            </div>
        </div>
    </div>

    <?php
        include_once 'receival_footer.php';
    ?>
    