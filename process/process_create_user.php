
<?php

require_once '../utils/connect_db.php';



$sql = "INSERT INTO patients (lastname, firstname, birthdate, phone, mail)
 VALUES (:lastname, :firstname, :birthdate, :phone, :mail)";

try {
    $stmt = $pdo->prepare($sql);
    $patients = $stmt->execute([
        ':lastname' => $_POST["lastname"],
        ':firstname' => $_POST["firstname"],
        ':birthdate' => $_POST["birthdate"],
        ':phone' => $_POST["phone"],
        ':mail' => $_POST["email"],
    ]); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat




} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}



// INSERER ICI validation du formulaire


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../create_user.php?error=1');
    return;
}

if (
    !isset(
        $_POST['lastname'],
        $_POST['firstname'],
        $_POST['birthdate'],
        $_POST['email'],
        $_POST['phone']
    )
) {
    header('location: ../create_user.php?error=2');
    return;
}

if (
    empty($_POST['lastname']) ||
    empty($_POST['firstname']) ||
    empty($_POST['birthdate']) ||
    empty($_POST['email']) ||
    empty($_POST['phone'])
) {
    header('location: ../create_user.php?error=3');
    return;
}

// input sanitization
$firstname = htmlspecialchars(trim($_POST['firstname']));
$lastname = htmlspecialchars(trim($_POST['lastname']));
$birthdate = htmlspecialchars(trim($_POST['birthdate']));
$email = htmlspecialchars(trim($_POST['email']));


// a remplir en fonction de vos prerequis
if(
    strlen($firstname) > 50 ||
    strlen($lastname) > 50 
    
) {
    // redirection si c'est pas bon
}


// optionnel regex
// if (!preg_match('[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]', $email)) {
//     die("l'email est pas conforme");
// }

// etc .......



// mon code une fois que toute les données sont bonnes


header('Location: ../index.php');


























$sql = "INSERT INTO utilisateur (nom, prenom)
 VALUES (:nom, :prenom)";

try {
    $stmt = $pdo->prepare($sql);
    $patients = $stmt->execute([
        ':nom' => $_POST["nom"],
        ':prenom' => $_POST["prenom"]
    ]); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat




} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


header("Location: ../index.php");
// exit;