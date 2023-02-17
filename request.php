<?php

require 'connectDB.php';
session_start();
if (isset($_SESSION["id"])) {

	?>
	<?php

	$sql = "SELECT * FROM addride WHERE id = {$_POST['id']}";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$sql1 = "SELECT * FROM users WHERE username = '$_SESSION[id]'";
	$result1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_assoc($result1);

	$text = $_POST['text'];

	$INSERT = "INSERT INTO ride_req (username,mobile,date,time) SELECT username,mobile,date,time FROM addride WHERE id = {$_POST['id']}";

	mysqli_query($conn, $INSERT) or die("error   " . $conn->error);
	$i = $conn->insert_id;
	$INSERT1 = "UPDATE ride_req SET u1 = '$_SESSION[id]', u1email = '$row1[email]', u1mobile = '$row1[mobile]', pickup = '$text'  WHERE id = '$i' ";
	mysqli_query($conn, $INSERT1) or die("error   " . $conn->error);

	$email = "$row[email]";
	$subject = 'Ride Request!';
	$message .= "Hello $row[username],";
	$message .= "\r\n\r\nYou have a new Ride Requst from $_SESSION[id].";
	$message .= "\r\nRide Date = $row[date]";
	$message .= "\r\nRide Time = $row[time]";
	$message .= "\r\nPickup Point = $text";
	// $message .= "\r\nClick this link <link> to Accept of Decline the Ride Request"; While live
	$message .= "\r\n\r\nThank You.";
	$headers .= 'From: noreply @ company . com';
	mail($email, $subject, $message, $headers);



	//Define the query

	header("location: showride.php");
	exit;
	?>


	<?php
	//$id = $_SESSION["id"];
//$sql = "INSERT INTO addride (username,mobile) SELECT username,mobile FROM users WHERE username='$id'";
//$result= mysqli_query($conn,$sql) or die("error   ".$conn->error);
} else
	header("location: showride.php");
exit;
?>

<?php
mysqli_close($conn); // Closing Connection with Server
die();
header("location: showride.php");
exit;
?>