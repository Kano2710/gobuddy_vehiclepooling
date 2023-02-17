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
	$subject = 'Your Accounnt Details';
	$message = "Hello $row[username],";
	$message .= "\r\n\r\nYour account is verified. Now you can login with below details.";
	$message .= "\r\n\r\nUsername =  $row[username]";
	$message .= "\r\nPassword = $row[password]";
	$message .= "\r\nGrno = $row[grno]";
	$message .= "\r\nMobile Number = $row[mobile]";
	// $message .= "\r\n\r\nClick this link <link> to Login."; while live
	$message .= "\r\n\r\nThank You.";
	$headers .= 'From: noreply @ company . com';
	mail($email, $subject, $message, $headers);

	$INSERT = "INSERT INTO users SELECT * FROM users_tmp WHERE id = '$row[id]'";

	mysqli_query($conn, $INSERT) or die("error   " . $conn->error);
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