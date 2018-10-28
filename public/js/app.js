$(document).ready(function(){
	$("#open").click(function(){

		$(this).hide();
		$("#close").show();

		$(".barra-lateral").addClass('abrir');
		$(".main").addClass('abrir-main');

	});

	$("#close").click(function(){
		
		$(this).hide();
		$("#open").show();
		$(".barra-lateral").removeClass('abrir');
		$(".main").removeClass('abrir-main');

	});

});