<?php 
session_start();
include  'connexion.php';


if(isset($_REQUEST['del']))
{
//Get row id
$id=intval($_GET['del']);

$sql = "delete from etudiant WHERE  id_etud=:id";

$query = $db_con->prepare($sql);

$query-> bindParam(':id',$id, PDO::PARAM_STR);

$query -> execute();

// echo "<script>alert('Etudiant Ajoutee  ');</script>";
// Code for redirection
echo "<script>window.location.href='etudiants.php'</script>";
}
