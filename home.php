<?php
//check if user is logged in
require ('loginCheckSession.php');
//require('PHPMailer/src/PHPMailer.php');
//require('PHPMailer/src/SMTP.php');
//require('PHPMailer/src/Exception.php');
////get all persons
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;
//function generateUniqueTokenForPersons(PDO $pdo){
//    $senderEmail = 'shkulaku98renato@gmail.com';
//    //get all users
//    $getPersonsQuery = "SELECT * FROM persons";
//    $stmt = $pdo->prepare($getPersonsQuery);
//    $stmt->execute();
//    $persons = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    foreach ($persons as $person){
//        $mail = new PHPMailer(true);
//        $firstLetterOfName = $person['name'][0];
//        $firstLetterOfSurname = $person['surname'][0];
//        (int)$personId = $person['id'];
//        //generate unique token based on first character to be first letter of name and last character to be first letter of surname
//        $token = $firstLetterOfName.uniqid().$firstLetterOfSurname;
//        //set token to the database
//        $setTokenQuery = "UPDATE persons SET token = :token where id = :personId";
//        $stmt = $pdo->prepare($setTokenQuery);
//        $stmt->bindParam(':token',$token);
//        $stmt->bindParam(':personId',$personId);
//        $stmt->execute();
//        //Server settings and send email
//        $mail->SMTPDebug = 2;                      // Enable verbose debug output
//        $mail->Debugoutput = 'html';
//        $mail->isSMTP();                                            // Send using SMTP
//        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
//        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//        $mail->Username   = 'shkulaku98renato@gmail.com';                     // SMTP username
//        $mail->Password   = 'Hello1@.';                               // SMTP password
//        $mail->SMTPSecure = 'tls';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
//        $mail->Port       = 587;
//        //Recipients
//        $mail->setFrom($senderEmail, 'Education Today');
//        $mail->addAddress($person['email'], $person['name']);     // Add a recipient
////        $mail->addReplyTo($senderEmail,  'Education Today');
//        // Content
//        $mail->isHTML(true);
//        // Set email format to HTML
//        $mail->Subject = 'TEST____Feedback Form';
//        $mail->Body    = '<p><strong>Please submit the form to get the certificate!</strong></p><br> <strong> <a href="http://localhost/EducationToday/feedback_form.php?token='.$token.'">Submit Form</a></strong>';
//        if($mail->send()){
//            //set 1 if mail is sent
//            $mailSentQuery = "UPDATE persons SET mail_sent = 1 WHERE id = :personId AND token = :token";
//            $stmt = $pdo->prepare($mailSentQuery);
//            $stmt->bindParam(':personId', $personId);
//            $stmt->bindParam(':token', $token);
//            $stmt->execute();
////            $mail->isSendmail();
//            echo "Email has been sent";
//        } else {
//            echo "Mailer Error: " . $mail->ErrorInfo;
//        }
//        $mail = null;
//    }
//    return $persons;
//}
//generateUniqueTokenForPersons($connection);
//print_r($usersData);
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

            <div class="container-contact100-form-btn">
                <div class="wrap-contact100-form-btn">
                    <div class="contact100-form-bgbtn"></div>
                    <a href="generateToken.php">
                        <button class="contact100-form-btn">
                          <span>
                            Generate Tokens
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                          </span>
                       </button>
                    </a>
                </div>
            </div>
            <div class="container-contact100-form-btn">
                <div class="wrap-contact100-form-btn">
                    <div class="contact100-form-bgbtn"></div>
                    <button class="contact100-form-btn">
                        <span>
                            Send Emails
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </div>
<!--        </form>-->
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
