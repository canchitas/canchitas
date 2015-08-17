<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>static/ajax/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>static/ajax/AjaxUpload.2.0.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>static/ajax/edwin.js"></script>
<script language="javascript">
$(document).ready(function(){  
  var button = $('#upload_button'), interval;
  new AjaxUpload('#upload_button', {
    action: 'upload/upload.php', //Indicamos el archivo php que guardara el fichero si es correcto.
    onSubmit : function(file , ext){
      if ( ! (ext && /^(jpg)$/.test(ext)) && ! (ext && /^(png)$/.test(ext)) && ! (ext && /^(gif)$/.test(ext)) ){ //Indicamos las extensiones que nos interesan, en este caso jpg,png,gif
        alert('Error: Solo se permiten archivo de Imagen JPG y PNG y GIF.');
        //Cancelamos la subida
        return false;
      } else {
        //Desabilitamos el boton una vez que el documento tiene la extension correcta
        //this.disable();
        //En este paso podriamos mostrar un gif de cargando o un texto
        $("#contenedorImagen").append('<img src="<?php echo BASE_URL; ?>static/img/loading.gif" />');
      }
    },
    onComplete: function(file, response){   
      //button.hide();
      //response: En este caso upload.php nos devuelve el nombre del fichero subido.
      $('#foto').val(''+response);
      $("#contenedorImagen").empty();
      $("#contenedorImagen").append('<img src="upload/' + response + '"  width="333px" heigth="246px" class="img-responsive img-thumbnail"/>');
    }   
  });
});
</script>
<script type="text/javascript">
var nuevos_marcadores = [];
var marcadores_bd= [];
var geocoder = null;
var mapa = null; //VARIABLE GENERAL PARA EL MAPA
function limpiar_marcadores(lista){
  for(i in lista){
      //QUITAR MARCADOR DEL MAPA
      lista[i].setMap(null);
  }
}

$(document).on("ready", function(){        
        var formulario = $("#formulario");      
        var punto = new google.maps.LatLng(-15.824668,-70.01533);
        var config = {
            zoom:17,
            center:punto,
            mapTypeControl: true,
            zoomControl: true,
            //mapTypeId: google.maps.MapTypeId.ROADMAP
            //mapTypeId: google.maps.MapTypeId.SATELLITE
            //mapTypeId: google.maps.MapTypeId.TERRAIN
            mapTypeId: google.maps.MapTypeId.HYBRID
        };
        mapa = new google.maps.Map( $("#mapa")[0], config );

        google.maps.event.addListener(mapa, "click", function(event){
           var coordenadas = event.latLng.toString();   
           coordenadas = coordenadas.replace("(", "");
           coordenadas = coordenadas.replace(")", "");
           var lista = coordenadas.split(",");
           var direccion = new google.maps.LatLng(lista[0], lista[1]);
           //PASAR LA INFORMACI�N AL FORMULARIO
           formulario.find("input[name='latitud']").val(lista[0]);
           formulario.find("input[name='longitud']").val(lista[1]);
           
           
           var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: mapa, 
               animation:google.maps.Animation.DROP,
               draggable:false
           });
           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           
           google.maps.event.addListener(marcador, "click", function(){

           });
           
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(mapa);
        });
});  

</script>
<div class="container iniciarsesion">
  <div class="row">
    <div class="col-md-5">
      <div class="well">
        <?php
            if ($this->session->userdata('nombres')) {
              echo '<H4><B>BIENVENIDO:</B> '.ucwords($this->session->userdata('nombres')).' </H4>';
            }
        ?>
        <form class="form-registro" id="formulario">
          <div class="panel panel-primary">
                <div class="panel-heading">
                      <h3 class="panel-title">REGISTRAR NUEVO CAMPO DEPORTIVO</h3>
                    </div>
                  <div class="panel-body">
                      
                <label for="">NOMBRE DEL CAMPO DEPORTIVO</label><input type="text" class="form-control" placeholder="NOMBRE" autofocus>
                <label for="">DIRECCIÓN</label><input type="text" class="form-control" placeholder="DIRECCIÓN">
                <label for="">REFERENCIA</label><input type="text" class="form-control" placeholder="REFERENCIA">
                <label for="">LATITUD</label><input type="text" class="form-control" id="latitud" name="latitud" placeholder="LATITUD" disabled="true">
                <label for="">LONGITUD</label><input type="text" class="form-control" id="longitud" name="longitud" placeholder="LONGITUD" disabled="true">
                <label for="">FOTO DE PORTADA DEL CAMPO DEPORTIVO</label><input type="text" id="foto" name="foto" class="form-control" placeholder="FOTO DE PORTADA" value="default.jpg" disabled="true">
                <label for="">REGIÓN</label>
                <select name="departamento" id="departamento" class="form-control">  
                  <option value="">Seleccione Región</option>
                  <?php
                    $var = json_decode($data,true);
                    if($var ['rpta']=='OK'){
                        foreach ($var['data'] as $str){
                          echo '<option value="'.htmlspecialchars($str['departamento'],ENT_QUOTES).'">'.htmlspecialchars($str['departamento'],ENT_QUOTES).'</option>';
                        }
                    }
                  ?>    
                </select>  
                <label for="">PROVINCIA</label>
                <select name="provincia" id="provincia" class="form-control">
                  <option value="">Seleccione</option>
                </select>
                <label for="">DISTRITO</label>
                <select name="distrito" id="distrito" class="form-control">
                  <option value="">Seleccione</option>
                </select>
                <label for="">HORA DE APERTURA DE CAMPO DERPORTIVO</label>
                <select name="horaapertura" id="horaapertura" class="form-control">
                  <option value="">Seleccione</option>
                </select>
                <label for="">HORA DE CIERRE DE CAMPO DERPORTIVO</label>
                <select name="horacierre" id="horacierre" class="form-control">
                  <option value="">Seleccione</option>
                </select>
                <br> <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">REGISTRAR</button>
                  </div>
                <hr> 
          </div>
        </form>        
      </div>
    </div>

    <div class="col-md-7">
      <div class="well">
        <center>      
          <H3>FOTO DE PORTADA DE CAMPO DEPORTIVO</H3>
          <div id="contenedorImagen">
            <img src="<?php echo BASE_URL.'upload/cancha/cancha.png'; ?>" width="333px" height="246px" class="img-responsive img-thumbnail"/>  
          </div><BR/>
          <div id="upload_button">
            <button class="btn btn-success" id="profile_image_upload" type="button" >ACTUALIZAR IMÁGEN</button>
          </div>
        </center>
      </div>
      <div class="well">
        <center>      
        <H3>BUSQUE Y PINCHE EN LA UBICACIÓN DE TU CAMPO DEPORTIVO PARA OBTENER LAS COORDENADAS</H3>
        <div id="mapa" name="mapa" style="width:100%;height:400px;background:orange;border-radius:5px; border:5px solid white;" ></div>
        </center>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>