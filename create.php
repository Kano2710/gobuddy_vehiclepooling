<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<title>User Reg</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="css/main.css" rel='stylesheet' type='text/css' />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light">
		<a class="navbar-brand" href="index.php">Go Buddy</a>
	</nav>
	<div class="head">
		<h3 align="center">Sign UP</h3>
	</div>
	<div>
		<div>
			<form method="POST" action="insert.php" enctype="multipart/form-data">

				<div class="container">

					<label><b>
							<h4>Name</h4>
						</b></label>
					<input type="text" class="form-control" placeholder="Enter Name" name="username" maxlength="50"
						title="Only name can be filled" autofocus="autofocus" required>

					<label><b>
							<h4>Password</h4>
						</b></label>
					<input type="password" class="form-control" placeholder="Enter Password" name="password"
						maxlength="50" title="Only name can be filled" required>


					<label><b>
							<h4>Gr No.</h4>
						</b></label>
					<input type="number" class="form-control" placeholder="Enter Gr No" name="grno" required>

					<label><b>
							<h4>E-mail</h4>
						</b></label>
					<input type="email" class="form-control" pattern="[a-z0-9._%+-]+@marwadi[a-z0-9.-]+\.[a-z]{2,}$"
						placeholder="Enter E-mail" name="email" maxlength="50" title="Enter Marwadi Email address only"
						required>



					<label><b>
							<h4>Mobile Number</h4>
						</b></label>
					<input type="text" class="form-control" pattern="[6-9]{1}[0-9]{9}" placeholder="Enter Mobile Number"
						name="mobile" title="Please, enter valid mobile Number" required>

					<div class="row">
						<label class=" col-sm-3 pt-0"><b>
								<h4>Gender</h4>
							</b></label>
						<div>
							<input type="radio" name="gender" value="Male" checked>
							Male
							<input type="radio" name="gender" value="Female">
							Female
						</div>
					</div>

					<label><b>
							<h4>Please, Upload Your ID Card</h4>
						</b></label></br>
					<input type="file" name="image" />

					</br>
					<input type="submit" name="insert" id="insert" value="Register" onclick="myFunction()"
						class="btn btn-info" />


				</div>
			</form>
		</div>



</body>

</html>
<script>
	function myFunction() {
		alert("We will send an e-mail after successfull verification of your details");
	}
</script>

<script>
	$(document).ready(function () {
		$('#insert').click(function () {
			var image_name = $('#image').val();
			if (image_name == '') {
				alert("Please Select Image");
				return false;
			}
			else {
				var extension = $('#image').val().split('.').pop().toLowerCase();
				if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
					alert('Invalid Image File');
					$('#image').val('');
					return false;
				}

			}
		});
	});  
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous">
	</script>
<script src="js/jquery.min.js"></script>