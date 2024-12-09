
<?php

require_once './utils/connect_db.php';

$id = $_GET["numeroId"];
echo $id;


$sql = "SELECT id, lastName, firstName,phone,mail,birthdate FROM patients WHERE id LIKE {$id};";




try {
    $stmt = $pdo->query($sql);
    $users = $stmt->fetch(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    

<a href="./create_user.php">Create a new patient</a>




<?php
// foreach ($users as $user) {
?>
<ol>
    <li>Nom du patient : <?= $users['lastName']  ?> </li>
    <li> Prenom du patient : <?= $users['firstName']  ?>  </li>
    <li> date de naissance : <?= $users['birthdate']  ?>  </li>
    <li> Tel : <?= $users['phone']  ?>  </li>
    <li> Email : <?= $users['mail']  ?>  </li>


</ol>

<br>

<?php 

?>


    </ol>

  

    






</body>

</html>
