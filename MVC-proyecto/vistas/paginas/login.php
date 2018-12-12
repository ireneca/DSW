<?php require_once("../vistas/inc/header.php"); ?>
<div class="main-div bg-secondary">
	<div class="panel">
		<h4>Admin Login</h4>
		<p>Por favor, introduzca su correo electrónico y contraseña</p>
	</div>
	<form action="usuarioControlador/login" method="POST">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Usuario" name="usuario">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="clave">
		</div>
		<input type="submit" class="btn btn-light" value="Login">
	</form>
</div>
<?php require_once("../vistas/inc/footer.php"); ?>
