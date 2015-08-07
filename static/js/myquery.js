$(document).ready(function(){
	var altura = $('#buscar-principal').offset().top-20;
	
	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			$('#buscar-principal').addClass('desaparecer');
			$('#buscar-secundario').removeClass('desaparecer');
			$('#buscar-secundario').addClass('animacion-aparecer');
			// console.log("scrol");
		} else {
			$('#buscar-principal').removeClass('desaparecer');
			$('#buscar-secundario').addClass('desaparecer');
			$('#buscar-secundario').removeClass('animacion-aparecer');
		}
	});

});