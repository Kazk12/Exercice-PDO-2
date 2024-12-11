<?php

require_once '../utils/connect_db.php';

// Vérifier si la méthode de la requête est POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../create_rdv.php?error=1'); // Redirection si ce n'est pas un POST
    exit;
}

// Valider les données reçues
if (
    !isset($_POST['meeting-time'], $_POST['idPatient']) ||
    empty($_POST['meeting-time']) ||
    empty($_POST['idPatient'])
) {
    header('Location: ../create_rdv.php?error=2'); // Redirection si des champs sont manquants ou vides
    exit;
}

// Assainir les données (prévenir les attaques XSS)
$dateHour = htmlspecialchars(trim($_POST['meeting-time']));
$idPatient = htmlspecialchars(trim($_POST['idPatient']));

// Optionnel : Vous pouvez ajouter des validations supplémentaires ici
// Par exemple : vérifier que le format de la date est valide ou que l'ID patient existe dans la base de données

// Insérer les données dans la base de données

$sql = "INSERT INTO appointments (dateHour, idPatients) VALUES (:dateHour, :idPatients)";

try {
    $stmt = $pdo->prepare($sql); // Préparer la requête
    $stmt->execute([
        ':dateHour' => $dateHour,
        ':idPatients' => $idPatient
    ]); // Exécuter la requête avec les données

    // Si l'insertion réussie, rediriger vers la liste des rendez-vous
    header('Location: ../rendez-vous/liste-rdv.php');
    exit;

} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
    exit;
}
