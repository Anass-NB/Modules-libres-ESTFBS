<?php
session_start();

// if (!$_SESSION['connect_admin'] || !$_SESSION['connect_agent']) {
//   header("Location: login.php");
// }

include "connexion.php";
$sql = "SELECT * FROM `demande` ";
$query = $db_con->prepare($sql);
$query->execute();
$row = $query->rowCount();
$data = $query->fetchAll();
$nbr_demandes = count($data);
// print_r($data[0]);




?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">


  <title>Les demandes des étudiants </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
  
</head>

<body>
<?php include "navbar.php";?>


  <div class="container bootstrap snippets bootdey">

    <div class="row">
    <?php include "sidebar.php" ?>

      <div class="col-md-9">

        <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>
        <hr>
        <div class="row">



          <div class="col-md">
            <div class="well">
              <div class="	glyphicon glyphicon-list-alt"></div> Nombre total des demandes <span class="badge pull-right">
                <?php echo $nbr_demandes; ?>
              </span>
            </div>
            <hr>

            <div class="panel panel-default">


              <table class="table table-hover table-responsive">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom et Prenom</th>
                    <th scope="col">Date du demande </th>
                    <th scope="col">Les modules demandées</th>
                    <th scope="col">Documents</th>

                    <th scope="col">Control</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $i = 1;
                  foreach ($data as $demande) {
                    echo "<tr>";
                    echo "<td>" . $i++ . "</td>";
                    $query = $db_con->prepare("SELECT nom , prenom from etudiant where id_etud = ".$demande["id_etud"]."");
                    $query->execute();
                    $nom = $query->fetch();
                    echo "<td>" . $nom[0] . " " . $nom[1] .  "</td>";
                    echo "<td>" . $demande["date_demande"] . "</td>";
                    echo "<td>" . $demande["modules_demandees"] . "</td>";

                  ?>
                    <td>
                      <div class="" style="margin: 5px 0;">
                        <a href="files_releve_carte/<?php echo $demande["file_releve"]; ?>" download class="btn btn-sm btn-info">
                          <div class="	glyphicon glyphicon-download-alt"></div>
                          Relevés de notes
                        </a>
                      </div>
                      <div class="">
                        <a href="files_releve_carte/<?php echo $demande["file_carte"]; ?>" download class="btn btn-sm btn-success">
                          <div class="	glyphicon glyphicon-download-alt"></div>
                          Carte étudiant
                        </a>
                      </div>

                    </td>
                    <td>
                      <a href='edit.php?id=<?php echo $demande["id_etud"] ?>' class='btn btn-sm btn-warning'>Modifier</a>
                      <a href='delete.php?del=<?php echo $demande["id_etud"] ?>' class='btn btn-sm btn-danger'>Suprimmer</a>

                    </td>
                  <?php
                    echo "</tr>";
                  }
                  ?>




                </tbody>
              </table>
              <?php

              if (isset($_POST["delete_student"])) {
                $sql = "DELETE  FROM `etudiant` WHERE id_etud = :id ";
                $query = $db_con->prepare($sql);

                $row = $query->bindParam(":id", $_POST["id"], PDO::PARAM_STR);
                $query->execute();
                echo "<script>  location.reload(); </script>";
                exit();
              }


              ?>

            </div>
          </div>


   
        </div>
      </div>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">

  </script>
</body>

</html>