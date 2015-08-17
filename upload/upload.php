<?php
	$uploaddir = 'cancha/';
	
	if (!is_dir($uploaddir)) {
   		mkdir($uploaddir);
	}
	//Vamos a renombrar el fichero por uno aleatorio para que nunca se machaquen y se pierdan las imagenes
	$file =  md5(basename($_FILES['userfile']['name'])).strrchr($_FILES['userfile']['name'],".");
	
	//Contruimos la ruta de la imagen
	$uploadfile = $uploaddir . $file;
	
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {				
		echo $uploadfile;//Devolvemos la ruta completa para poder visualizarla.
	} else {
		echo "error";
	}
?>