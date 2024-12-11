<?php 

require_once './utils/connect_db.php';


$lastName = $_POST["lastname"];
$firstName = $_POST["firstname"];
$birthdate = $_POST["birthdate"];
$phone = $_POST["phone"];
$mail = $_POST["mail"];
$id = $_POST["id"];



$stmt = $pdo->prepare("update patients set lastname ='$lastName', firstname ='$firstName', phone ='$phone', mail ='$mail', birthdate ='$birthdate' WHERE id LIKE {$id};");
$stmt -> execute();



header('Location: ./index.php');



?>