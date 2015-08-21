function fecha_actual(){
	var fecha = new Date();
	var dia,mes;
	var d = fecha.getDate();
	var m = (fecha.getMonth()+1);
	var anio = fecha.getFullYear();
	if(d < 10){		dia = "0"+d;	}else{	dia = d;}
	if(m < 10){		mes = "0"+m;	}else{	mes = m;}
	return dia+"/"+mes+"/"+fecha.getFullYear();
}

function hora_actual(){
	var hora = new Date();
	return hora.getHours()+":"+hora.getMinutes()+":"+hora.getSeconds();
}

$(function(){
	$("#form_comentario").submit(function(){
		//var datos = $("#form_comentario").serialize();
		if ( $('#comentario').val().trim() === '' ) {
			alert("No has escrito ningún comentario..!");
		}else{
			var data = {fecha:fecha_actual(),hora:hora_actual(),comentario:$('#comentario').val(),idcd:$('#cd').val()};
			$.post("http://localhost/canchitas/comentar",data,function(e){
			//$.post("http://localhost:8085/canchitas/comentar",data,function(e){
				$('#comentario').val('');
				var token=JSON.parse(e);
				var str='';
				if (token['rpta'] == 'OK' ) {
					var valor = token['data'];
					console.log(valor);
					str += '<P><B>'+valor.nombre+'</B> Dice: '+valor.comentario+'<BR />Fecha:'+valor.fecha+' a las '+valor.hora+'</P><HR />';
					$("#nuevocomentario").empty();
					$("#nuevocomentario").append(str);
				}else{
					//alert("No hemos podido publicar tu comentario..!");
				}

			});
			return false;	
		}
		return false;
	});


	// *****************************Valoracion****************************+++
	$(".estrella").on("click",function(e){
		var estrellas=$(this).attr('href');
		var campo=$("#url_campodeportivo").val();
		var idcampo=$("#id_campodeportivo").val();
		var usuario=$("#login_cliente").val();
		var datos={'estrellas':estrellas,'usuario':usuario,'campo':idcampo};
		if(usuario=="invalido"){
			alert("----NECESITA LOGEARSE---");
		}
		else
		{
			$.post("http://localhost/codignaiter/canchitas/c_comentario/valoracion",datos,function(e){
				console.log(e);
			});
			// $(location).attr('href',"http://localhost/codignaiter/canchitas/index.php/campodeportivo/"+campo);
		}

		e.preventDefault();
	});


	valor="";
	$.post("http://localhost/codignaiter/canchitas/c_horario/listarhora",{"id":1,"limite":false},function(e){
		var response=JSON.parse(e);
			var str = '<option value="">Seleccione Hora</option>';
			if(response['data']['rpta'] == 'OK'){
				var token = response['data']['data'];
				for (var l in token) {
	               // console.log(token[l].hora);
	               str += '<option value="'+token[l].id+'">'+token[l].hora+'</option>';
	            }
      			// $("#horacierre").empty();
      			$("#horaapertura").append(str);	 
    		}else{
			 	alert("ERROR CARGANDO DATOS");
		 	}
	});
	// $("select[name=horaapertura]").append();
	

	$("select[name=horaapertura]").change(function(){
	    id = $('select[name=horaapertura]').val();	    
	    // console.log("IDHORA: "+token);
	    //$.post("http://localhost:8085/canchitas/c_horario/listarhora",{"id":id,"limite":true},function(e){	
    	$.post("http://localhost/codignaiter/canchitas/c_horario/listarhora",{"id":id,"limite":true},function(e){	
			var response=JSON.parse(e);
			var str = '<option value="">Seleccione Hora de Cierre</option>';
			if(response['data']['rpta'] == 'OK'){
				var token = response['data']['data'];
				for (var l in token) {
	               console.log(token[l].hora);
	               str += '<option value="'+token[l].id+'">'+token[l].hora+'</option>';
	            }
      			$("#horacierre").empty();
      			$("#horacierre").append(str);	 
    		}else{
			 	alert("ERROR CARGANDO DATOS");
		 	}
		});
		// alert("sss");
		return false;
	});	

})