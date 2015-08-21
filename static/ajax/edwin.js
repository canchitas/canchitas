
var token = "";
var valor = "";
$(document).ready(function(){
	//Cambio en selector Departamento
	$("select[name=departamento]").change(function(){
	    token = $('select[name=departamento]').val();
	    //var datos = $("#login-cliente").serialize();
<<<<<<< HEAD
		$.post("http://localhost/codignaiter/canchitas/admin/c_campodeportivo/provincia",{"id":token},function(e){
			
			console.log(e);
			
			var response=JSON.parse(e);
			// alert(users['validate']);
			console.log(response["datas"]["rpta"]);

			// if(e['data']['rpta'] == 'OK'){
			// 	alert(""+e.data);
			// 	for (var i in response['data']) {
   //  				token += '<option value="'+i['provincia']+'">'+i['provincia']+'</option>';	
   //  			};
   //  			$("#provincia").empty();
   //  			$("#provincia").append(token);	 
    			
			// 	//$(location).attr('href',"http://localhost/canchitas/");
			// }
			// else{
			// 	alert("ERROR CARGANDO DATOS");

			// }
=======
		//$.post("http://localhost:8085/canchitas/admin/c_campodeportivo/provincia",{"id":token},function(e){	
		$.post("http://localhost/canchitas/admin/c_campodeportivo/provincia",{"id":token},function(e){	
			var response=JSON.parse(e);
			var str = '<option value="">Seleccione Provincia</option>';
			if(response['data']['rpta'] == 'OK'){
				var token = response['data']['data'];
				for (var l in token) {
	               console.log(token[l].provincia);
	               str += '<option value="'+token[l].provincia+'">'+token[l].provincia+'</option>';
	            }
      			$("#provincia").empty();
      			$("#provincia").append(str);	 
    		}else{
			 	alert("ERROR CARGANDO DATOS");
		 	}
		});
		return false;	    
	});
	//Cambio en selector Provincia
	$("select[name=provincia]").change(function(){
	    token = $('select[name=provincia]').val();
	    //var datos = $("#login-cliente").serialize();
		//$.post("http://localhost:8085/canchitas/admin/c_campodeportivo/distrito",{"id":token},function(e){	
		$.post("http://localhost/canchitas/admin/c_campodeportivo/distrito",{"id":token},function(e){	
			var response=JSON.parse(e);
			var str = '<option value="">Seleccione Distrito</option>';
			if(response['data']['rpta'] == 'OK'){
				var token = response['data']['data'];
				for (var l in token) {
	               console.log(token[l].distrito);
	               str += '<option value="'+token[l].id+'">'+token[l].distrito+'</option>';
	            }
      			$("#distrito").empty();
      			$("#distrito").append(str);	 
    		}else{
			 	alert("ERROR CARGANDO DATOS");
		 	}
>>>>>>> 0e64f7f5fdec2c18b931f39e513fffd86169d59f
		});
		return false;	    
	});
	//Cambiar selector horario apertura
	$("select[name=distrito]").change(function(){
	    //$.post("http://localhost:8085/canchitas/c_horario/listarhora",{"id":"","limite":false},function(e){	
	    $.post("http://localhost/canchitas/c_horario/listarhora",{"id":"","limite":false},function(e){		
			var response=JSON.parse(e);
			var str = '<option value="">Seleccione Hora de Inicio</option>';
			if(response['data']['rpta'] == 'OK'){
				var token = response['data']['data'];
				for (var l in token) {
	               console.log(token[l].hora);
	               str += '<option value="'+token[l].id+'">'+token[l].hora+'</option>';
	            }
      			$("#horaapertura").empty();
      			$("#horaapertura").append(str);	 
    		}else{
			 	alert("ERROR CARGANDO DATOS");
		 	}
		});
		return false;
	});
	//Cambiar selector horario cierre
	$("select[name=horaapertura]").change(function(){
	    id = $('select[name=horaapertura]').val();	    
	    console.log("IDHORA: "+token);
	    //$.post("http://localhost:8085/canchitas/c_horario/listarhora",{"id":id,"limite":true},function(e){	
    	$.post("http://localhost/canchitas/c_horario/listarhora",{"id":id,"limite":true},function(e){	
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
		return false;
	});	


	$("#form-campodeportivo").submit(function(){
		
		var datos = $("#form_comentario").serialize();
		if ( $('#comentario').val().trim() === '' ) {
			alert("No has escrito ningún comentario..!");
		}else{
			//$.post("http://localhost:8085/canchitas/registrarcampodeportivo",data,function(token){
			$.post("http://localhost:8085/canchitas/registrarcampodeportivo",data,function(token){
				$('#comentario').val('');
				var str='';
				console.log(token);
				if (token['data']['rpta'] == 'OK' ) {
					// var token = response['data']['data'];
					// str += '<P><B>'+token.nombre+'</B> Dice:'+token.comentario+'<BR />Fecha:'+token.fecha+' a las '+token.hora+'</P>';
					// $("#nuevocomentario").empty();
					// $("#nuevocomentario").append(str);
				}else{
					alert("No hemos podido publicar tu comentario..!");
				}

			});
			return false;	
		}
		return false;
	});



});


