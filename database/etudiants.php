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
      echo "<td>" . $etudiant["id_etud"] . "</td>";
      echo "<td>" . $etudiant["nom"] . "</td>";
      echo "<td>" . $etudiant["prenom"] . "</td>";
      echo "<td>" . $etudiant["apogee"] . "</td>";
      echo "<td>" . $etudiant["date_naissance"] . "</td>";
      echo "<td>" . $etudiant["filiere"] . "</td>";
      echo "  <td>
              <a href='#' class='btn btn-sm btn-warning'>Modifier</a>
              <form method='post'>
          <input type='hidden' name='id' value=" .  $etudiant['id_etud'] . "  />
          <input type='submit' class='btn btn-sm btn-danger' name='delete_student' value='Supprimer'>

         </form>
            </td>";
      echo "</tr>";
    }
    ?>




  </tbody>
</table>

<?php
if (isset($_POST["delete_student"])) {
  $sql = "DELETE  FROM `etudiant` WHERE id_etud = :id ";
  $query = $db_con->prepare($sql);

  $row = $query->bindParam(":id",$_POST["id"],PDO::PARAM_STR);
  $query->execute();
  echo "<script>  location.reload(); </script>";
  exit();
}
?>