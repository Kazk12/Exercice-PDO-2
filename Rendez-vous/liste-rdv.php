
<?php

require_once '../utils/connect_db.php';




$sql = "SELECT appointments.id, patients.lastname FROM `appointments`
INNER JOIN patients ON patients.id = appointments.idPatients;";

try {
    $stmt = $pdo->query($sql);
    $rdv = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

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
    <link rel="stylesheet" href="./ListeRdv.css">
</head>

<body>
    


<a href="../index.php">Index.php</a>




<ol>
        <h1>Liste des rdv :</h1>

        <?php
        foreach ($rdv as $rd) {
          
            
        ?>
       
            <li>Nom Du patient: <?= $rd['lastname']  ?>  </li>
            <a href="./voirRdv.php?numeroId=<?= $rd["id"] ?>">Voir le profil</a>
            <form action="./supprimerRdv.php" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?');">
            <input type="hidden" name="id" value="<?= $rd['id'] ?>">
            <input type="submit" name="delete" value="Supprimer">
        </form>


        <?php
        }

        ?>

    </ol>

<a href="./ajout-rendezvous.php">Ajouter un rdv</a>




</body>

</html>
