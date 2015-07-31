<!DOCTYPE html>
<html>
<head>
	<title>Sesión Administrador</title>
	<META charset="UTF-8"> 
	<script type="text/javascript" src="<?php echo BASE_URL ?>static/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL ?>static/js/login.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL ?>static/js/comentario.js"></script>
</head>
<body>
<?php 
 if ($this->session->userdata('nombres')) {
 	echo 'Bienvenido: '.$this->session->userdata('nombres');
 	echo ' ID: '.$this->session->userdata('id');
 }
 ?>
	<h2>Iniciar Sesión - Super-Administrador</h2>
	<form id="login" method="post">
		<label>usuario</label><br />
		<input type="text" name="usuario"><br />
		<label>password</label><br />
		<input type="password" name="password"><br />
		<input type="submit">
	</form>
</body>
</html>