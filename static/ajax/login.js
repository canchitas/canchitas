$(function(){
	$("#login").submit(function(){
		
		var datos = $("#login").serialize();
		$.post("http://localhost/codignaiter/canchitas/login_cliente/verificar",datos,function(e){
			console.log(e);
		});		
		return false;
	});
})