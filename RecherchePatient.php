<?php

require_once './utils/connect_db.php';

// Vérifier si le formulaire de recherche a été soumis
if (isset($_POST['search'])) {
    // Préparer la requête pour rechercher un patient par nom ou prénom
    $stml = $pdo->prepare("SELECT * FROM `patients` WHERE `lastname` LIKE ? OR `firstname` LIKE ?");
    
    // Exécuter la requête avec le terme de recherche
    $stml->execute([ "%" . $_POST['search'] . "%", "%" . $_POST['search'] . "%"]);

    // Récupérer tous les résultats sous forme de tableau associatif
    $patients = $stml->fetchAll(PDO::FETCH_ASSOC);

    // Vérifier si des patients ont été trouvés
    if ($patients) {
        foreach ($patients as $patient) {
            // Afficher un lien vers le profil de chaque patient trouvé
            echo "Nom : " . $patient['lastname'] . " Prénom : " . $patient['firstname'] . "<br>";
            echo "<a href='./profil-patient.php?numeroId=" . $patient['id'] . "'>Voir le profil</a><br><hr>";
        }
    } else {
        // Si aucun patient n'est trouvé, afficher un message
        echo "Aucun patient trouvé pour ce terme de recherche. <br>";
        echo "<a href='./liste-patients.php'>Vers la page d'acceuil</a>";
    }
} else {
    echo "Veuillez entrer un terme de recherche.";
}

?>
