
<?php
session_start();
include "connexion.php";
if (!$_SESSION["connect"]) {
  header('Location: index.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Espace Etudiant</title>
  <link rel="stylesheet" href="style.css">


</head>

<body class="container">

  <div class="container">
 
    <?php

    echo "<h1>Bonjour " . $_SESSION['user']["nom"]  . " " .  $_SESSION['user']["prenom"]  .  "</h1>";
    // if ($_SESSION['email'] === "kamal@gmail.com" || $_SESSION['email'] === "a.ali@gmail.com") {
    //   echo "Vous ne pouvez pas réaliser cette demande , <br> Veuillez  Contacter le service de scolarité";
    //   echo "<div style='display:none'>";
    // }
    ?>

    <!-- <div style="display: flex;justify-content: space-between;"> -->

    <div>
      <h3>Veuillez sélectionner au maximum 4 modules. Merci</h3>
      <h3>Demande de modules libres <span style="color: red;">(4 modules au maximum)</span></h3>
    </div>
    <div>
      <form action="deconnexion.php" method="post">
        <button style="background-color: #F44336;color: white;padding: 10px;border: none;cursor: pointer;" type="submit">Deconnexion</button>
      </form>
    </div>
  </div>
  <form action="selection.php" method="get">
    <input type="hidden" name="etudiant_nom" value="<?php echo $_SESSION['user']["nom"] ?>">
    <input type="hidden" name="etudiant_prenom" value="<?php echo $_SESSION['user']["prenom"] ?>">
    <input type="hidden" name="etudiant_apogee" value="<?php echo $_SESSION['user']["apogee"] ?>">
    <div class="selection" style="display: flex;">
      <!-- S4 -->
      <div style="margin-right: 40px;">
        <h2>S4</h2>
        <div>
          <label for="m21">M21:</label>
          <input type="checkbox" name="m21" id="m21" value="m21">
        </div>
        <div>
          <label for="m22">M22:</label>
          <input type="checkbox" name="m22" id="m22" value="m22">
        </div>
        <div>
          <label for="m23">M23:</label>
          <input type="checkbox" name="m23" id="m23" value="m23">
        </div>
        <div>
          <label for="m24">M24:</label>
          <input type="checkbox" name="m24" id="m24" value="m24">
        </div>
      </div>
      <!-- S6 -->

      <div>
        <h2>S6</h2>
        <div>
          <label for="m29">M29:</label>
          <input type="checkbox" name="m29" id="m29" value="m29">
        </div>
        <div>
          <label for="m30">M30:</label>
          <input type="checkbox" name="m30" id="m30" value="m30">
        </div>
        <div>
          <label for="m31">M31:</label>
          <input type="checkbox" name="m31" id="m31" value="m31">
        </div>
        <div>
          <label for="m32">M32:</label>
          <input type="checkbox" name="m32" id="m32" value="m32">
        </div>
      </div>
    </div>
    <input type="submit" value="Etape suivant" class="envoyer-btn">
  </form>
  </div>
  <!-- </div> -->

  <script src="script.js"></script>
</body>

</html>