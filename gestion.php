<?php
session_start();
include "connexion.php";
if(!$_SESSION['connect_admin']){
  header('Location: login.php');

}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">


  <title>Espace Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

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
          <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Demandes des étudiants </a></li>
          <li><a href="#"><i class="glyphicon glyphicon-link"></i> Links</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-book"></i> Books</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-briefcase"></i> Tools</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-time"></i> Real-time</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-plus"></i> Advanced..</a></li>
        </ul>
        <hr>
      </div>
      <div class="col-md-9">

        <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>
        <hr>
        <div class="row">
          <div class="col-md">
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
          </div>
          <div class="col-md-7">
            <div class="well">
              <div class="glyphicon glyphicon-user"></div> Total des etudiants <span class="badge pull-right">13</span>
            </div>
            <hr>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4>Processing Status</h4>
              </div>
              <div class="panel-body">
                <small>Complete</small>
                <div class="progress">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                    <span class="sr-only">72% Complete</span>
                  </div>
                </div>
                <small>In Progress</small>
                <div class="progress">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                    <span class="sr-only">20% Complete</span>
                  </div>
                </div>
                <small>At Risk</small>
                <div class="progress">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80% Complete</span>
                  </div>
                </div>
              </div>
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
  <!-- retreive Data -->

  <?php
  $sql = "SELECT count(id_etud)  as `Nombre des etudiants` , filiere FROM `etudiant` GROUP BY   filiere;";
  $query = $db_con->query($sql);
  $group_by_filiere = $query->fetchAll();
  echo count($group_by_filiere);
  $chart_data = array();
  foreach ($group_by_filiere as $row) {
    $chart_data[] = array(
      'filiere' => $row['filiere'],
      'Nombre des etudiants' => $row['Nombre des etudiants']
    );
  }
  ?>
  <script>
    var xValues = <?php echo json_encode(array_column($chart_data, 'filiere')); ?>;
    var yValues = <?php echo json_encode(array_column($chart_data, 'Nombre des etudiants')); ?>;
    var barColors = ["blue", "red", "Black"];
    const colors = [
      'rgba(255, 99, 132, 0.9)',
      'rgba(54, 162, 235, 0.9)',
      'rgba(255, 206, 86, 0.9)',
      'rgba(75, 192, 192, 0.9)',
      'rgba(153, 102, 255, 0.9)',
      'rgba(255, 159, 64, 0.9)',
      'rgba(255, 99, 132, 0.9)',
      'rgba(54, 162, 235, 0.9)',
      'rgba(255, 206, 86, 0.9)',
      'rgba(75, 192, 192, 0.9)',
      'rgba(75, 192, 192, 0.9)',
      'rgba(54, 162, 235, 0.9)',
      'rgba(75, 192, 192, 0.9)',
      'rgba(54, 162, 235, 0.9)',
      'rgba(255, 206, 86, 0.9)',
      'rgba(255, 99, 132, 0.9)',


    ];
    const dataCount = <?php echo count($group_by_filiere); ?>;
    const bgColors = colors.slice(0, dataCount);
    const borderColors = colors.slice(0, dataCount);

    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: bgColors,
          borderColors: borderColors,
          data: yValues
        }]
      },
      options: {
        scales: {
          yAxes: [{
            display: true,
            ticks: {
              beginAtZero: true,
              stepSize: 1,

              // max: 100,
              // min: 0
            }
          }]
        },
        legend: {
          display: false
        },
        title: {
          display: true,
          text: "Nombre des etudiants par filliere"
        }
      }
    });
  </script>

</body>

</html>