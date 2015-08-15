<div class="container">
	<?php 	
	$data = json_decode($cd,true);
	foreach ($data as $campodeportivo): 
		$url = 'campodeportivo/'.$campodeportivo['idcampo'].'/';
		$url .= url_title(convert_accented_characters($campodeportivo['nombre']),'-',TRUE);
	?>
		<h3>
		<?php //echo $campodeportivo->nombre;
				echo anchor($url,$campodeportivo['nombre']).' <img src="'.BASE_URL.'static/assets/star_full_'.$campodeportivo['valoracion'].'.png" height="17"/>';
		?>
		</h3>
		<p><?php echo 'Dirección: '.$campodeportivo['direccion']." | Referencia: ".$campodeportivo['referencia'];?></p><hr />
	<?php endforeach; ?>
</div>