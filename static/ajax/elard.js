$(function(){
	// $('#busqueda').keyup(function(){
	$('#elard').on('click',function(){
		// alert('hol');
		var valor=$('#busqueda').val();
		$.post('http://localhost/codignaiter/canchitas/home/busqueda',{'key':valor},function(e){
			var response=JSON.parse(e);
			// console.log(response[0]['nombre']);
			// $.each(response, function(i, item) {
   // 					 console.log(response[i]['nombres']);
			// });
			$('#campos_deportivos').html("");
			$('#campos_deportivos').append("<div class='col-md-3'></div><div class='col-md-9'>");
			for(var i in response){
				var estrellas="";
				for(var j=0;j<response[i]['valoracion'];j++){
            		estrellas+="<span class='glyphicon glyphicon-star estrellas-verdes' id='star'></span>";
                	}
                	if(j<5){
                		r=5-j;
                		for(var k=0;k<r;k++){
                			estrellas+="<span class='glyphicon glyphicon-star estrellas-blancas' id='star'></span>";
                		}
                	}
				$('#campos_deportivos').append("<div class='well'>"+
					    "<div class='row featurette'>"+
				        	"<div class='col-md-5'>"+
				       			"<img class='featurette-image img-responsive' src='http://localhost/codignaiter/canchitas/"+response[i]['imagen']+"' data-src='holder.js/500x500/auto'>"+
				            	"<br><p class='lead'>"+estrellas+
				            	
				       		"</p></div>"+
				        	"<div class='col-md-7'>"+
					             "<h2 class='featurette-heading'>"+response[i]['nombre']+"</h2>"+
					             "<p class='lead'>"+response[i]['referencia']+"</p>"+
					             "<p class='lead'><B>Dirección:</B>"+response[i]['direccion']+"</p>"+
					             "<p class='lead'><B>Ubicación:</B>"+response[i]['ubigeo'][0]["provincia"]+"-"+response[i]['ubigeo'][0]["distrito"]+"-"+response[i]['ubigeo'][0]["departamento"]+" </p>"+
					             "<p><a class='btn btn-default' href='#'>Ver más &raquo;</a>"+
					                "<a class='btn btn-success' href='#'>RESERVAR</a>"+
				        	"</div></div></div>");
				// $('#prueva').append(response[i]['nombre']);
				console.log(response[i]['valoracion']);
			}
			$('#campos_deportivos').append(" </div>");
		});
	});
});

 // <div class='col-md-9'>
 //    <div class='well'>
	//     <div class='row featurette'>
 //        	<div class='col-md-5'>
 //       			<img class='featurette-image img-responsive' src='URLIMAGEN' data-src='holder.js/500x500/auto'>
 //            	<br><p class='lead'>Calificación
 //       		</div>
 //        	<div class='col-md-7'>
	//              <h2 class='featurette-heading'>BOMBRE CAMCCHITA</h2>
	//              <p class='lead'>REFERENCIA </p>
	//              <p class='lead'><B>Dirección:</B> DIRECCION</p>
	//              <p class='lead'><B>Ubicación:</B>DISTRITO-PROVINCIA-DEPARTAMENTO </p>
	//              <p><a class='btn btn-default' href='<?php echo BASE_URL.'home/detalle_campodeportivo/'.$campodeportivo['idcampo'].'/'; ?>'>Ver más &raquo;</a>
	//                 <a class='btn btn-success' href='<?php echo BASE_URL.'home/detalle_campodeportivo/'.$campodeportivo['idcampo'].'/'; ?>'>RESERVAR</a>
 //        	</div>
 //    	</div>
 //   </div>
 // </div>
