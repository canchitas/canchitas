<script type="text/javascript" src="<?php echo BASE_URL; ?>static/ajax/elard.js"></script>

<div class="container">
	<hr>
    <div class="row well">
    	<div class="col-md-3"></div>
    	<div class="col-md-6 text-center">
        <div class="row">
  		  	<img class="img-responsive img-search col-md-12" src="<?php echo BASE_URL; ?>static/img/icono3.png" alt="">
        </div>
        <div id="buscar-principal">
    			<form action="<?php echo BASE_URL;?>home/buscar" id="" class="container">
            <div class="row">
              <div class="col-md-9">
    				    <input type="search" class="form-control" id="busqueda" placeholder="buscar: ejemplo Puno">
                <button id="elard" type="button">buscar</button>
              </div>
    				  <input type="submit" class="btn btn-success col-md-3" value="Buscar">
            </div>
    			</form>
        </div>
    	</div>
    	<div class="col-md-3"></div>
    </div>
    <div class="row" id="campos_deportivos">
    </div>
    <div class="row">
    	<div class="page-header suscribete">
          <a class="btn btn-danger" href="<?php echo BASE_URL.'loginadmin'; ?>">SUSCRIBETE AQUÍ</a>
      </div>
      <div class="row">
        <div class="col-sm-8">
        	<div class="alert alert-success">
        	<strong>IMPORTANTE</strong> <br> <br> Si quieres incribir tu cancha deportiva en nuestra web solo has click 
        	<a class="btn btn-danger" href="<?php echo BASE_URL.'loginadmin'; ?>">AQUÍ</a>
        	<br>
        	<img src="<?php echo BASE_URL; ?>static/img/canchita.png"  class="img-responsive img-thumbnail"alt="">
      		</div>
        </div>
        
        <div class="col-sm-4">
        <div class="page-header">
        	<h2>Lista de canchitas inscritas</h2>
        </div>
          <div class="list-group">
            <a href="#" class="list-group-item">Ronaldinho</a>
            <a href="#" class="list-group-item">Los ganadores</a>
            <a href="#" class="list-group-item">El vecino</a>
            <a href="#" class="list-group-item">El goleador</a>
            <a href="#" class="list-group-item">Paolo Guerreo</a>
          </div>
        </div>
      </div>
    </div>

    </div> 