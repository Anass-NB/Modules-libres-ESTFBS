<?php 
session_start();
include "connexion.php";




if($_GET["del"]=="releve"){
  
$sql = "UPDATE `demande` set file_releve = NULL  WHERE id_etud = :id";
$query = $db_con->prepare($sql);
$query->bindParam(':id', $_SESSION["user"]["id_etud"], PDO::PARAM_INT);
$query->execute();
echo "<script>window.location = 'myspace.php'</script>";
}

if($_GET["del"]=="carte"){
  
$sql = "UPDATE `demande` set file_carte = NULL  WHERE id_etud = :id";
$query = $db_con->prepare($sql);
$query->bindParam(':id', $_SESSION["user"]["id_etud"], PDO::PARAM_INT);
$query->execute();
echo "<script>window.location = 'myspace.php'</script>";

}



?>