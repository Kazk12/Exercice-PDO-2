<?php 

require_once './utils/connect_db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $idToDelete = $_POST['idPatient'];


    // ligne pour supprimer tous les rdv associer au patient

    if ($idToDelete) {
        // Requête de suppression
        $sqlDeleteRdv = "DELETE FROM appointments WHERE idPatients = :id";
        $stmtDelete = $pdo->prepare($sqlDeleteRdv);
        $stmtDelete->bindParam(':id', $idToDelete, PDO::PARAM_INT);
        $stmtDelete->execute();


    }

    // Ligne pour supprimer le patient de la base de donnée
    if ($idToDelete) {
        // Requête de suppression
        $sqlDeletePatient = "DELETE FROM patients WHERE id = :id";
        $stmtDelete = $pdo->prepare($sqlDeletePatient);
        $stmtDelete->bindParam(':id', $idToDelete, PDO::PARAM_INT);
        $stmtDelete->execute();


    }
}


header('Location: ./liste-patients.php');



?>