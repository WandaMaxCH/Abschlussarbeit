<?php

//Verbindungsdaten
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservierungen";

//Verbindung mit DB
$conn = new PDO("$servername", "$username", "$password", "$dbname");

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

//Daten DB Tabelle
$datum = $_POST['datum'];
$von = $_POST['von'];
$bis = $_POST['bis'];
$zimmer = $_POST['zimmer'];
$bemerkung = $_POST['bemerkung'];
$teilnehmer = $_POST['teilnehmer'];
$privateKey = $_POST['privateKey'];
$publicKey = $_POST['publicKey'];


function generateKey($length = 8) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $key = '';
    for ($i = 0; $i < $length; $i++) {
        $key .= $characters[random_int(0, strlen($characters) - 1)];
    }
    return $key;
}

$privateKey = generateKey();
$publicKey = generateKey();

$query = $conn->prepare("INSERT INTO reservationen (datum, von, bis, zimmer, bemerkung, teilnehmer, privateKey, publicKey, privateKey)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?");

$query->bindParam("sssissss", $datum, $von, $bis, $zimmer, $bemerkung, $teilnehmer, $privateKey, $publicKey);


// Ausführen und Ergebnis prüfen
if ($query->execute()) {
    echo "
    <form id='weiterleitung' method='POST' action='confirmation.php'>
        <input type='text' name='privateKey' value='$privateKey' readonly>
        <input type='text' name='publicKey' value='$publicKey' readonly>
    </form>
    <script>document.getElementById('weiterleitung').submit();</script>
    ";
    exit();
}

// Verbindung schliessen
$query->close();
$conn->close();


?>