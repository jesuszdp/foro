$(document).ready(function() {
	$("#btn_asignar").click(function() {
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
	    	
	    }else{
	    	alert("CANCELO");
	    }
	    // Let's test it out
	});
});