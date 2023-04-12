<?php
session_start();
  if(!$_SESSION['connect_admin']){
    header("Location: login.php");
  }

if (isset($_POST["submit"])) {
  include "connexion.php";

  $login = $_POST["login"];
  $password = $_POST["password"];
  $profil = $_POST["profil"];
  
  $statut = 1;
  $sql = "INSERT INTO `utilisateur`  (login, password, profil,statut) VALUES (:login, :password, :profil,:statut)";
  $query = $db_con->prepare($sql);

  $query->bindParam(':login', $login, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->bindParam(':profil', $profil, PDO::PARAM_STR);
  $query->bindParam(':statut', $statut, PDO::PARAM_STR);
  $query->execute();
  header("Location: utilisateurs.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Ajouter un utilisateur</title>
</head>

<body class="bg-light">
  <div class="container">
    <a href="gestion.php" class="btn btn-sm btn-success my-2">back</a>

    <div class="card">
      <div class="card-header">
        <h1>Ajouter un utilisateur</h1>

      </div>
      <div class="card-body">
        <form method="post">
          <div class="row">
            <div class="col-6">
              <div class="my-2">
                <label class="form-label">Login</label>
                <input class="form-control" type="email" placeholder="login" name="login">
              </div>
              <div class="my-2">
                <label class="form-label">Password</label>
                <input class="form-control" type="password" placeholder="password" name="password">
              </div>
              <div class="my-2">
                <label class="form-label">Profil</label>
                <select name="profil">
                    <option  disabled >SELECT----</option>
                    <option  value="1">Chef de scolarité </option>
                    <option  value="0">Agent</option>
                  </select>
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