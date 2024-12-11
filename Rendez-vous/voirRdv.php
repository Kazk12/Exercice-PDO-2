<?php

require_once '../utils/connect_db.php';

$id = $_GET["numeroId"];


$patient = "SELECT lastname, id 
FROM patients;
";


try {
    $stmt = $pdo->query($patient);
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch patient details

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}










$sql = "SELECT appointments.id, appointments.dateHour, appointments.idPatients, patients.lastname, patients.firstname 
FROM appointments 
INNER JOIN patients ON patients.id = appointments.idPatients
WHERE appointments.id LIKE {$id};";

try {
    $stmt = $pdo->query($sql);
    $rdv = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch patient details

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
    <link rel="stylesheet" href="./voirRdv.css">
    <style>
        #editForm {
            display: none;
        }
    </style>
</head>



<body>

<a href="./create_user.php">Create a new patient</a>

<ol>
    
    <li>Nom du patient: <?= $rdv['lastname'] ?> </li>
    <li>Date et heure du rdv : <?= $rdv['dateHour'] ?> </li>
    
</ol>


<!-- Button to show the edit form -->
<button onclick="showEditForm()">Edit Patient</button>

<!-- Form to edit the patient's information -->
<div id="editForm">
    <h2>Edit Rdv Information</h2>
    <form action="modification_Rdv.php" method="POST">
        <input type="hidden" name="id" value="<?= $rdv['id'] ?>">
        
        <label for="idPatient">Nom du patient</label>
        <select name="idPatient" id="idPatient">
    <?php
    foreach ($patients as $patient) {
        echo '<option value="' . $patient["id"] . '">' . $patient["lastname"] . '</option>';
    }
    ?>
</select>
        

        <label for="meeting-time">Changement de la date et heure:</label>
        <input type="datetime-local" id="meeting-time" name="meeting-time" value="<?= $rdv['dateHour'] ?>" required><br>

        

        <button type="submit">Update Patient</button>
    </form>
</div>

<script>
    // Function to show the edit form
    function showEditForm() {
        var form = document.getElementById('editForm');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>



</body>

</html>
