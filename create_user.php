

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./createUser.css">
</head>

<body>
<form action="./process/process_create_user.php" method="post">

<label for="lastname">Entrez votre nom :</label>
<input type="text" name="lastname" id="lastname">

<label for="firstname">Entrez votre prénom :</label>
<input type="text" name="firstname" id="firstname">

<label for="birthdate">Votre date de naissance :</label>
<input type="date" id="birthdate" name="birthdate">

<label for="phone">Entrez votre numéro de téléphone:</label>
<input type="tel" id="phone" name="phone" />

<label for="email">Entrez votre adresse mail :</label>
<input type="email" name="email" id="email">


<input type="submit" value="Crée un nouveau patient">


</form>

<a href="./index.php">Vers index.php</a>


</body>

</html>