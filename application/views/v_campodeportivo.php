<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
	<title>Campos Deportivos</title>
</head>
<body>
	<h1>Campos Deportivos</h1>	
	<?php 
	$data = json_decode($cd,true);
	foreach ($data as $campodeportivo): 
		$url = 'campodeportivo/'.$campodeportivo['idcampo'].'/';
		$url .= url_title(convert_accented_characters($campodeportivo['nombre']),'-',TRUE);
	?>
		<h3><?php //echo $campodeportivo->nombre;
				echo anchor($url,$campodeportivo['nombre']);
			?>
		</h3>
		<p><?php echo 'Dirección: '.$campodeportivo['direccion']." | Referencia: ".$campodeportivo['referencia'];?></p><hr />
	<?php endforeach; ?>
</body>
</html>
