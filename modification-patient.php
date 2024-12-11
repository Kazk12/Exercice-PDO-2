<?php 

require_once './utils/connect_db.php';


$lastName = $_POST["lastname"];
$firstName = $_POST["firstname"];
$birthdate = $_POST["birthdate"];
$phone = $_POST["phone"];
$mail = $_POST["mail"];
$id = $_POST["id"];




// $sql = "update patients set lastname ='$lastName', firstname ='$firstName', phone ='$phone', mail ='$mail', birthdate ='$birthdate' FROM WHERE id LIKE {$id};";

$stmt = $pdo->prepare("update patients set lastname ='$lastName', firstname ='$firstName', phone ='$phone', mail ='$mail', birthdate ='$birthdate' WHERE id LIKE {$id};");
$stmt -> execute();

// $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");






// try {
//     $stmt = $pdo->query($sql);
//     $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch patient details

// } catch (PDOException $error) {
//     echo "Erreur lors de la requete : " . $error->getMessage();
// }

header('Location: ./index.php');



?>