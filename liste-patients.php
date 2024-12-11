<?php

require_once './utils/connect_db.php';

// On détermine sur quelle page on se trouve
$currentPage = isset($_GET['page']) && !empty($_GET['page']) ? (int) $_GET['page'] : 1;

// On détermine le nombre total d'articles
$sql = 'SELECT COUNT(*) AS nb_articles FROM patients;';
$query = $pdo->prepare($sql);
$query->execute();
$result = $query->fetch();
$nbArticles = (int) $result['nb_articles'];

// On détermine le nombre d'articles par page
$parPage = 2;

// On calcule le nombre de pages total
$pages = ceil($nbArticles / $parPage);

// Calcul de l'offset
$offset = ($currentPage - 1) * $parPage;

// Requête SQL pour récupérer les patients avec la pagination
$sql = "SELECT * FROM `patients` LIMIT :offset, :limit";
$query = $pdo->prepare($sql);
$query->bindValue(':offset', $offset, PDO::PARAM_INT);
$query->bindValue(':limit', $parPage, PDO::PARAM_INT);
$query->execute();
$patients = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="listePatients.css?v=1.1">
</head>

<body>
    <a href="./create_user.php">Crée un nouveau patient</a>
    <a href="./index.php">Retour à l'accueil</a>

    <ol>
        <h1>Liste des patients :</h1>
        <form action="./RecherchePatient.php" method="post">
            <input type="text" name="search" placeholder="Rechercher un patient...">
            <button value="Search" type="submit">Rechercher</button>
        </form>

        <?php
        foreach ($patients as $patient) {
        ?>
            <li>Nom : <?= $patient['lastname'] ?> | Prénom : <?= $patient['firstname'] ?></li>
            <a href="./profil-patient.php?numeroId=<?= $patient['id'] ?>">Voir le profil</a>

            <form action="./supprimerPatientEtRdv.php" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?');">
                <input type="hidden" name="idPatient" value="<?= $patient['id'] ?>">
                <input type="submit" name="delete" value="Supprimer">
            </form>
        <?php
        }
        ?>
    </ol>

    <!-- Pagination -->
    <div class="pagination">
        <?php if ($currentPage > 1): ?>
            <a href="?page=<?= $currentPage - 1 ?>">Précédent</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $pages; $i++): ?>
            <a href="?page=<?= $i ?>" <?= $i === $currentPage ? 'style="font-weight: bold;"' : '' ?>><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($currentPage < $pages): ?>
            <a href="?page=<?= $currentPage + 1 ?>">Suivant</a>
        <?php endif; ?>
    </div>

</body>

</html>