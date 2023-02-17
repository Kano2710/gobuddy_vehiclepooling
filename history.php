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
		<script src="js/jquery-1.10.2.min.js"></script>

		<style>
			body {
				background-image: url("image/mef.jpg");
				background-repeat: no-repeat;
				background-position: top right;
				background-size: cover;
				background-attachment: fixed;
			}

			#table {
				font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
				border-collapse: collapse;
				width: 100%;
			}

			#table td,
			#table th {
				border: 1px solid #ddd;
				padding: 8px;
				opacity: 0.8;
			}

			#table tr:nth-child(even) {
				background-color: #f2f2f2;
			}

			#table tr:nth-child(odd) {
				background-color: #f2f2f2;
				opacity: 0.9;
			}

			#table tr:hover {
				background-color: #ddd;
				opacity: 0.8;
			}

			#table th {
				opacity: 0.6;
				padding-top: 12px;
				padding-bottom: 12px;
				text-align: left;
				background-color: #00A8A9;
				color: white;
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
					<li class="nav-item ">
						<a class="nav-link" href="showride.php">Show Ride </a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="history.php">History <span class="sr-only">(current)</span></a>
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

		<TABLE id='table'>

			<?php
			$id = $_SESSION['id'];
			$sql = "SELECT * FROM addride WHERE username = '$id'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				?>
				<TR>
					<TH>Ride ID</TH>
					<TH>Date</TH>
					<TH>Time</TH>
					<TH>Source</TH>
					<TH>Destination</TH>
					<TH>Vacancy</TH>
					<TH>Vehicle Name</TH>
					<TH>Vehicle Number</TH>
					<TH>Vehicle Color</TH>
					<TH colspan="2"> Edit/Delete</TH>

				</TR>
				<?php
				while ($row = mysqli_fetch_assoc($result)) {
					?>
					<TR>
						<TD>
							<?php echo $row['id']; ?>
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
							<?php echo $row['vacancy']; ?>
						</TD>
						<TD>
							<?php echo $row['vehiclename']; ?>
						</TD>
						<TD>
							<?php echo $row['vehiclenumber']; ?>
						</TD>
						<TD>
							<?php echo $row['vehiclecolour']; ?>
						</TD>


						<TD>
							<form action='update.php?id="<?php echo $row['id']; ?>"' method="post">
								<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
								<input type="submit" name="update" value="Edit">
							</form>
						</TD>
						<TD>
							<form action='delete.php?id="<?php echo $row['id']; ?>"' method="post">
								<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
								<input type="submit" name="delete"
									onclick="return confirm('Are you sure you want to delete this Ride???')" value="Delete">
							</form>
						</TD>
					</TR>
					<?php
				}
			} else {
				?>
				<h3>No History Found...</h3>
				<?php
			}
			?>
		</table>


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