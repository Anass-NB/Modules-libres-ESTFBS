<form method="post">
  <input type="text" placeholder="nom" name="nom">
  <input type="text" placeholder="prenom" name="prenom">
  <input type="text" placeholder="Apogee" name="apogee">
  <input type="date" placeholder="Date naissance" name="date_naissance">
  <input type="text" placeholder="filliere" name="filiere">
  <input type="submit" value="Ajouter" name="submit">

</form>


<?php

if (isset($_POST["submit"])) {
  include "connexion.php";
  $nom = $_POST["nom"] ;
  $prenom = $_POST["prenom"] ;
  $apogee = $_POST["apogee"] ;
  $date_naissance = $_POST["date_naissance"] ;
  $filiere = $_POST["filiere"] ;
  $statut = 1;
  $sql = "INSERT INTO `etudiant`  (nom, prenom, apogee,date_naissance,filiere,statut) VALUES (:nom, :prenom, :apogee,:date_naissance,:filiere,:statut)";
  $query = $db_con->prepare($sql);

  $query->bindParam(':nom', $nom, PDO::PARAM_STR);
  $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
  $query->bindParam(':date_naissance', $date_naissance, PDO::PARAM_STR);
  $query->bindParam(':apogee', $apogee, PDO::PARAM_STR);
  $query->bindParam(':filiere', $filiere, PDO::PARAM_STR);
  $query->bindParam(':statut', $statut, PDO::PARAM_STR);
  $query->execute();
  header("Location: gestion.php");
}
?>