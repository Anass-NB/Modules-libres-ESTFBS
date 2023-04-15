<?php 
session_start();
include "connexion.php";



$modules = "";
$arr=[];
foreach ($_GET as  $module) {
  if ($module[0] == "m") {
    array_push($arr,$module);
  }
}


$new_modules = implode("-", $arr); 

if(count($arr) >4){
echo "<script>window.location = 'myspace.php?error=Maximum des modules a selectionner est 4'</script>";
exit();
}
if(count($arr) <1){
echo "<script>window.location = 'myspace.php?error=Veuillez  selectionner au moins un modules '</script>";
exit();
}
$sql = "update demande set modules_demandees =:modules_demandees where id_etud=:id_etud";
//Prepare Query for Execution
$query = $db_con->prepare($sql);
// Bind the parameters
$query->bindParam(':modules_demandees', $new_modules, PDO::PARAM_STR);

$query->bindParam(':id_etud', $_SESSION["user"]["id_etud"], PDO::PARAM_INT);


$query->execute();

echo "<script>window.location = 'myspace.php'</script>";




?>