<?php

require 'connectDB.php';
session_start();
if (isset($_SESSION["id"])) {
	?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title> Deshboard </title>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
			Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript">
				addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
			</script>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link href="css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
		<link rel="stylesheet" type="text/css" media="screen and (max-width: 360px)" href="portrait.css">
		<link rel="stylesheet" type="text/css" media="screen and (min-width: 361px) and (max-width: 480px)"
			href="landscape.css">
		<link rel="stylesheet" type="text/css" media="screen and (min-width: 481px)" href="desktop.css">
		<script src="js/Chart.js"></script>
		<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script src="js/wow.min.js"></script>
		<script>
			new WOW().init();
		</script>
		<script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="Scripts/bootstrap.min.js"></script>

		<style>
		body {
			background-image: url("image/mef.jpg");
			background-repeat: no-repeat;
			background-position: top right;
			background-size: cover;
			background-attachment: fixed;
		}
	</style>
	</head>

	<body>

		<nav class="navbar navbar-expand-lg navbar-light navbar-inverse">
			<a class="navbar-brand" href="desh.php">Go Buddy</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="desh.php">Add Ride </a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="showride.php">Show Ride <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="history.php">History </a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="ride_req.php">Ride Request </a>
					</li>
				</ul>

				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="profile.php">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Log Out</a>
					</li>
				</ul>
			</div>
		</nav>


		<form method="POST">

			<div class="container">


				<hr>



				<label>
					<h4>Date</h4>
				</label>
				&nbsp;&nbsp;&nbsp;
				<input type="date" placeholder="Enter Date" name="date" required>





				</br>




				<hr>

				<input type="submit" name="Register" id="insert" value="Search" class="btn btn-info" />

			</div>

		</form>
		</div>
		<div>
			<TABLE id='table'>


				<?php



				$date = isset($_POST['date']) ? $_POST['date'] : '';
				$sql = "SELECT * FROM addride WHERE date='$date'";
				$result = mysqli_query($conn, $sql);





				?>

				<?php
				if (mysqli_num_rows($result) > 0) {
					?>

					<TR>
						<TH colspan="7" style="text-align:center">Ride Details</TH>
					</TR>
					<TR>
						<TH>Name</TH>
						<TH>Date</TH>
						<TH>Time</TH>
						<TH>Source</TH>
						<TH>Destination</TH>
						<TH>Vehicle Name</TH>
						<TH>Request</TH>
					</TR>
					<?php
					while ($row = mysqli_fetch_assoc($result)) {
						?>
						<TR>
							<TD>
								<?php echo $row['username']; ?>
							</TD>
							<TD>
								<?php echo $row['date']; ?>
							</TD>
							<TD>
								<?php echo $row['time']; ?>
							</TD>
							<TD>
								<?php echo $row['source']; ?>
							</TD>
							<TD>
								<?php echo $row['destination']; ?>
							</TD>
							<TD>
								<?php echo $row['vehiclename']; ?>
							</TD>

							<TD>
								<form action='request.php?id="<?php echo $row['id']; ?>"' method="post">
									<input type="text" name="text" placeholder="Enter Pickup Point">
									<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
									<input type="submit" name="request" value="Request for a Ride">
								</form>
							</TD>
						</TR>

						<?php
					}



				}
				?>
			</TABLE>

		</div>




	</body>

	</html>

	<?php
} else
	header("location: index.php");
exit;
?>

<?php
mysqli_close($conn); // Closing Connection with Server
session_destroy();
?>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous">
	</script>
<script src="js/jquery.min.js"></script>