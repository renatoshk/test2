<?php
//connecting to database
$DB_HOST = "localhost";
$DB_USER = 'root';
$DB_PASS = "";
$DB_NAME = 'users_token';
//

//checking for connection
try {
    $connection = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
}
catch (PDOException $e){
   echo  $e->getMessage();
}
?>