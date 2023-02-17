<?php
error_reporting(0);
session_start();
require_once("class/dbo.class.php");

$username = $_POST['username'];
$password = $_POST['password'];
$log_q = "SELECT * FROM users WHERE username='$username'";
$log_res = $db->get($log_q);
$data = array();

if (count($log_res) > 0) {
	if ($log_res[0]['password'] == $password) {
		$data['status'] = true;
		$data['msg'] = "Authenticate";
		$_SESSION["id"] = $username;
		echo json_encode($data);
		exit;
	} else {
		$data['status'] = false;
		$data['msg'] = "Wrong Userid or  Password";
		echo json_encode("$data");
		exit;
	}


} else {
	$data['status'] = false;
	$data['msg'] = "Wrong userid or password";
	echo json_encode("$data");
	exit;

}

ob_end_flush();
exit();
?>