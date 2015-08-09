$(function(){
	$("#login-cliente").submit(function(){
		
		var datos = $("#login-cliente").serialize();
		$.post("http://localhost/codignaiter/canchitas/login_cliente/verificar",datos,function(e){
			// console.log(e);
			var response=JSON.parse(e);
			// alert(users['validate']);
			if(response["validate"]==true){

				$(location).attr('href',"http://localhost/codignaiter/canchitas/");
			}
			else{
				$(".error-login").html("");
				$(".error-login").append(response["errors"]+" "+response["mensaje"]);

			}
		});
		// console.log(datos);
		return false;
	});
})