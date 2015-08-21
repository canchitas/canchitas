<header class="header">
  	<div class="container">
  		<div class="row">
        <div class="col-md-4">
    			<a href="#">
            <div class="logotipo">
                  <img src="<?php echo BASE_URL; ?>static/img/icono1.png" class="img-responsive logo">
                  <span class="nombre-logo">Canchita</span>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <div id="buscar-secundario" class="desaparecer">
            <form action="" id="" class="container">
              <div class="row">
                <div class="col-md-10">
                  <input type="search" class="form-control " placeholder="buscar: ejemplo Puno">
                </div>
                <button type="submit" class="btn btn-success col-md-2"><i class="glyphicon glyphicon-search"></i></button>
              </div>
            </form>
          </div>
        </div>
  			<div class="col-md-4 vertical-align" >
				  <div class="text-right">
          <?php 
            if(!$this->session->userdata('usuario')){
              // redirect(BASE_URL.'login');
           ?>
            <div class="row logins">
              <span><i class="glyphicon glyphicon-user"></i><a href="<?php echo BASE_URL; ?>logincliente">Iniciar Sesion</a></span>
              <span>|</span>
               <span><i class="glyphicon glyphicon-list"></i><a href="<?php echo BASE_URL; ?>registrarse"> Registrarte</a></span>
            </div> 
           <?php  
             }
             else{
            ?>
            <div class="row logins">
				  	  <span><i class="glyphicon glyphicon-user"></i><a href=""><?php echo $this->session->userdata('usuario'); ?></a></span>
              <span>|</span>
               <span><i class="glyphicon glyphicon-list"></i><a href="<?php echo BASE_URL; ?>login_cliente/logup_sesion">Cerrar Sesion</a></span>
            </div>  
            <?php 
             }
           ?>
		     	</div>
  			</div>
  	  </div> 
    </div>
  </header>
  
  <div class="separador"></div>