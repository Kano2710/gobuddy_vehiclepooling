<?php

require 'connectDB.php';
session_start();
if (isset($_SESSION["id"])) {

	?>
	<?php
	$sql = "SELECT * FROM ride_req WHERE id = {$_POST['id']}";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$text = $_POST['text'];

	$email = "$row[u1email]";
	$subject = 'Regarding Your Ride Request';
	$message = "Hello $row[u1],";
	$message .= "\r\n\r\nSorry, $_SESSION[id] decline your ride request.";
	$message .= "\r\nReason: $text";
	$message .= "\r\nThe reason is optional. It is possible that you may not get any reason for decline your ride request. ";
	$message .= "\r\n\r\nThank You";
	$headers .= 'From: noreply @ company . com';
	mail($email, $subject, $message, $headers);
	//Define the query
	$query = "DELETE FROM ride_req WHERE id={$_POST['id']} LIMIT 1";
	//$query = "DELETE FROM addride WHERE id='$id1'";
	echo $query;
	//sends the query to delete the entry
	mysqli_query($conn, $query) or die("error   " . $conn->error);
	header("location: ride_req.php");
	exit;
	?>


	<?php
	//$id = $_SESSION["id"];
//$sql = "INSERT INTO addride (username,mobile) SELECT username,mobile FROM users WHERE username='$id'";
//$result= mysqli_query($conn,$sql) or die("error   ".$conn->error);
} else
	header("location: ride_req.php");
exit;
?>

<?php
mysqli_close($conn); // Closing Connection with Server
die();
header("location: ride_req.php");
exit;
?>