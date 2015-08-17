

<script type="text/javascript" src="<?php echo BASE_URL ?>static/js/login.js"></script>

<div class="container iniciarsesion">
	<form class="form-registro" id="login" method="post" action="<?php echo BASE_URL.'iniciarsesionadmin'; ?>">
	  <div class="panel panel-primary">
	        <div class="panel-heading"> <center>
	            <h3 class="panel-title">INICIAR SESIÓN - ADMINISTRADOR</h3></center>
	        </div>
	        <div class="panel-body">              
		        <label for="">USUARIO</label><input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario">
		        <label for="">PASSWORD</label><input type="password" class="form-control" placeholder="Password" id="password" name="password">
		          <br/> <br/>
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
		        <P>	
		        <div style="float:left;"></div><a href="<?php //echo BASE_URL.'loginadmin'; ?>"><B>REGISTRARSE</B></a></P>
	        </div>
	    </div>
	</form>
</div>
