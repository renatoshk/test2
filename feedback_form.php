<?php
require('db.php');
$token = $_GET['token'];
//finduserbyToken
function getPersonByToken(PDO $pdo, $token){
    $getPersonQuery = 'SELECT * FROM persons WHERE token = :token';
    $stmt = $pdo->prepare($getPersonQuery);
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    $person = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $person;
}
$dataPerson = getPersonByToken($connection, $token);
if(empty($dataPerson)){
    echo "<script>
            alert('Person not found');
            location='index.php';
         </script>";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Conference Feedback Form</title>
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
        <form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Conference Feedback Form
				</span>
            <div class="wrap-input100">
                <span class="label-input100">Your Name:</span>
                <br>
                <br>
                 <span><?php echo $dataPerson[0]->name.' '.$dataPerson[0]->surname ?></span>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" >
                <span class="label-input100">Email :</span>
                <br>
                <br>
                <span><?php echo $dataPerson[0]->email ?></span>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input ">
                <span>Overall, how would you rate the event?</span>
                <br>
                <br>
                <div class="radio ">
                    <label><input  type="radio" name="rate"> Excellent</label>
                </div>
                <div class="radio ">
                    <label><input type="radio" name="rate" > Very good</label>
                </div>
                <div class="radio ">
                    <label><input type="radio" name="rate" > Good</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="rate" > Fair</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="rate" > Poor</label>
                </div>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input ">
                <span>How likely are you to recommend Education Today to a friend or colleague?</span>
                <br>
                <br>
                <div class="radio-inline">
                    Not at all likely
                    <input type="radio" name="recommend" >
                    <input type="radio" name="recommend" >
                    <input type="radio" name="recommend" >
                    <input type="radio" name="recommend" >
                    <input type="radio" name="recommend" >
                    <input type="radio" name="recommend" >
                    <input type="radio" name="recommend" >
                    <input type="radio" name="recommend" >
                    <input type="radio" name="recommend" >
                    <input type="radio" name="recommend" >
                    Extremely likely
                </div>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Name is required">
                <span>What did you like about the event?</span>
                <br>
                <br>
                <input class="input100" type="text" name="name" placeholder="Your answer">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Name is required">
                <span>What did you dislike about the event?</span>
                <br>
                <br>
                <input class="input100" type="text" name="name" placeholder="Your answer">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input ">
                <span>How organized was the event?</span>
                <br>
                <br>
                <div class="radio-inline">
                    Too bad
                    <input type="radio" name="organized" >
                    <input type="radio" name="organized" >
                    <input type="radio" name="organized" >
                    <input type="radio" name="organized" >
                    <input type="radio" name="organized" >
                    <input type="radio" name="organized" >
                    <input type="radio" name="organized" >
                    <input type="radio" name="organized" >
                    <input type="radio" name="organized" >
                    <input type="radio" name="organized" >
                    Excellent
                </div>
            </div>
            <div class="wrap-input100 validate-input ">
                <span>Did you receive all of the information you needed before the event?</span>
                <br>
                <br>
                <div class="radio ">
                    <label><input  type="radio" name="information"> Yes</label>
                </div>
                <div class="radio ">
                    <label><input type="radio" name="information">No</label>
                </div>
                <div class="radio ">
                    <label><input type="radio" name="information">Other : </label>
                    <input class="input100" type="text" name="other_information">
                </div>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input ">
                <span>How easy was the registration process?</span>
                <br>
                <br>
                <div class="radio-inline">
                    Too much complicate
                    <input type="radio" name="registration_process" >
                    <input type="radio" name="registration_process" >
                    <input type="radio" name="registration_process" >
                    <input type="radio" name="registration_process" >
                    <input type="radio" name="registration_process" >
                    <input type="radio" name="registration_process" >
                    <input type="radio" name="registration_process" >
                    <input type="radio" name="registration_process" >
                    <input type="radio" name="registration_process" >
                    <input type="radio" name="registration_process" >
                    Extremely easy
                </div>
            </div>
            <div class="wrap-input100 validate-input ">
                <span>How do you feel about the length of the event?</span>
                <br>
                <br>
                <div class="radio ">
                    <label><input  type="radio" name="length"> Much too long</label>
                </div>
                <div class="radio ">
                    <label><input type="radio" name="length">Too long</label>
                </div>
                <div class="radio ">
                    <label><input type="radio" name="length" > About right</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="length" > Too short</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="length" > Much too short</label>
                </div>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input ">
                <span>Which session did you like most?</span>
                <br>
                <br>
                <div class="radio ">
                    <label><input  type="radio" name="session"> Andreas Schleicher</label>
                </div>
                <div class="radio ">
                    <label><input type="radio" name="session">Stephen Burnage</label>
                </div>
                <div class="radio ">
                    <label><input type="radio" name="session" >Albena Spasova</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="session" >Victoria Renfro</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="session" >Hidekazu Shoto</label>
                </div>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Name is required">
                <span>Is there any speaker/s you would like to see in the next event/s?</span>
                <br>
                <br>
                <input class="input100" type="text" name="name" placeholder="Your answer">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Name is required">
                <span>Is there anything else you would like to share about the event?</span>
                <br>
                <br>
                <input class="input100" type="text" name="name" placeholder="Your answer">
                <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn">
                <div class="wrap-contact100-form-btn">
                    <div class="contact100-form-bgbtn"></div>
                    <button class="contact100-form-btn">
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

