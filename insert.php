<?php
if ((isset($_POST["insert"])) && (isset($_FILES['image']))) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$grno = $_POST['grno'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];

	$errors = array();
	$file_name = $_FILES['image']['name'];
	$file_size = $_FILES['image']['size'];
	$file_tmp = $_FILES['image']['tmp_name'];
	$file_type = $_FILES['image']['type'];



	if (empty($errors) == true) {
		move_uploaded_file($file_tmp, "idcard/" . $file_name);
		echo "Success";
	} else {
		print_r($errors);
	}

	if (!empty($username) && !empty($password) && !empty($grno) && !empty($gender) && !empty($email) && !empty($mobile)) {
		$host = "localhost";
		$user = "root";
		$db = "gobuddy";
		$pass = "";

		$conn = mysqli_connect($host, $user, $pass, $db);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}





		$INSERT = "INSERT INTO users_tmp (username, password, grno, gender, email, mobile, image) VALUES ('$username', '$password', '$grno', '$gender', '$email', '$mobile','$file_name')";

		mysqli_query($conn, $INSERT) or die("error   " . $conn->error);

		echo $INSERT;

		$subject = 'Regarding Your Account Verification';
		$message = "Hello $username,";
		$message .= "\r\n\r\nPlease wait till your account get verified.\r\nWe will let you know by an E-mail after successful Verification.";
		$message .= "\r\n\r\nThank You.";
		$headers .= 'From: noreply @ company . com';
		mail($email, $subject, $message, $headers);

		$sql = "SELECT * FROM users_tmp";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		$email1 = "dharam27101998@gmail.com";
		$subject1 = "Regarding a new user verification";
		$message1 = "Hello Dharam Dhameliya,";
		$message1 .= "\r\n\r\nUsername = $username \r\nGr No. = $grno \r\nGender = $gender \r\nEmail Address = $email \r\nMobile Number = $mobile";
		// $message .= "\r\n\r\nClick this link <link> to approve or refuse."; while live
		$message1 .= "\r\n\r\nThank You.";
		$headers1 = "From: noreply @ company . com";


		mail($email1, $subject1, $message1, $headers1);

		mysqli_close($conn);
	}
} else {
	echo "All fields are required!!";
	die();

}

header('location: index.php');
exit;
?>