<?php

			require'../connectDB.php';
						session_start();
							if(isset($_SESSION["id"]))
{
	?>
<!DOCTYPE HTML>
<html>
	<head>
		<title> Deshboard </title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> 
			addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
		</script>
		
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="../css/main.css" rel='stylesheet' type='text/css' />
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		
		<link href="../css/font-awesome.css" rel="stylesheet"> 
		<link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
		<link rel="stylesheet" type="text/css" media="screen and (max-width: 360px)" href="../portrait.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 361px) and (max-width: 480px)" href="../landscape.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 481px)" href="../desktop.css">
		<script src="../js/Chart.js"></script>
		<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script src="../js/wow.min.js"></script>
		<script>
			 new WOW().init();
		</script>
		<script src="../js/jquery-1.10.2.min.js"></script>
		
		<!-- <style>
		
			body {background-image:url("../image/mef.jpg");background-repeat:no-repeat;
				  background-position: 100% 100%;
				  background-size: cover;
				  background-attachment: fixed;}
			header .head h1 {font-family:aguafina-script;text-align: center;color:#ddd;}
			header .head img {float: left;}
			header .opt {float: right;margin: -100px 20px 0px 0px}
			header .opt a {text-decoration: none;font-family:cursive;text-align: center;font-size:20px;color:red;margin-right: 15px}
			header .opt a:hover {opacity: 0.8;cursor: pointer;}
			header .opt #inp {padding:3px;margin:0px 0px 0px 33px;background-color:#00A8A9;font-family:cursive;font-size:16px; opacity: 0.6;color:red;}
			header .opt #inp:hover {background-color: #00A8A9; opacity: 0.8;}
			header .opt input {padding-left:5px;margin:2px 0px 3px 20px;border-radius:7px;border-color: #A40D0F ;background-color:#8E8989; color: white;}
			header .opt p {font-family:cursive;text-align: left;font-size:19px;color:#f2f2f2;}
			.export {margin: 0px 0px 10px 20px; background-color:#900C3F ;font-family:cursive;border-radius: 7px;width: 145px;height: 28px;color: #FFC300; border-color: #581845;font-size:17px}
			.export:hover {cursor: pointer;background-color:#C70039}
			#table {
				font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
				border-collapse: collapse;
				width: 100%;
			}

			#table td, #table th {
				border: 1px solid #ddd;
				padding: 8px;
				 opacity: 0.6;
			}

			#table tr:nth-child(even){background-color: #f2f2f2;}
			#table tr:nth-child(odd){background-color: #f2f2f2;opacity: 0.9;}

			#table tr:hover {background-color: #ddd; opacity: 0.8;}

			#table th {
				 opacity: 0.6;
				padding-top: 12px;
				padding-bottom: 12px;
				text-align: left;
				background-color: #00A8A9;
				color: white;
			}
			
		</style> -->
	</head>
	
	<body>
	
		

<nav class="navbar navbar-expand-lg navbar-light navbar-inverse">
  <a class="navbar-brand" href="desh.php">Go Buddy</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto"></ul>
    <ul class="navbar-nav">
        
        <li class="nav-item">
        <a class="nav-link nav-right" href="logout.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>

<TABLE id='table'>
			
<?php
				$id = $_SESSION['id'];
				$sql = "SELECT * FROM users_tmp";
				$result=mysqli_query($conn,$sql);

				if (mysqli_num_rows($result) > 0)
				{
				    ?>
				    <TR>
				<TH>User Name</TH>
				<TH>Gr No.</TH>
				<TH>Gender</TH>
				<TH>Email Address</TH>
				<TH>Moblie Number</TH>
				<TH>Id Card</TH>
				<TH colspan="2">Approve/Disapprove</TH>
				
			</TR>
			<?php
					while ($row = mysqli_fetch_assoc($result))
					{
				?>
						<TR>
						<TD><?php echo $row['username'];?></TD>
						<TD><?php echo $row['grno'];?></TD>
						<TD><?php echo $row['gender'];?></TD>
						<TD><?php echo $row['email'];?></TD>
						<TD><?php echo $row['mobile'];?></TD>
						<TD><?php echo "<img src='../idcard/$row[image]'  height='250' width='400'/>";?></TD>
						
						
						<TD>
							<form action='approve.php?id="<?php echo $row['id']; ?>"' method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
								<input type="submit" name="update" value="Approve">
							</form>
						</TD>
						<TD>
							<form action='disapprove.php?id="<?php echo $row['id']; ?>"' method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
								<input type="submit" name="delete" value="Disapprove">
							</form>
						</TD>
						</TR>
				<?php
					}
				}
				else
				{
				    ?>
				<h3>Nothing To Show...</h3>
				<?php
				}
				?>
				</table>
 

	</body>
</html>
<?php
}
			else
			header("location: index.php");exit;
			?>
		
		<?php
				mysqli_close($conn); // Closing Connection with Server
				session_destroy();
			?>