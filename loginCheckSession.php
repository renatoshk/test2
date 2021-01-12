<?php
require ('db.php');
if(!$_SESSION['email']){
    header('Location:login.php');
}
?>