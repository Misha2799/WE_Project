<?php 
include ("sessionhandler.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"type="text/css" href="style.css"/>
	<title> Goods Arrival Statistics | UMP Parcel</title>
	<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheet1.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->

	<style>
		.b-skills {
			border-top: 1px solid #f9f9f9;
			padding-top: 46px;
			text-align: center;
		}

		.b-skills:last-child {
			margin-bottom: -30px;
		}

		.b-skills h2 {
			margin-bottom: 50px;
			font-weight: 900;
			text-transform: uppercase;
		}

		.skill-item {
			position: relative;
			max-width: 250px;
			width: 100%;
			margin-bottom: 30px;
			color: #555;
		}

		.chart-container {
			position: relative;
			width: 100%;
			height: 0;
			padding-top: 100%;
			margin-bottom: 27px;
		}

		.skill-item .chart,
		.skill-item .chart canvas {
			position: absolute;
			top: 0;
			left: 0;
			width: 100% !important;
			height: 100% !important;
		}

		.skill-item .chart:before {
			content: "";
			width: 0;
			height: 100%;
		}

		.skill-item .chart:before,
		.skill-item .percent {
			display: inline-block;
			vertical-align: middle;
		}

		.skill-item .percent {
			position: relative;
			line-height: 1;
			font-size: 40px;
			font-weight: 900;
			z-index: 2;
		}

		.skill-item .percent:after {
			content: attr(data-after);
			font-size: 20px;
		}

		p {
			font-weight: 900;
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
                    <h4 class="card-title">Statistics of Goods Arrival</h4>
                </div><br>
                <div class="card-body">
                <!-- Begin your code here  -->
				<section id="s-team" class="section">
					<div class="b-skills">
						<div class="container">
							<h2>Month-by-Month Statistics on Goods Counts (%)</h2>

							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-3">
									<div class="skill-item center-block">
										<div class="chart-container">
											<div class="chart " data-percent="92" data-bar-color="#23afe3">
												<span class="percent" data-after="%">92</span>
											</div>
										</div>

										<p>Number of Goods in FEB</p>
									</div>
								</div>

								<div class="col-xs-12 col-sm-6 col-md-3">
									<div class="skill-item center-block">
										<div class="chart-container">
											<div class="chart " data-percent="78" data-bar-color="#a7d212">
												<span class="percent" data-after="%">78</span>
											</div>
										</div>

										<p>Number of Goods in MARCH</p>
									</div>
								</div>

								<div class="col-xs-12 col-sm-6 col-md-3">
									<div class="skill-item center-block">
										<div class="chart-container">
											<div class="chart " data-percent="95" data-bar-color="#ff4241">
												<span class="percent" data-after="%">95</span>
											</div>
										</div>

										<p>Number of Goods in APRIL</p>
									</div>
								</div>

								<div class="col-xs-12 col-sm-6 col-md-3">
									<div class="skill-item center-block">
										<div class="chart-container">
											<div class="chart " data-percent="65" data-bar-color="#edc214">
												<span class="percent" data-after="%">65</span>
											</div>
										</div>

										<p>Number of Goods in MAY</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<br>
				<center>
					<a href="arrival.php">Click Here for Back</a>
				</center>
				<br><br>


				<script src="plugins/jquery-2.2.4.min.js"></script>
				<script src="plugins/jquery.appear.min.js"></script>
				<script src="plugins/jquery.easypiechart.min.js"></script>
				<script>
					'use strict';

					var $window = $(window);

					function run() {
						var fName = arguments[0],
							aArgs = Array.prototype.slice.call(arguments, 1);
						try {
							fName.apply(window, aArgs);
						} catch (err) {

						}
					};

					function _chart() {
						$('.b-skills').appear(function() {
							setTimeout(function() {
								$('.chart').easyPieChart({
									easing: 'easeOutElastic',
									delay: 3000,
									barColor: '#369670',
									trackColor: '#fff',
									scaleColor: false,
									lineWidth: 21,
									trackWidth: 21,
									size: 250,
									lineCap: 'round',
									onStep: function(from, to, percent) {
										this.el.children[0].innerHTML = Math.round(percent);
									}
								});
							}, 150);
						});
					};
					$(document).ready(function() {
						run(_chart);
					});
				</script>
		</div>
                </div>    
        </div>
    </div>
	<footer>
        <center>
            Copyright 2021. All Rights Reserved
        </center>
    </footer>
</body>
</html>