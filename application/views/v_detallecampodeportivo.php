<div class="container">
    <hr>
    <div class="row well">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center">
        <div class="row">
            <img class="img-responsive img-search col-md-12" src="<?php echo BASE_URL; ?>static/img/icono3.png" alt="">
        </div>
        <div id="buscar-principal">
                <form action="" id="" class="container">
            <div class="row">
              <div class="col-md-9">
                        <input type="search" class="form-control " placeholder="buscar: ejemplo Puno">
              </div>
                      <input type="submit" class="btn btn-success col-md-3" value="Buscar">
            </div>
                </form>
        </div>
        </div>
        <div class="col-md-3"></div>
    </div>
            <!--  -->
         <div class="row">
        <div class="col-md-3">
        <div class="well">
            <p>AQUI IRAN LOS FILTROS CREO</p>
            <p>AQUI IRAN LOS FILTROS CREO</p>
            <p>AQUI IRAN LOS FILTROS CREO</p>
            <p>AQUI IRAN LOS FILTROS CREO</p>
            <p>AQUI IRAN LOS FILTROS CREO</p>
            <p>AQUI IRAN LOS FILTROS CREO</p>
            <p>AQUI IRAN LOS FILTROS CREO</p>
            <p>AQUI IRAN LOS FILTROS CREO</p>
            <p>AQUI IRAN LOS FILTROS CREO</p>

        </div>
        </div>
        <div class="col-md-9">
            <div class="well">
                <?php 
                    $data = json_decode($detalle,true);
                    echo $data[0]['nombre']; 
                ?>    
                <h2> <?php echo $data[0]['nombre']; ?>  <img src="<?php echo BASE_URL.'static/assets/star_full_'.$data[0]['valoracion'].'.png'; ?>" height="17"/> </h2>
                <p>  <?php echo 'Dirección: '.$data[0]['direccion']." | Referencia: ".$data[0]['referencia'];?></p>
                <p>  <?php echo "Ubicación: ".$data[0]['ubigeo'][0]['distrito'].' - '.$data[0]['ubigeo'][0]['provincia'].' - '.$data[0]['ubigeo'][0]['departamento']; ?></p>
                <img src="<?php echo BASE_URL.$data[0]['imagen']; ?>" width="200px" height="128px" /><br />
                <BR />
                <strong>COMENTARIOS</strong><br /><BR />
                <?php
                if ($data[0]['comentarios']['rpta'] == 'OK') {
                    foreach ($data[0]['comentarios']['data'] as $str) {
                        echo '<B>'.$str['comentarista'].'</B> Dice: ';
                        echo $str['comentario'].'<br />Fecha: '.$str['fecha'].' a las '.$str['hora'].'<BR />';
                    }   
                }else{
                    echo "Nadie a comentado, Sé el primero en comentar...!";
                }
                if ($this->session->userdata('nombres') || $this->session->userdata('id')) {
                ?>
                    <form id="form_comentario" method="post">
                        <input type="hidden" name="cd" id="cd" value="<?php echo $data[0]['idcampo']?>">
                        <textarea name="comentario" id="comentario" rows="5" cols="35" placeholder="Comentar acerca de campo deportivo...!"></textarea> <br />
                        <input type="submit" value="comentar">
                    </form>
                <?php
                }else{
                    echo '<h3>Para comentar acerca del campo deportivo <a href="'.BASE_URL.'">Iniciar Sesión</a></h3>';
                }   
                ?>
           </div>
           </div>
        </div>
            <!--  -->
        <div class="page-header suscribete">
          <button type="button" class="btn btn-danger">Suscribete aqui!!!</button>
      </div>
      <div class="row">
        <div class="col-sm-8">
            <div class="alert alert-success">
            <strong>IMPORTANTE</strong> <br> <br> Si quieres incribir tu cancha deportiva en nuestra web solo has click 
            <button class="btn btn-danger">Aqui!!</button>
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