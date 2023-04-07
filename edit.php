<?php
include  'connexion.php';

$id = intval($_GET['id']);
$sql = "SELECT *from etudiant where id_etud=:id";
$query = $db_con->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$result  = $query->fetch();


$cnt = 1;
// if ($query->rowCount() > 0) {
//   print_r($result);
// }



if (isset($_POST['modifier'])) {

  $id = intval($_GET['id']);

  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $apogee = $_POST['apogee'];
  $filiere = $_POST['filiere'];
  if(!isset($_POST["date_naissance"])){
    $date_naissance = $result["date_naissance"];
  }
  else{
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
  $query->bindParam(':id',$id,PDO::PARAM_INT);


  $query->execute();

  echo "<script>alert('Record Updated successfully');</script>";
  // Code for redirection
  echo "<script>window.location.href='etudiants.php'</script>";
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
    <a href="etudiants.php" class="btn btn-sm btn-success my-2">back</a>

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
                <input class="form-control" type="date" placeholder="Date naissance" name="date_naissance"  value="<?php echo $result["date_naissance"] ?>">
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
  </div>
</body>

</html>