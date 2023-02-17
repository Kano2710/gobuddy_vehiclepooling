<?php

require '../connectDB.php';
session_start();
if (isset($_SESSION["id"])) {

	?>
	<?php
	$sql = "SELECT * FROM users_tmp";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$email = "$row[email]";
	$subject = 'Regarding Your Account Verification';
	$message = "Hello $row[username]";
	$message .= "\r\n\r\nSorry, We cannot verify you with given details.\r\nPlease, try again with the correct details.";
	$message .= "\r\n\r\nThank You..";
	$headers .= 'From: noreply @ company . com';
	mail($email, $subject, $message, $headers);
	//Define the query
	$query = "DELETE FROM users_tmp WHERE id={$_POST['id']} LIMIT 1";
	//$query = "DELETE FROM addride WHERE id='$id1'";
	echo $query;
	//sends the query to delete the entry
	mysqli_query($conn, $query) or die("error   " . $conn->error);
	header("location: deshboard.php");
	exit;
	?>


	<?php
	//$id = $_SESSION["id"];
//$sql = "INSERT INTO addride (username,mobile) SELECT username,mobile FROM users WHERE username='$id'";
//$result= mysqli_query($conn,$sql) or die("error   ".$conn->error);
} else
	header("location: deshboard.php");
exit;
?>

<?php
mysqli_close($conn); // Closing Connection with Server
die();
header("location: deshboard.php");
exit;
?>