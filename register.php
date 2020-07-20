<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration Form</title>

	<style type="text/css">

		body{
			background-color: aqua;
		}

		form{
			margin-top: 10px;
		}

		#container{
			border: 1px solid gray;
			border-radius: 10px;
			width: 500px;
			height: 280px;
			display: inline-block;
			padding: 20px 0px;
		}
		
		.formItem{
			margin: 10px;
		}


		#email{
			margin-left: 30px;
		}


		#password{
			margin-left: 10px;
		}

		#wrapper{
			text-align: center;
		}

	</style>

</head>
<body>
	<div id="wrapper">

		<div  style="text-align: center;">

			<img src="logo.png">

			<h1>UNIVERSITY OF DAR ES SALAAM</h1>

			<h1>ATTENDANCE REGISTER</h1>

		</div>

		<div id="container">
		
		<form action="registration.php" method="post">

			<?php include('error.php') ?>
			
			<div class="formItem">

				<label for="firstname">First Name</label>
				<input type="text" name="firstname" required>

			</div>

			<div class="formItem">

				<label for="lastname">Last Name</label>
				<input type="text" name="lastname" required>

			</div>

			<div class="formItem">

				<label for="email" id="email">Email</label>
				<input type="text" name="email" required>

			</div>

			<div class="formItem">
				<label for="password" id="password">Password</label>
				<input type="text" name="password" required>

			</div>

			Courses Teaching:
				<select>
					<option>IS 181</option>
					<option>IS 171</option>
					<option>CS 173</option>
				</select>
		

				<p><input type="submit" name="reg_user"></p>

			</form>

			

			<p>Already a user? <a href="login.php"><b>Log in</b></a></p>
			
		</div>

	</div>

</body>
</html>