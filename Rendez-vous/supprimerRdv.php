<?php 

require_once '../utils/connect_db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $idToDelete = $_POST['id'];
    if ($idToDelete) {
        // Requête de suppression
        $sqlDelete = "DELETE FROM appointments WHERE id = :id";
        $stmtDelete = $pdo->prepare($sqlDelete);
        $stmtDelete->bindParam(':id', $idToDelete, PDO::PARAM_INT);
        $stmtDelete->execute();


        echo "Rendez-vous supprimé avec succès!";
    }
}


header('Location: ./liste-rdv.php');



?>