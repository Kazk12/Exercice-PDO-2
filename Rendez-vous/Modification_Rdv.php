<?php 

require_once '../utils/connect_db.php';

// Récupérer les données envoyées par le formulaire
$dateHour = $_POST["meeting-time"];
$idPatient = $_POST["idPatient"];  // Correction : vous devez récupérer "idPatient", pas "id"
$id = $_POST["id"];

// Préparer la requête avec des paramètres liés pour éviter les injections SQL
$sql = "UPDATE appointments SET dateHour = :dateHour, idPatients = :idPatient WHERE id = :id";

// Préparer la requête
$stmt = $pdo->prepare($sql);

// Lier les paramètres
$stmt->bindParam(':dateHour', $dateHour);
$stmt->bindParam(':idPatient', $idPatient, PDO::PARAM_INT);  // Assurez-vous que idPatient est un entier
$stmt->bindParam(':id', $id, PDO::PARAM_INT);  // Assurez-vous que id est un entier

// Exécuter la requête
if ($stmt->execute()) {
    // Si la mise à jour est réussie, rediriger vers la page principale
    header('Location: ../index.php');
    exit;  // Il est important d'appeler exit après un header pour arrêter l'exécution du script.
} else {
    // Si une erreur se produit lors de l'exécution
    echo "Erreur lors de la mise à jour du rendez-vous.";
}

?>
