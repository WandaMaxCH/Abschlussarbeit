<?php

require_once 'Reservation.php';

//ask if ? > is needed at the end
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
exit;*/


//Verbindungsdaten
$servername = "database";
$username = "root";
$password = "";
$dbname = "reservationen";

//Verbindung mit DB
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbindung fehlgeschlagen: " . $e->getMessage());
}



// POST-Daten prüfen
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !ReservationHandler::isValidPostData($_POST)) {
    die("Ungültige Daten.");
}

$privateKey = ReservationHandler::generateKey();
$publicKey = ReservationHandler::generateKey();


$query = $conn->prepare("INSERT INTO reservationen (Datum, Von, Bis, Zimmer, Bemerkung, Teilnehmer, Private_Key, Public_Key)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");


if (ReservationHandler::saveToDatabase($conn, $_POST, $privateKey, $publicKey)) {
    // Weiterleitung per POST
    echo "
    <form id='weiterleitung' method='POST' action='confirmation.php'>
        <input type='text' name='privateKey' value='" . htmlspecialchars($privateKey) . "'>
        <input type='text' name='publicKey' value='" . htmlspecialchars($publicKey) . "'>
    </form>
    <script>document.getElementById('weiterleitung').submit();</script>";
    exit;
} else {
    die('Fehler beim Speichern: ' . $query->errorInfo()[2]);
}

// Verbindung schliessen
$query->close();
$conn->close();

?>



