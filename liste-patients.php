
<?php

require_once './utils/connect_db.php';




$sql = "SELECT * FROM `patients`";

try {
    $stmt = $pdo->query($sql);
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

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
    <link rel="stylesheet" href="./listePatients.css">
</head>

<body>
    

<a href="./create_user.php">Create a new patient</a>
<a href="./index.php">Index.php</a>




<ol>
        <h1>Liste des patients :</h1>

        <?php
        foreach ($patients as $patient) {
        ?>
            <li>Nom : <?= $patient['lastname']  ?>     |     Prénom : <?= $patient['firstname']  ?>   </li>
            <a href="./profil-patient.php?numeroId=<?= $patient["id"] ?>">Voir le profil</a>


        <?php
        }

        ?>

    </ol>






</body>

</html>
