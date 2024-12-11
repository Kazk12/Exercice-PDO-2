<?php

require_once './utils/connect_db.php';

$id = $_GET["numeroId"];



$appoint = "SELECT dateHour FROM appointments WHERE idPatients = {$id};";



try {
    $test = $pdo->query($appoint);
    $rdv = $test->fetchAll(PDO::FETCH_ASSOC); // Fetch patient details

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}



$sql = "SELECT id, lastname, firstname, phone, mail, birthdate FROM patients WHERE id LIKE {$id};";

try {
    $stmt = $pdo->query($sql);
    $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch patient details

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
    <link rel="stylesheet" href="style2.css">
    <style>
        #editForm {
            display: none;
        }
    </style>
</head>

<body>

<a href="./liste-patients.php">Revoir tous les patients</a>

<ol>
    <li>Nom du patient : <?= $user['lastname'] ?> </li>
    <li>Prenom du patient : <?= $user['firstname'] ?> </li>
    <li>Date de naissance : <?= $user['birthdate'] ?> </li>
    <li>Tel : <?= $user['phone'] ?> </li>
    <li>Email : <?= $user['mail'] ?> </li>
</ol>





<!-- Button to show the edit form -->
<button onclick="showEditForm()">Modifier les informations de ce patient</button>

<!-- Form to edit the patient's information -->
<div id="editForm">
    <h2>Edit Patient Information</h2>
    <form action="modification-patient.php" method="POST">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        
        <label for="lastName">Nom :</label>
        <input type="text" id="lastname" name="lastname" value="<?= $user['lastname'] ?>" required><br>

        <label for="firstName">Prénom :</label>
        <input type="text" id="firstname" name="firstname" value="<?= $user['firstname'] ?>" required><br>

        <label for="birthdate">Date d'anniversaire:</label>
        <input type="date" id="birthdate" name="birthdate" value="<?= $user['birthdate'] ?>" required><br>

        <label for="phone">Téléphone:</label>
        <input type="tel" id="phone" name="phone" value="<?= $user['phone'] ?>" required><br>

        <label for="mail">Email:</label>
        <input type="email" id="mail" name="mail" value="<?= $user['mail'] ?>" required><br>

        <button type="submit">Modifier les informations</button>
    </form>
</div>

<script>
    // Function to show the edit form
    function showEditForm() {
        var form = document.getElementById('editForm');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>



<div>
    <h2>
        Votre liste de rendez-vous :
    </h2>
    <?php 
        if (empty($rdv)) {
            echo "<p>Aucun rendez-vous trouvé pour ce patient.</p>";  
        } else {
            $i = 1;
            foreach($rdv as $individu){
                echo  $i . " :" . $individu["dateHour"] . " " . "<br>";
                $i +=1;
            }
        }
    ?>
</div>






</body>

</html>
