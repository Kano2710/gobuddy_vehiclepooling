<?php
require 'connectDB.php';
session_start();
if (isset($_SESSION["id"])) {

	$id = $_POST['idd'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$source = $_POST['source'];
	$destination = $_POST['destination'];
	$vacancy = $_POST['vacancy'];
	$vehiclename = $_POST['vehiclename'];
	$vehiclenumber = $_POST['vehiclenumber'];
	$vehiclecolour = $_POST['vehiclecolour'];
	$uname = $_SESSION['id'];
	$sql = "SELECT * FROM addride WHERE username ='$uname'";
	$result = mysqli_query($conn, $sql);
	echo $sql;
	$row = mysqli_fetch_assoc($result);



	$INSERT = "UPDATE addride SET date = '$date', time = '$time', source = '$source', destination = '$destination', vacancy = '$vacancy', vehiclename = '$vehiclename', vehiclenumber = '$vehiclenumber', vehiclecolour = '$vehiclecolour' WHERE id='$id'";
	echo $INSERT;
	mysqli_query($conn, $INSERT) or die("error   " . $conn->error);

	header("location: history.php");
	exit;
	mysqli_close($conn);
	session_destroy();
}
?>