<?php 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
	<img src="images/logo.png" alt="logo" id="logo">
		<a href="#" id="fb-btn">log in with facebook</a>
		<div class="form__field">
			<input id="email" name="email" type="text" placeholder="Email or username">
		</div>
		<div class="form__field">
			<input id="password" name="password" type="password" placeholder="Password">
		</div>

		<div class="form__field">
			<input id="submit" type="submit" value="Log in" class="btn btn--primary">	
		</div>
	</form>
</body>
</html>