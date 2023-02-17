<?php
require 'connectDB.php';
session_start();
if (isset($_SESSION["id"])) {
	$date = $_POST['date'];
	$time = $_POST['time'];
	$source = $_POST['source'];
	$destination = $_POST['destination'];
	$vacancy = $_POST['vacancy'];
	$vehiclename = $_POST['vehiclename'];
	$vehiclenumber = $_POST['vehiclenumber'];
	$vehiclecolour = $_POST['vehiclecolour'];


	$id = $_SESSION['id'];
	$INSERT = "INSERT INTO addride (username,mobile,email) SELECT username,mobile,email FROM users WHERE username='$id'";
	mysqli_query($conn, $INSERT) or die("error   " . $conn->error);


	$id1 = $conn->insert_id;

	$INSERT1 = "UPDATE addride SET date = '$date', time = '$time', source = '$source', destination = '$destination', vacancy = '$vacancy', vehiclename = '$vehiclename', vehiclenumber = '$vehiclenumber', vehiclecolour = '$vehiclecolour' WHERE id='$id1'";
	mysqli_query($conn, $INSERT1) or die("error   " . $conn->error);



}


header('location: desh.php');
exit;



mysqli_close($conn); // Closing Connection with Server
session_destroy();
?>