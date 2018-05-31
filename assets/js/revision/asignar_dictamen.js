$(document).ready(function() {
	$('#btn_manual').click(function() {
		if(confirm("Si continua se perderán la asignación actual")){
			$.ajax({
				url: site_url + '/dictamen/activar_asignacion/M',
				type: 'GET'
			})
			.done(function() {
				console.log("success");
				location.reload();
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
	});

	$('#btn_automatico').click(function() {
		if(confirm("Si continua se perderán la asignación actual")){
			$.ajax({
				url: site_url + '/dictamen/activar_asignacion/A',
				type: 'GET'
			})
			.done(function() {
				console.log("success");
				location.reload();
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
	});


	$('#btn_cerar_proceso').click(function() {
		if(confirm("¿Está usted seguro de que quiere terminar esta convocatoria?")){
			$.ajax({
				url: site_url + '/dictamen/cierre_convocatoria',
				type: 'GET'
			})
			.done(function() {
				console.log("success");
				location.reload();
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
	});

	$(".btn_asignar").click(function() {
		var $row = $(this).closest("tr");    // Find the row
	    var $text = $row.find(".row_folio").text(); // Find the text
	    var $text_slct = $row.find(".select_asignacion").val();

	    if(confirm("Confirmar")){
            var datos = {
            	folio: $text,
            	sugerencia: $text_slct
            }

	    	$.ajax({
	    		url:  site_url + '/dictamen/asignacion_manual',
	    		type: 'POST',
	    		dataType: 'json',
	    		data: datos
	    	})
	    	.done(function(json) {
	    		console.log("success");
	    		document.location.href= site_url + '/dictamen';
	    		alert(json['msg']);
	    	})
	    	.fail(function(json) {
	    		console.log("error");
	    		alert(json['msg']);
	    	})
	    	.always(function() {
	    		console.log("complete");
	    	});
	    	
	    }
	    // Let's test it out
	});
});