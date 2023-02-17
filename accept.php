<?php

require 'connectDB.php';
session_start();
if (isset($_SESSION["id"])) {

    ?>
    <?php

    $sql = "SELECT * FROM addride where username = '$_SESSION[id]'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql1 = "SELECT * FROM ride_req WHERE id = {$_POST['id']}";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);





    $email = "$row[email]";
    $subject = 'Details of Rider';
    $message = "Hello $_SESSION[id],";
    $message .= "\r\n\r\nRider name = $row1[u1]";
    $message .= "\r\nMobile No. =  $row1[u1mobile]";
    $message .= "\r\nPickup Point =  $row1[pickup]";
    $message .= "\r\n\r\nThank You.";
    $headers .= 'From: noreply @ company . com';
    mail($email, $subject, $message, $headers);

    $email1 = "$row1[u1email]";
    $subject1 = 'Details of Ride';
    $message1 = "Hello $row1[u1],";
    $message1 .= "\r\n\r\nOwner name = $row[username]";
    $message1 .= "\r\nMobile No. =  $row1[mobile]";
    $message1 .= "\r\nTime =  $row[time]";
    $message1 .= "\r\nDate =  $row[date]";
    $message1 .= "\r\nSource =  $row[source]";
    $message1 .= "\r\nDestination =  $row[destination]";
    $message1 .= "\r\nPickup Point =  $row1[pickup]";
    $message1 .= "\r\nVehicle Name =  $row[vehiclename]";
    $message1 .= "\r\nVehicle Number =  $row[vehiclenumber]";
    $message1 .= "\r\nVehicle Color =  $row[vehiclecolour]";
    $message1 .= "\r\n\r\nThank You";
    $headers1 .= 'From: noreply @ company . com';
    mail($email1, $subject1, $message1, $headers1);


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