$(function(){
	$("#form_comentario").submit(function(){
		var datos = $("#comentario").serialize();
		/*
		$.post("http://localhost:8085/canchitas2/loginadmin",datos,function(e){
			console.log(e);
		});
		*/
		console.log(datos);		
		return false;
	});
})