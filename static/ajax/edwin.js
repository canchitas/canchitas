var token = "";
var valor = "";
$(document).ready(function(){
	$("select[name=departamento]").change(function(){
	    token = $('select[name=departamento]').val();
	    //var datos = $("#login-cliente").serialize();
		console.log(token);
		$.post("http://localhost:8085/canchitas/admin/c_campodeportivo/provincia",{"id":token},function(e){
			
			
			var response=JSON.parse(e);
			// alert(users['validate']);
			console.log(response.rpta);

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
		});
		// console.log(datos);
		return false;	    
	});
});
