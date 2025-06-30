<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bestätigung</title>
  <!--
  <script>
    function generatePassword() {
      var length = 8,
              charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
              retVal = "";
      for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
      }
      return retVal;
    }
  </script>-->
</head>
<>
<h1>Danke für Ihre Reservation!</h1>
<h3>Bitte merken Sie Ihr public- und private key um später Ihre Reservation anschauen zu können.</h3>
<h3>Ihr private-key:</h3>
<h4>(mit den können Sie Ihre Reservation bearbeiten)</h4>

<input type="text" id="privateKey" value="<?= htmlspecialchars($_POST['privateKey'] ?? '') ?>" readonly>

<h3>Ihr public-key:</h3>
<h4>(mit den können Sie Ihre Reservation einblenden)</h4>

<input type="text" id="publicKey" value="<?= htmlspecialchars($_POST['publicKey'] ?? '') ?>" readonly>


<a href="index.html">Zurück zur Hauptseite</a>



</body>
</html>