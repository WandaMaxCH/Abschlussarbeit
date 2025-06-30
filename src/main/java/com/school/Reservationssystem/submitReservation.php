<?php

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
exit;*/


//Verbindungsdaten
$servername = "localhost";
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

//Daten DB Tabelle
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datum = $_POST['Datum'];
    $von = $_POST['Von'];
    $bis = $_POST['Bis'];
    $zimmer = $_POST['Zimmer'];
    $bemerkung = $_POST['Bemerkung'];
    $teilnehmer = $_POST['Teilnehmer'];
    $privateKey = $_POST['Private_Key'];
    $publicKey = $_POST['Public_Key'];
} else {
die("Fehler: Kein POST erfolgt.");
}


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

$query = $conn->prepare("INSERT INTO reservationen (Datum, Von, Bis, Zimmer, Bemerkung, Teilnehmer, Private_Key, Public_Key)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");


if ($query->execute([$datum, $von, $bis, $zimmer, $bemerkung, $teilnehmer, $privateKey, $publicKey])) {
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


//$query->execute([$datum, $von, $bis, $zimmer, $bemerkung, $teilnehmer, $privateKey, $publicKey]);


// Ausführen und Ergebnis prüfen
/*if ($query->execute()) {
    echo "
    <form id='weiterleitung' method='POST' action='confirmation.php'>
        <input type='text' name='privateKey' value='$privateKey' readonly>
        <input type='text' name='publicKey' value='$publicKey' readonly>
    </form>
    <script>document.getElementById('weiterleitung').submit();</script>
    ";
    exit();
}*/

?>



