

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<form action="./process/process_create_user.php" method="post">

<label for="lastname">Enter your lastname :</label>
<input type="text" name="lastname" id="lastname">

<label for="firstname">Enter your firstname :</label>
<input type="text" name="firstname" id="firstname">

<label for="birthdate">Birthday:</label>
<input type="date" id="birthdate" name="birthdate">

<label for="phone">Enter your phone number :</label>
<input type="tel" id="phone" name="phone" />

<label for="email">Enter your email :</label>
<input type="email" name="email" id="email">


<input type="submit" value="Create a new patient">


</form>

<a href="./index.php">Vers index.php</a>


</body>

</html>