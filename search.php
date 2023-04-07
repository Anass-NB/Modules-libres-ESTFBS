<?php 

include "connexion.php";
$search = '%'. $_GET["search"] .'%';
$sql = "SELECT * FROM `etudiant` WHERE filiere LIKE :search OR apogee LIKE :search";
$query = $db_con->prepare($sql);
$query->bindParam(':search', $search, PDO::PARAM_STR);
$query->execute();

$row = $query->rowCount();
$data = $query->fetchAll(PDO::FETCH_ASSOC);
?>



<table class="table table-hover table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Code Apogee</th>
            <th scope="col">Date Naissance</th>
            <th scope="col">Filliere</th>
            <th scope="col">Control</th>
          </tr>
        </thead>
        <tbody>
          
            <?php
            foreach ($data as $etudiant) {
              echo "<tr>";
              echo "<td>". $etudiant["id_etud"] ."</td>";
              echo "<td>". $etudiant["nom"] ."</td>";
              echo "<td>". $etudiant["prenom"] ."</td>";
              echo "<td>". $etudiant["apogee"] ."</td>";
              echo "<td>". $etudiant["date_naissance"] ."</td>";
              echo "<td>". $etudiant["filiere"] ."</td>";
              echo "  <td>
              <a href='#' class='btn btn-sm btn-warning'>Modifier</a>
              <a href='#' class='btn btn-sm btn-danger'>Supprimer</a>
            </td>";
              echo "</tr>";
            }
            ?>
          
         
          

        </tbody>
      </table>