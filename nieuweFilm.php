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
if (isset($_POST["nieuweFilm"])) {
    $titelVar = $_POST["titelInput"];
    $duurVar = $_POST["duurInput"];
    $datumVanUitkomstVar = $_POST["datumVanUitkomstInput"];
    $trailerVar = $_POST["trailerInput"];
    $conn->query(
        "INSERT INTO films (titel, duur, datum_van_uitkomst, trailer)
        VALUES ('$titelVar', $duurVar, '$datumVanUitkomstVar', '$trailerVar')"
    );
    header("Refresh: 0; url=index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe film B R O E R</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <a href="index.php">Terug</a>
    <h1>Nieuwe film</h1>
    <form action="nieuweFilm.php" method="POST">
        <p>Titel <input name="titelInput" type="text"></p>
        <p>Duur <input name="duurInput" type="text"></p>
        <p>Datum van uitkomst <input name="datumVanUitkomstInput" type="text"></p>
        <p>Trailer <input name="trailerInput" type="text"></p>
        <input type="submit" value="Nieuwe film" name="nieuweFilm">
    </form>

</body>
</html>