<!doctype html>
<html lang="en">
  <head>
  	<title>You Trend</title>
    <meta charset="utf-8">
	<meta name="google-signin-client_id" content="951771991751-b3gjjknakf26q0i8jahp4atn6pq91vu7.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
	 <meta name="google-signin-client_id" content="951771991751-b3gjjknakf26q0i8jahp4atn6pq91vu7.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

	</head>
	<body>
		<?php
			require('../Login/db.php');

			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				$username= $con -> real_escape_string($_POST['username']);
				$password = $con -> real_escape_string($_POST['pswd']);
				$age = $con -> real_escape_string($_POST['age']);
				$gender = $con -> real_escape_string($_POST['gender']);
				$email = $con -> real_escape_string($_POST['email']);
				$phone = $con -> real_escape_string($_POST['phone']);

				$sql_qry=mysqli_query($con, "SELECT * FROM user WHERE username='$username'");

				$res=mysqli_fetch_assoc($sql_qry);

				$err=array();
				
				if($res)
				{
					if($res['username'] === $username)
					{
						array_push($err, "Username exists!");
						function dupliCheck($msg,$url)
						{
							echo '<script language="javascript">alert("'.$msg.'");</script>';
							echo "<script>document.location = '$url'</script>";
							$con->close();
						}
						dupliCheck("Sorry.. The username and password already taken! Please try another one! ", "../Registration/register.php");
				
					}
				}
				if (count($err)==0)
				{
					$query= mysqli_query($con, "INSERT into user(username,pasword,age,gender,email,phone) VALUES ('$username','$password','$age','$gender','$email','$phone')");

					if ($query){
						function myAlert($msg,$url)
						{
							echo '<script language="javascript">alert("'.$msg.'");</script>';
							echo "<script>document.location = '$url'</script>";
						}
						myAlert("Your have Registered Sucessfully! Login to Continue.. ", "../Login/login.php");
					}	
				}
				else{
					echo "<h2 style='color:white;'>Error Inserting Data</h2>";
				}
			}
		?>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"> <img src="images/logo1.png" alt="logo1";>You Trend</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 d-flex img d-flex align-items-end" style="background-image: url(images/bg.jpg);">
							<div class="text w-100">
								<h2 class="mb-4">Welcome to You Trend</h2>
								<p><strong>Learn To Dance With Confidence</strong></p>
							</div>
			      </div>
						<div class="login-wrap p-4 p-md-9">
	      			<h3 class="mb-4" style="text-align:center;">Create an account</h3>
							<form action="register.php" method="post" class="signup-form">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group d-flex align-items-center">
										<label class="label" for="name">UserName</label>
										<input type="text" class="form-control" id="username" name="username" placeholder="Username" pattern="^[A-Za-z]*$" title="Username should have characters only no digits or special characters are allowed" required>
									</div>
									</div>
								  	<div class="col-md-12">
										<div class="form-group d-flex align-items-center">
				            			<label class="label" for="password">Password</label>
				              			<input type="password" class="form-control" id="pswd"  name="pswd" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password should contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
				           			</div></div>
									<div class="col-md-12">
										<div class="form-group d-flex align-items-center">
					      				<label class="label" for="email">Email Address</label>
					      				<input type="email" class="form-control" id="email" name="email" placeholder="johndoe@email.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Email Address should be in the following order: characters@characters.domain (characters followed by @ sign, followed by more characters and then a period '.' sign. After the period sign, add atleast 2 letters between a-z. )" required>
					      			</div></div>
									<div class="col-md-12">
										<div class="form-group d-flex align-items-center">
					      				<label class="label" for="phone">Phone no.</label>
					      				<input type="tel" class="form-control" id="phone" name="phone" placeholder="123-455-6758" pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" title="The phone numbers should be in one of the formats listed: (123) 345-6789, (123)345-6789, 123-345-6789, 1233456789" required>
					      			</div></div>
									<div class="col-md-12">
										<div class="form-group d-flex align-items-center">
				            			<label class="label" for="gender">Gender</label>
				              			<input type="text" id="gender" name="gender" class="form-control" placeholder="Gender" pattern="^(?:male|female|intersex|transgender|non-conforming|gender-variant|personal|eunuch|prefer-not-to-say|other)$" title="Please enter one of the following: male, female, intersex, transgender, non-conforming, gender-variant, personal, eunuch, prefer-not-to-say, other. ALL IN LOWERCASE." required>
				            		</div></div>
									<div class="col-md-12">
										<div class="form-group d-flex align-items-center">
				            			<label class="label" for="age">Age</label>
				              			<input type="number" class="form-control" id="age" name="age" placeholder="Age" min=5 max=90 title="The age should be between 5 to 90. Please enter a numeric value only." required>
				            		</div>
								</div>
									<div class="col-md-12 my-4">
										<div class="form-group">
				            	<div class="w-100">
					            	<label class="checkbox-wrap checkbox-primary">I agree all statements in terms of service
												  <input type="checkbox" checked>
												  <span class="checkmark"></span>
												</label>
											</div>
				            </div>
									</div>
									<div class="col-md-12">
										<div class="form-group" style="text-align:center;">
				            	<button type="submit" id="submit" name="submit" class="btn btn-secondary submit p-3">Create an account</button>
				            </div>
									</div>
								</div>

		          </form>
				  <div class="social-login text-center "> 
					<p class="or">
		          		<span>or</span>
		          	</p>
		      			<p class="mb-3 text-center">Signup with this service</p>
		      			<p class="social-media d-flex justify-content-center">
						<a href="#" class="g-signin2"></a>							
					</p>
	          	</div>
		          <div class="w-100 text-center">
								<p class="mt-4">I'm already a member! <a href="../Login/login.php">Sign In</a></p>
		          </div>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

