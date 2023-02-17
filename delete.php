<?php

require 'connectDB.php';
session_start();
if (isset($_SESSION["id"])) {

	?>
	<?php
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM addride WHERE username = '$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$id1 = $row['id'];
	//Define the query
	$query = "DELETE FROM addride WHERE id={$_POST['id']} LIMIT 1";
	//$query = "DELETE FROM addride WHERE id='$id1'";
	echo $query;
	//sends the query to delete the entry
	mysqli_query($conn, $query) or die("error   " . $conn->error);
	header("location: history.php");
	exit;
	?>


	<?php
	//$id = $_SESSION["id"];
//$sql = "INSERT INTO addride (username,mobile) SELECT username,mobile FROM users WHERE username='$id'";
//$result= mysqli_query($conn,$sql) or die("error   ".$conn->error);
} else
	header("location: history.php");
exit;
?>

<?php
mysqli_close($conn); // Closing Connection with Server
die();
header("location: history.php");
exit;
?>