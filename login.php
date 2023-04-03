
<?php 
include "connexion.php";
session_start();
if (@$_SESSION['connect_admin'] == true) {
  header('Location: gestion.php');
}
if (@$_SESSION['connect']) {
  header('Location: myspace.php');
}

if (isset($_POST['login'])) {
  if ($_POST['email'] != "" || $_POST['password'] != "") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `utilisateur` WHERE `login`=? AND `password`=? ";
    $query = $db_con->prepare($sql);
    $query->execute(array($email, $password));
    $row = $query->rowCount();
    $fetch = $query->fetch();
    if ($row > 0) {
      $_SESSION['connect_admin'] = true;
      $_SESSION['user'] = $fetch;

      header("location: gestion.php");
    } else {
      echo "
      <script>alert('Invalid username or password')</script>
      <script>window.location = 'login.php'</script>
      ";
    }
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Authentification Administrateur </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body style="background: url(1200x680_image2.jpg) no-repeat;background-size: cover;height: 90vh;">
  <div class="container my-5">
    <div class="row ">
      <div class="col-6 card">
        <h1 class="card-header">Authentification</h1>
        <div class="card-body">
          <form method="POST">
            <a href="index.php" class="btn btn-sm btn-success">back</a>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary" name="login">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>