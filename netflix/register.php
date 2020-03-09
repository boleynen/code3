<?php
    if(!empty($_POST)){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConfirmation = $_POST['password_confirmation'];

        if(!empty($email)){
            // email is ok
            if(!empty($password) && $password === $passwordConfirmation){
                // passwords are ok
                $conn = new mysqli("localhost", "root", "", "netflix");

                $password = password_hash($password, PASSWORD_DEFAULT, ["cost"=>12]);
                session_start();
                $_SESSION['user'] = $email;
                header("location: index.php");

                $query = "INSERT INTO `users`(`email`, `password`) VALUES ('$email', '$password') ";

                $result = $conn->query($query);


            }else{
                $error = "Password cannot be empty and must match.";
            }
        }else{
            $error = "Email cannot be empty.";
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
    <div class="netflixLogin netflixLogin--register">
        <div class="form form--login">
            <form action="" method="post">
                <h2 form__title>Sign up for an account</h2>
 
                <?php if( isset($error) ): ?>
                <div class="form__error">
                    <p>
                        <?php echo $error; ?>
                    </p>
                </div>
                <?php endif; ?>
 
                <div class="form__field">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email">
                </div>
                <div class="form__field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>
 
                <div class="form__field">
                    <label for="password_confirmation">Confirm your password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                </div>
 
                <div class="form__field">
                    <input type="submit" value="Sign me up!" class="btn btn--primary"> 
                </div>
            </form>
        </div>
    </div>
</body>
</html>