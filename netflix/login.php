<?php

	function canLogin($email, $password){
		// maak connectie met database
		$conn = new mysqli("localhost", "root", "", "netflix");
		// maakt quotas ('') ongedaan voor breach te voorkomen
		$email = $conn->real_escape_string($email);
		$query = "select * from users where email = '$email'";
		$result = $conn->query($query);
		$user = $result->fetch_assoc();
		if(password_verify($password, $user['password'])){
			return true;
		}else{
			return false;
		}
	}

	// detecteer submit
	if(!empty($_POST)){
		// velden uitlezen in variabelen
		$email = $_POST['email'];
		$password = $_POST['password'];

		// validatie: velden mogen niet leeg zijn
		if( !empty($email) && !empty($password) ){
			// indien niet leeg: login checken
			if(canLogin($email, $password)){
				session_start();
				$_SESSION['user'] = $email;
				// redirect index.php
				header("location: index.php");
			}else{
				$error = "Sorry, we couldn't log you in.";
			}

			
		}else{
			// indien leeg: error genereren
			$error = "Email and password are required";
		}
	}



?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>IMDFlix</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="netflixLogin">
		<div class="form form--login">
			<form action="" method="post">
				<h2 form__title>Sign In</h2>

				<?php 
					if(isset($error)):
				?>

				<div class="form__error">
					<?php echo $error ?>
				</div>

					<?php endif; ?>

				<div class="form__field">
					<label for="Email">Email</label>
					<input id="Email" name="email" type="text">
				</div>
				<div class="form__field">
					<label for="Password">Password</label>
					<input id="Password" name="password" type="password">
				</div>

				<div class="form__field">
					<input type="submit" value="Sign in" class="btn btn--primary">	
					<input type="checkbox" id="rememberMe"><label for="rememberMe" class="label__inline">Remember me</label>
				</div>
			</form>
		</div>
	</div>
</body>
</html>