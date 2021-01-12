<?php
//check is user is logged in
require ('loginCheckSession.php');
//get all users
function generateUniqueTokenForPersons(PDO $pdo){
    //get all persons
    $getPersonsQuery = "SELECT * FROM persons";
    $stmt = $pdo->prepare($getPersonsQuery);
    $stmt->execute();
    $persons = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($persons as $person){
        $firstLetterOfName = $person['name'][0];
        $firstLetterOfSurname = $person['surname'][0];
        $token = $firstLetterOfName.uniqid().$firstLetterOfSurname;
        (int)$personId = $person['id'];
        if(isset($_POST['generate_token'])){
            $setTokenQuery = "UPDATE persons SET token = :token where id = :personId";
            $stmt = $pdo->prepare($setTokenQuery);
            $stmt->bindParam(':token',$token);
            $stmt->bindParam(':personId',$personId);
            $stmt->execute();
        }
    }
    return $persons;
}
$personsData = generateUniqueTokenForPersons($connection);
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
        <form method="post">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Renato</td>
                    <td>Shkulaku</td>
                    <td>shkulakurenato@gmail.com</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Renato2</td>
                    <td>Shkulaku</td>
                    <td>rshkulaku@turgutozal.edu.al</td>
                </tr>
                </tbody>
            </table>
            <div class="container-contact100-form-btn">
                <div class="wrap-contact100-form-btn">
                    <div class="contact100-form-bgbtn"></div>
                    <button name="generate_token" class="contact100-form-btn">
							<span>
								Generate Token
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