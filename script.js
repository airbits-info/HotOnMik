$("#sub").click( function() {
	$.post( $("#myForm").attr("action"), $("#myForm :input").serializeArray(), function(info){ $("#result").html(info); });

});
	$("#myForm").submit( function() {
		return false;
	});
