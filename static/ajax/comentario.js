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
			$.post("http://localhost:8085/canchitas/comentar",data,function(e){
				console.log(e);
			});
			return false;	
		}
		return false;
	});
})