<?php
include  'connexion.php';

$id = intval($_GET['id']);
switch ($_GET["edit"]) {
  case 'etudiant':
    $sql = "SELECT *from etudiant where id_etud=:id";
    $query = $db_con->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $result  = $query->fetch();
    break;
  case 'user':
    $sql = "SELECT * from utilisateur where id_utilisateur=:id";
    $query = $db_con->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $result  = $query->fetch();
    break;
}



$cnt = 1;
// if ($query->rowCount() > 0) {
//   print_r($result);
// }



if (isset($_POST['modifier'])) {
  switch ($_GET["edit"]) {
    case 'etudiant':

      $id = intval($_GET['id']);

      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $apogee = $_POST['apogee'];
      $filiere = $_POST['filiere'];
      if (!isset($_POST["date_naissance"])) {
        $date_naissance = $result["date_naissance"];
      } else {
        $date_naissance = $_POST["date_naissance"];
      }
      // Query for Updation
      $sql = "update etudiant set nom=:nom,prenom=:prenom,apogee=:apogee,date_naissance=:date_naissance,filiere=:filiere where id_etud=:id";
      //Prepare Query for Execution
      $query = $db_con->prepare($sql);
      // Bind the parameters
      $query->bindParam(':nom', $nom, PDO::PARAM_STR);
      $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
      $query->bindParam(':apogee', $apogee, PDO::PARAM_STR);
      $query->bindParam(':date_naissance', $date_naissance, PDO::PARAM_STR);
      $query->bindParam(':filiere', $filiere, PDO::PARAM_STR);
      $query->bindParam(':id', $id, PDO::PARAM_INT);


      $query->execute();

      echo "<script>alert('Record Updated successfully');</script>";
      // Code for redirection
      echo "<script>window.location.href='etudiants.php'</script>";
      break;

    case 'user':
      $id = intval($_GET['id']);

      $login = $_POST['login'];
      $password = $_POST['password'];
      $profil = $_POST['profil'];
    
      // Query for Updation
      $sql = "UPDATE utilisateur SET login=:login,password=:password,profil=:profil WHERE id_utilisateur=:id";
      //Prepare Query for Execution
      $query = $db_con->prepare($sql);
      // Bind the parameters
      $query->bindParam(':login', $login, PDO::PARAM_STR);
      $query->bindParam(':password', $password, PDO::PARAM_STR);
      $query->bindParam(':profil', $profil, PDO::PARAM_STR);
      $query->bindParam(':id', $id, PDO::PARAM_INT);

      $query->execute();

      echo "<script>alert('Record Updated successfully');</script>";
      // Code for redirection
      echo "<script>window.location.href='utilisateurs.php'</script>";
      


      break;
 
  }
}
?>







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier un etudiant</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body class="bg-light">
  <div class="container">
    <a href="utilisateurs.php" class="btn btn-sm btn-success my-2">back</a>
    <?php if ($_GET["edit"] == "etudiant") { ?>
      <div class="card">
        <div class="card-header">
          <h1>Modifier les donnees d'un etudiant</h1>

        </div>
        <div class="card-body">
          <form method="post">
            <div class="row">
              <div class="col-6">
                <div class="my-2">
                  <label class="form-label">Nom</label>
                  <input class="form-control" type="text" placeholder="nom" name="nom" value="<?php echo $result["nom"] ?>">
                </div>
                <div class="my-2">
                  <label class="form-label">Prenom</label>
                  <input class="form-control" type="text" placeholder="prenom" name="prenom" value="<?php echo $result["prenom"] ?>">
                </div>
                <div class="my-2">
                  <label class="form-label">Code Apogee</label>
                  <input class="form-control" type="text" placeholder="Apogee" name="apogee" value="<?php echo $result["apogee"] ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="my-2">
                  <label class="form-label">Date naissance</label>
                  <input class="form-control" type="date" placeholder="Date naissance" name="date_naissance" value="<?php echo $result["date_naissance"] ?>">
                </div>
                <div class="my-2">
                  <label class="form-label">Filliere</label>
                  <input class="form-control" type="text" placeholder="filliere" name="filiere" value="<?php echo $result["filiere"] ?>">
                </div>
              </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Modifier" name="modifier">


          </form>

        </div>
      </div>
    <?php } else { ?>
      <div class="card">
        <div class="card-header">
          <h1>Modifier les donnees d'un utilisateur</h1>

        </div>
        <div class="card-body">
          <form method="post">
            <div class="row">
              <div class="col-6">
                <div class="my-2">
                  <label class="form-label">Login</label>
                  <input class="form-control" type="email" placeholder="login" name="login" value="<?php echo $result["login"] ?>">
                </div>

              </div>
              <div class="col-6">
                <div class="my-2">
                  <label class="form-label">Mot de pass</label>
                  <input class="form-control" type="text" placeholder="password" name="password" value="<?php echo $result["password"] ?>">
                </div>


              </div>
              <div class="col-6">
                <div class="my-2">
                  <label class="form-label">Profil</label>
                  <select name="profil">
                    <option <?php echo $result["profil"] == 1 ? "selected" : " "; ?> value="1">Chef de scolarité </option>
                    <option <?php echo $result["profil"] == 0 ? "selected" : " "; ?> value="0">Agent</option>
                  </select>
                </div>
              </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Modifier" name="modifier">


          </form>

        </div>
      </div>
    <?php } ?>
  </div>
</body>

</html>