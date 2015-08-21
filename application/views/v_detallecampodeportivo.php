
<script type="text/javascript" src="<?php echo BASE_URL; ?>static/ajax/comentario.js"></script>

<div class="container">
    <hr>
    <div class="row well">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center">
        <div class="row">
            <!-- <img class="img-responsive img-search col-md-12" src="<?php echo BASE_URL; ?>static/img/icono3.png" alt=""> -->
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

        <div class="row">
        
            <div class="col-md-9">
                <div class="well">
                    <?php 
                        $data = json_decode($detalle,true);
                        // echo $data[0]['valoracion'];
                    ?>    
                    <h2 id="estrellas"> <?php echo $data[0]['nombre']; ?>
                    <?php 
                    $m=0;
                        $estrellas="";
                        for($j=0;$j<$data[0]['valoracion'];$j++){
                            $m=$m+1;
                            $estrellas.="<a href='$m' class='estrella'><span class='glyphicon glyphicon-star estrellas-verdes'></span></a>";
                        }
                        if($j<5){
                            $r=5-$j;
                            for($k=0;$k<$r;$k++){
                                $m=$m+1;
                                $estrellas.="<a href='$m' class='estrella'><span class='glyphicon glyphicon-star estrellas-blancas'></span></a>";
                            }
                        } 
                        ?>
                        <!-- <p class="lead"> -->
                            <?php echo $estrellas; ?>
                        <!-- </p> -->
                    </h2>
                    <p class="lead">  <?php echo '<B>Dirección:</B> '.$data[0]['direccion'].' </P><P class="lead"><B>Referencia:</B> '.$data[0]['referencia'];?></P>
                    <p class="lead">  <?php echo "<B>Ubicación:</B> ".$data[0]['ubigeo'][0]['distrito'].' - '.$data[0]['ubigeo'][0]['provincia'].' - '.$data[0]['ubigeo'][0]['departamento']; ?></p>
                    <img src="<?php echo BASE_URL.$data[0]['imagen']; ?>" width="200px" height="128px" /><br />
                    <BR />
                    <strong class="lead">COMENTARIOS</strong><br /><BR />
                    <?php
                    if ($data[0]['comentarios']['rpta'] == 'OK') {
                        foreach ($data[0]['comentarios']['data'] as $str) {
                            echo '<P ><B>'.$str['comentarista'].'</B> Dice: ';
                            echo $str['comentario'].'<br />Fecha: '.$str['fecha'].' a las '.$str['hora'].'</P>';
                        }   
                        //DIV PARA AGREGAR COMENTARIOS
                        echo '<DIV id="comentarios"></DIV>';
                    }else{
                        echo "Nadie a comentado, Sé el primero en comentar...!";
                    }
                    if ($this->session->userdata('nombres') || $this->session->userdata('id')) {
                    ?>
                        <form id="form_comentario" method="post">
                            <input type="hidden" name="cd" id="cd" value="<?php echo $data[0]['idcampo']?>">
                            <textarea name="comentario" class="form-control" id="comentario" rows="5" cols="110" placeholder="Comentar acerca de campo deportivo...!"></textarea> <br />
                            <input type="submit" value="COMENTAR" class="btn btn-success">
                        </form>
                    <?php
                    }else{
                        echo '<h3>Para comentar acerca del campo deportivo <a href="'.BASE_URL.'logincliente">Iniciar Sesión</a></h3>';
                    }   
                    ?>
               </div>

        </div>
       <div class="col-md-2">
        mapa
        </div>

    </div> 
        <div class="row">
            <div class="well">
                <form action="<?php echo BASE_URL ?>c_reserva/reservar" method="post">
                    <input type="hidden" value="<?php echo $data[0]['url'] ?>" id="url_campodeportivo" name="url_campodeportivo">
                    <input type="hidden" value="<?php echo $data[0]['idcampo'] ?>" id="id_campodeportivo" name="id_campodeportivo">
                    <?php 
                       if(!$this->session->userdata('usuario')){
                    ?>
                        <input type="hidden" value="invalido" id="login_cliente" name="login_cliente">
                    <?php 
                    }
                    else{
                      ?>
                        <input type="hidden" value="<?php echo $this->session->userdata('id_cliente') ?>" id="login_cliente" name="login_cliente">
                      
                      <?php 
                        }
                     ?> 
                    <!-- <input type="hidden" id="idusuario" name="idusuario"> -->
                    <div class="row">
                      <div class="col-md-12">
                        <label for="">SELECIONE LA FECHA</label> 
                        <input type="date" name="fecha" required> 
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">HORA DE INICIO DE RECERVA</label>
                            <select name="horaapertura" id="horaapertura" class="form-control"  required >
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">HASTA</label>
                            <select name="horacierre" id="horacierre" class="form-control"  required >
                              <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" value="RESERVAR" class="btn btn-success"> 
                    <!-- <a class="btn btn-success" href="#">RESERVAR</a> -->
                </form>
            </div>
        </div>
</div> 



<!-- ********************ocultos***************** -->

