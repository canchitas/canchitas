	<script type="text/javascript" src="<?php echo BASE_URL ?>static/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL ?>static/js/login.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL ?>static/js/comentario.js"></script>
	<?php 
		$data = json_decode($detalle,true);
		echo $data[0]['nombre']; 
	?>
	<div class="container">
		<h2> <?php echo $data[0]['nombre']; ?>  <img src="<?php echo BASE_URL.'static/assets/star_full_'.$data[0]['valoracion'].'.png'; ?>" height="17"/> </h2>
		<p>  <?php echo 'Dirección: '.$data[0]['direccion']." | Referencia: ".$data[0]['referencia'];?></p>
		<p>  <?php echo "Ubicación: ".$data[0]['ubigeo'][0]['distrito'].' - '.$data[0]['ubigeo'][0]['provincia'].' - '.$data[0]['ubigeo'][0]['departamento']; ?></p>
		<img src="<?php echo BASE_URL.$data[0]['imagen']; ?>" width="200px" height="128px" /><br />
		<strong>COMENTARIOS</strong><br />
		<?php
			if ($data[0]['comentarios']['rpta'] == 'OK') {
				foreach ($data[0]['comentarios']['data'] as $str) {
					echo '<B>'.$str['comentarista'].'</B> Dice: ';
					echo $str['comentario'].'<br />Fecha: '.$str['fecha'].' a las '.$str['hora'].'<hr />';
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

