<!DOCTYPE HTML>
<html>
	<head>
		<title> Sign In </title>
		
			<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> 
			addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
		</script>
		
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="../css/style.css" rel='stylesheet' type='text/css' />
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
		
		<style>
		
			body {background-image:url("../image/mef.jpg");background-repeat:no-repeat;
				  background-position: 100% 100%;
				  background-size: cover;
				  background-attachment: fixed;}
		</style>
	</head>
	
	<body>
	
		<section>
			
					<div class="sign-in-form" >
						<div class="sign-in-form-top" >
							<p><a href="index.php" style="color: black;"><h3>Admin Login</h3></a></p>
						</div>
						<div>
							<div class="log-input">
								<div>	
									<label><h4>Admin Name:</h4></label>				
									<input type="text" name="username" id="username" autofocus="autofocus" required>

								</div>
								
						
							</div>
							<div class="log-input">
								<div>
									<label><h4>Password:</h4></label>
								 	<input type="password" name="password" id="password" required>
								</div>
								<button type="submit" class="btn btn-default w3ls-button" id="login_btn" onclick="myFunction()">Login</button> 
								
							
						

			
							</div>
						</div>
					</div>
				
		</section>
		
	
		<script type="text/javascript">
			$("#login_btn").click(function(e){
				e.preventDefault();

				  username=$("#username").val();
				  password=$("#password").val();
				  $.ajax({

							url:'admin_action.php',
							data: {
							  username:username,
							  userpassword:password,
							},
							type: "POST",
							dataType:'json',
							success: function(data){

								  console.log(data);
								  if(data['status']){
									$("#msg").html(data['msg']);
									window.location='deshboard.php';
								  }
								  else{
								      alert("Please fill correct details!!!");
									$("#msg").html(data['msg']);
									$("#password").val('');


								  }
								  $("#msg").show();
						  }
					});
			  
			});
		</script>

		<script src="../js/jquery.nicescroll.js"></script>
		<script src="../js/scripts.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.js"
				integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
				crossorigin="anonymous">
		</script>
		<script src="../js/jquery.min.js"></script>