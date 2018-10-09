<?php
require '../autoload.php';

// $error = Session::getFlash('error');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
	<script src="../js/ajax.js"></script>
	<script src="../js/login.js"></script>
</head>
<body>
	<main class="container">
		<h1>Iniciar Sesión</h1>
		<p>Completá los datos para ingresar al sistema.</p>

		<?php
		if(isset($_SESSION['error'])) {
		?>
			<div class="alert alert-danger"><?= $_SESSION['error'];?></div>
		<?php
			unset($_SESSION['error']);
		}
		?>

		<form id="form-login">
			<div class="form-group">
				<label for="user">Usuario</label>
				<input type="text" name="user" id="user" class="form-control" value="<?php
				if(isset($_SESSION['input-error']) && isset($_SESSION['input-error']['user'])) {
					echo $_SESSION['input-error']['user'];
					unset($_SESSION['input-error']['user']);
				}
				?>">
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="password" name="password" id="password" class="form-control">
			</div>
			<button class="btn btn-primary btn-block">Ingresar</button>
		</form>
	</main>
</body>
</html>