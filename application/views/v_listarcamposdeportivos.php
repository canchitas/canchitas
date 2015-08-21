
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
              $data = json_decode($cd,true);
              foreach ($data as $campodeportivo): 
            ?>  
            <div class="well">
            <div class="row featurette">
                <div class="col-md-5">
                <img class="featurette-image img-responsive" src="<?php echo BASE_URL.$data[0]['imagen']; ?>" data-src="holder.js/500x500/auto">
                    <br><p class="lead">Calificación
                    <img src="<?php echo BASE_URL.'static/assets/star_full_'.$campodeportivo['valoracion'].'.png' ?>" height="20" style="margin-bottom:5px;"/>
              
                    <!--
                    <span class="glyphicon glyphicon-star" id="star"></span>
                    <span class="glyphicon glyphicon-star" id="star"></span>
                    <span class="glyphicon glyphicon-star" id="star"></span>
                    <span class="glyphicon glyphicon-star" id="star"></span>
                    <span class="glyphicon glyphicon-star" id="star"></span>
                    -->
                    </p>
                </div>
                <?php 
                  // print_r($campodeportivo);
                  $url = 'campodeportivo/'.$campodeportivo['url'];
                  //echo anchor($url,$campodeportivo['nombre']).' <img src="'.BASE_URL.'static/assets/star_full_'.$campodeportivo['valoracion'].'.png" height="17"/>';
                  //echo 'Dirección: '.$campodeportivo['direccion']." | Referencia: ".$campodeportivo['referencia'];
                ?>                
                <div class="col-md-7">
                     <h2 class="featurette-heading"><?php echo anchor($url,$campodeportivo['nombre']); ?></h2>
                     <p class="lead"><?php echo '<B>Referencia:</B> '.$campodeportivo['referencia'] ?> </p>
                     <p class="lead"><?php echo '<B>Dirección:</B> '.$campodeportivo['direccion']; ?> </p>
                     <p class="lead"><?php echo "<B>Ubicación:</B> ".$data[0]['ubigeo'][0]['distrito'].' - '.$data[0]['ubigeo'][0]['provincia'].' - '.$data[0]['ubigeo'][0]['departamento']; ?> </p>
                     <p><a class="btn btn-default" href="<?php echo BASE_URL.'home/detalle_campodeportivo/'.$campodeportivo['idcampo'].'/'; ?>">Ver más &raquo;</a>
                        <a class="btn btn-success" href="<?php echo BASE_URL.'home/detalle_campodeportivo/'.$campodeportivo['idcampo'].'/'; ?>">RESERVAR</a>
                </div>
            </div>
           </div>
            <?php endforeach; ?>

            <!-- 2 -->
            <!--
            <div class="well">
            <div class="row featurette">
                <div class="col-md-5">
                 <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>static/img/canchita.png" data-src="holder.js/500x500/auto" >
                     <br><p class="lead">Calificacion
                    <span class="glyphicon glyphicon-star" id="star"></span>
                    <span class="glyphicon glyphicon-star" id="star"></span>
                    <span class="glyphicon glyphicon-star" id="star"></span>
                    <span class="glyphicon glyphicon-star" id="star"></span>
                    <span class="glyphicon glyphicon-star" id="star"></span>
                 </div>

             <div class="col-md-7">
                 <h2 class="featurette-heading">Nombre de la cancha</h2>
                 <p class="lead">Pequeña descripcion <br>fsdfdsfsdfdsfbr    <br> fdsfdsfdsfsdf</p>
                 <p><a class="btn btn-default" href="#">Ver más &raquo;</a></p>
                 <button type="button" class="btn btn-success">Registrar</button>
            </div>
            </div>
            </div>
            -->
        <!-- 3 -->
           </div>
           </div>
        </div>
    </div> 