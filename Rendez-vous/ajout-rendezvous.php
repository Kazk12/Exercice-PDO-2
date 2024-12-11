
<?php 

require_once '../utils/connect_db.php';

$patient = "SELECT lastname, id 
FROM patients;
";


try {
    $stmt = $pdo->query($patient);
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch patient details

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
<form action="../process/process_create_rdv.php" method="post">

<label for="idPatient">Nom du patient</label>
        <select name="idPatient" id="idPatient">
    <?php
    foreach ($patients as $patient) {
        echo '<option value="' . $patient["id"] . '">' . $patient["lastname"] . '</option>';
    }
    ?>
</select>

<label for="dateHour">Enter your patient date and hour :</label>
<input type="datetime-local" name="meeting-time" id="meeting-time">






<input type="submit" value="Create a new rdv">


</form>

<a href="./index.php">Vers index.php</a>


</body>

</html>