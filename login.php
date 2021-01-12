<?php
require ('db.php');
if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $password = $_POST['password'];
   $getUserQuery = 'SELECT * FROM users WHERE email = :email AND password = :password';
   $stmt = $connection->prepare($getUserQuery);
   $stmt->bindParam(':email', $email);
   $stmt->bindParam(':password', $password);
   $stmt->execute();
   $user = $stmt->fetchAll(PDO::FETCH_OBJ);
   //check if user exists
   if($user){
       $_SESSION['email'] = $user[0]->email;
       header('Location:home.php');
   }
   else {
       echo "<script>
            alert('Check your email or password');
            location='login.php';
         </script>";
       die();
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<div class="container-contact100">
    <div class="wrap-contact100">
        <form class="contact100-form validate-form" method="POST">
				<span class="contact100-form-title">
					Login to System
				</span>
            <div class="wrap-input100 validate-input" data-validate="Email is required">
                <span>Email</span>
                <br>
                <br>
                <input class="input100" type="text" name="email" placeholder="Your email">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Password is required">
                <span>Password</span>
                <br>
                <br>
                <input class="input100" type="password" name="password" placeholder="Your password">
                <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn">
                <div class="wrap-contact100-form-btn">
                    <div class="contact100-form-bgbtn"></div>
                    <button class="contact100-form-btn" name="submit">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/animsition/js/animsition.min.js"></script>
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<script src="vendor/countdowntime/countdowntime.js"></script>
<script src="js/main.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
</body>
</html>

