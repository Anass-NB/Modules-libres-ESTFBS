<?php
session_start();
if(!$_SESSION['connect_admin']){
  header("Location: login.php");
}

if (isset($_POST["submit"])) {
  include "connexion.php";
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $apogee = $_POST["apogee"];
  $date_naissance = $_POST["date_naissance"];
  $filiere = $_POST["filiere"];
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
  header("Location: etudiants.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Ajouter un etudiant</title>
</head>

<body class="bg-light">
  <div class="container">
    <a href="gestion.php" class="btn btn-sm btn-success my-2">back</a>

    <div class="card">
      <div class="card-header">
        <h1>Ajouter un etudiant</h1>

      </div>
      <div class="card-body">
        <form method="post">
          <div class="row">
            <div class="col-6">
              <div class="my-2">
                <label class="form-label">Nom</label>
                <input class="form-control" type="text" placeholder="nom" name="nom">
              </div>
              <div class="my-2">
                <label class="form-label">Prenom</label>
                <input class="form-control" type="text" placeholder="prenom" name="prenom">
              </div>
              <div class="my-2">
                <label class="form-label">Code Apogee</label>
                <input class="form-control" type="text" placeholder="Apogee" name="apogee">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="my-2">
                <label class="form-label">Date naissance</label>
                <input class="form-control" type="date" placeholder="Date naissance" name="date_naissance">
              </div>
              <div class="my-2">
                <label class="form-label">Filliere</label>
                <input class="form-control" type="text" placeholder="filliere" name="filiere">
              </div>
            </div>
          </div>
          <input type="submit" class="btn btn-primary" value="Ajouter" name="submit">


        </form>

      </div>
    </div>
  </div>
</body>

</html>