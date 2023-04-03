<?php
session_start();
?>


<?php 
include "connexion.php";
$sql = "SELECT * FROM `etudiant` ";
$query = $db_con->prepare($sql);
$query->execute();
$row = $query->rowCount();
$data = $query->fetchAll();
$total_etudiants = count($data);
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">


  <title>Espace Admin</title>
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
      <?php
      include "layout/sidebar.php";
      ?>
      <div class="col-md-9">

        <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>
        <hr>
        <div class="row">

          <div class="col-md">
            <div class="well">
              <div class="glyphicon glyphicon-user"></div>   Nombre  total des étudiants  <span class="badge pull-right">
                <?php echo $total_etudiants; ?>
              </span>
            </div>
            <hr>
            <div class="panel panel-default">

              <?php require "database/etudiants.php" ?>
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