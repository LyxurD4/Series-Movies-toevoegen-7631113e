<?php
$host="localhost";
$db = "netland";
$username = "root";
$password = "";

$dsn= "mysql:host=$host;dbname=$db";
try {
    // create a PDO connection with the configuration data
    $conn = new PDO($dsn, $username, $password);
    
    // display a message if connected to database successfully
    if ($conn) {
    }
} catch (PDOException $e) {
    // report error message
    echo $e->getMessage("");
}
if (isset($_POST["nieuweSerie"])) {
    $titleVar = $_POST["titleInput"]; 
    $ratingVar = $_POST["ratingInput"]; 
    $descriptionVar = $_POST["descriptionInput"]; 
    $awardVar = $_POST["awardInput"]; 
    $seasonVar = $_POST["seasonInput"]; 
    $countryVar = $_POST["countryInput"]; 
    $languageVar = $_POST["languageInput"]; 

    $query = "INSERT INTO series (title, rating, description, has_won_awards, seasons, country, language)
    VALUES ('$titleVar', $ratingVar, '$descriptionVar', $awardVar, $seasonVar, '$countryVar', '$languageVar')";
    $conn->query($query);
    // exit($query);
    header("Refresh: 0; url=index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe serie</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <a href="index.php">Terug</a>
    <h1>Nieuwe Serie</h1>
    <form action="nieuweSerie.php" method="POST">
        <p>Title - <input type="text" name="titleInput"></p>
        <p>Rating - <input type="text" name="ratingInput"></p>
        <p>Description - <textarea name="descriptionInput" cols="30" rows="10"></textarea></p>
        <p>Awards - <input type="number" name="awardInput"></p>
        <p>Seasons - <input type="number" name="seasonInput"></p>
        <p>Country - <input type="text" name="countryInput"></p>
        <p>Language - <input type="text" name="languageInput"></p>
        <input type="submit" value="Submit nieuwe serie" name="nieuweSerie">
    </form>
</body>
</html>