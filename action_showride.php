<?php
//Connect to database
require 'connectDB.php';
if (isset($_SESSION["id"])) {
	$date = date('d-m-Y');
	$timein = date('H:i:s');
	$timeout = date('H:i:s');
	$sql = "SELECT * FROM addride WHERE date='$date'";
	$result = mysqli_query($conn, $sql) or die("error" . $conn->error);
	echo $result;

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			?>

			<?php
		}
	}

}
header('location: showride.php');
exit;
?>