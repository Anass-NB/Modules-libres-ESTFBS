
<?php
function template_header($title)
{
  echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

	</head>
	<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Acceuil</a>
			<a class="navbar-brand" href="#">Navbar</a>
			<a class="navbar-brand" href="#">Navbar</a>

		
		</div>
  </div>
	</nav>
EOT;
}
function template_footer()
{
  echo <<<EOT
    </body>
</html>
EOT;
}
?>