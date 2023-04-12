<div class="col-md-3">

  <a href="gestion.php"><strong><i class="glyphicon glyphicon-briefcase"></i> GestionDemandeModules</strong></a>
  <hr>
  <ul class="nav nav-pills nav-stacked">
    <li><a href="etudiants.php"><i class="glyphicon glyphicon-user"></i> Étudiants</a></li>
    <?php if (@$_SESSION['connect_admin']) { ?>
      <li><a href="ajout_etudiant.php"><i class="glyphicon glyphicon-plus"></i> Ajouter Étudiant</a></li>
    <?php } ?>

    <li><a href="demandes.php"><i class="glyphicon glyphicon-list-alt"></i> Demandes des étudiants </a></li>
    <?php if (@$_SESSION['connect_admin']) { ?>

      <li><a href="utilisateurs.php"><i class="glyphicon glyphicon-user"></i> Utilisateurs</a></li>
    <?php } ?>

    <?php if (@$_SESSION['connect_admin']) { ?>
      <li><a href="ajout_utilisateur.php"><i class="glyphicon glyphicon-plus"></i> Ajouter Utilisateur</a></li>
    <?php } ?>
  </ul>
  <hr>
</div>