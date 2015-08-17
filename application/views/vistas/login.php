<script type="text/javascript" src="<?php echo BASE_URL; ?>static/ajax/login.js"></script>

<div class="container iniciarsesion">
  <form class="form-signin" id="login-cliente" method="post" action="verificarcliente">
    <h2 class="form-signin-heading">Por favor logeate</h2>
    <input type="text" name="usuario" class="form-control" placeholder="Email address / usuario" autofocus>
    <input type="password" name="password" class="form-control" placeholder="Password">
    <label class="control-label error-login" for="inputError1">
      <?php 
        if(isset($_GET["error"])){
            echo $_GET["error"];
        }
       ?>

    </label>
    <label class="checkbox">
      <!-- <input type="checkbox" value="recordar"> Recordar -->
    </label>
    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Iniciar sesion" id="boton-login">
    <hr> 
    <div class="redes">
      <a class="btn btn-block btn-social btn-facebook" href="<?= $login_url ?>">
       <i class="fa fa-facebook"></i> Iniciar Sesion con Facebook
      </a>
      <a class="btn btn-block btn-social btn-twitter">
        <i class="fa fa-twitter"></i> Iniciar Sesion con Twitter
      </a>
      <a class="btn btn-block btn-social btn-google">
        <i class="fa fa-google-plus"></i> Iniciar Sesion con Google+
      </a>
    </div>
  </form>
</div> 