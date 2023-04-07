<?php
session_start();

include "connexion.php";
$sql = "SELECT * FROM `demande` ";
$query = $db_con->prepare($sql);
$query->execute();
$row = $query->rowCount();
$data = $query->fetchAll();
$nbr_demandes = count($data);
print_r($data[0]);




?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">


  <title>Les demandes des étudiants </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    body {
      margin-top: 20px;
    }
  </style>
</head>

<body>

  <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container bootstrap snippets bootdey">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
        </button>
        <a class="navbar-brand" href="#">ESTFBS</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
              <i class="glyphicon glyphicon-user"></i>
              <?php
              echo $_SESSION["user"]["profil"] == 1 ? "Chef de scolarité" : "Agent";
              ?>
              <span class="caret"></span></a>
            <ul id="g-account-menu" class="dropdown-menu" role="menu">
              <li><a href="#">My Profile</a></li>
              <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>


  <div class="container bootstrap snippets bootdey">

    <div class="row">
      <div class="col-md-3">

        <a href="#"><strong><i class="glyphicon glyphicon-briefcase"></i> Toolbox</strong></a>
        <hr>
        <ul class="nav nav-pills nav-stacked">
          <li><a href="etudiants.php"><i class="glyphicon glyphicon-user"></i> Étudiants</a></li>
          <li><a href="ajout_etudiant.php"><i class="glyphicon glyphicon-plus"></i> Ajouter Étudiant</a></li>
          <li><a href="demandes.php"><i class="glyphicon glyphicon-list-alt"></i> Demandes des étudiants </a></li>
          <li><a href="#"><i class="glyphicon glyphicon-link"></i> Links</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-book"></i> Books</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-briefcase"></i> Tools</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-time"></i> Real-time</a></li>
        </ul>
        <hr>
      </div>
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
                    <th scope="col">Les modules demandes</th>
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


          <div class="col-md-5">
            <ul class="nav nav-justified">
              <li><a href="#"><i class="glyphicon glyphicon-cog"></i></a></li>
              <li><a href="#"><i class="glyphicon glyphicon-heart"></i></a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-comment"></i><span class="count">3</span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">1. Is there a way..</a></li>
                  <li><a href="#">2. Hello, admin. I would..</a></li>
                  <li><a href="#"><strong>All messages</strong></a></li>
                </ul>
              </li>
              <li><a href="#"><i class="glyphicon glyphicon-user"></i></a></li>
              <li><a title="Add Widget" data-toggle="modal" href="#addWidgetModal"><span class="glyphicon glyphicon-plus-sign"></span></a></li>
            </ul>
            <hr>
            <p>
              This is a responsive dashboard-style layout that uses <a href="https://www.getbootstrap.com">Bootstrap
                3</a>. You can use this template as a
              starting point to create something more unique.
            </p>
            <hr>
            <div class="btn-group btn-group-justified">
              <a href="#" class="btn btn-info col-sm-3">
                <i class="glyphicon glyphicon-plus"></i><br>
                Service
              </a>
              <a href="#" class="btn btn-info col-sm-3">
                <i class="glyphicon glyphicon-cloud"></i><br>
                Cloud
              </a>
              <a href="#" class="btn btn-info col-sm-3">
                <i class="glyphicon glyphicon-cog"></i><br>
                Tools
              </a>
              <a href="#" class="btn btn-info col-sm-3">
                <i class="glyphicon glyphicon-question-sign"></i><br>
                Help
              </a>
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