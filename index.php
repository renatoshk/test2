<?php
//database connection require
require('db.php');
require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');
require('PHPMailer/src/Exception.php');
//get all users
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

function generateUniqueTokenForUsers(PDO $pdo, PHPMailer $mail){
    $senderEmail = 'rshkulaku@turgutozal.edu.al';
    //get all users
    $getUsersQuery = "SELECT * FROM users";
    $stmt = $pdo->prepare($getUsersQuery);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $user){
        $firstLetterOfName = $user['name'][0];
        $firstLetterOfSurname = $user['surname'][0];
        (int)$userId = $user['id'];
        //generate unique token based on first character to be first letter of name and last character to be first letter of surname
        $token = $firstLetterOfName.uniqid().$firstLetterOfSurname;
        //set token to the database
        $setTokenQuery = "UPDATE users SET token = :token where id = :userId";
        $stmt = $pdo->prepare($setTokenQuery);
        $stmt->bindParam(':token',$token);
        $stmt->bindParam(':userId',$userId);
        $stmt->execute();
        //Server settings and send email
        $mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->Debugoutput = 'html';
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'rshkulaku@turgutozal.edu.al';                     // SMTP username
        $mail->Password   = 'Reksikuje2020@@.';                               // SMTP password
        $mail->SMTPSecure = 'tls';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;
        //Recipients
        $mail->setFrom($senderEmail, 'Education Today');
        $mail->addAddress($user['email'], $user['name']);     // Add a recipient
//        $mail->addReplyTo($senderEmail,  'Education Today');
        // Content
        $mail->isHTML(true);
        // Set email format to HTML
        $mail->Subject = 'Njoftim mbi aplikimin';
        $mail->Body = "Hello";

//        $mail->Body    = '<p><strong>Please submit the form to get the certificate!</strong></p><br> <strong> <a href="http://localhost/EducationToday/feedback_form.php?token='.$token.'">Submit Form</a></strong>';
        if($mail->send()){
            //set 1 if mail is sent
            $mailSentQuery = "UPDATE users SET mail_sent = 1 WHERE id = :userId AND token = :token";
            $stmt = $pdo->prepare($mailSentQuery);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
//            $mail->isSendmail();
            echo "Email has been sent";
        } else {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
    return $users;
}

$usersData = generateUniqueTokenForUsers($connection,$mail);
//print_r($usersData);