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
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Patients</title>
    <link rel="stylesheet" href="style.css?v=1">

</head>

<body>

    <!-- Header Section -->
    <header class="header">
        <div class="container header-container">
            <h1>Gestion des Patients</h1>
            <nav class="nav">
                <ul>
                    <li><a href="./create_user.php">Créer un nouveau patient</a></li>
                    <li><a href="./liste-patients.php">Voir tous les patients</a></li>
                    <li><a href="./Rendez-vous/liste-rdv.php">Voir la liste des rendez-vous</a></li>
                    <li><a href="./CreateUserAndRdv/ajout-patient-rendez-vous.php">Ajouter un patient et un rdv</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <h2>Liste des Patients</h2>

        <div class="links">
            <a href="./create_user.php">Créer un nouveau patient</a>
            <a href="./liste-patients.php">Voir tous les patients</a>
            <a href="./Rendez-vous/liste-rdv.php">Voir la liste des rendez-vous</a>
            <a href="./CreateUserAndRdv/ajout-patient-rendez-vous.php">Ajouter un patient et un rdv en même temps</a>
        </div>
    </div>

</body>

</html>
