jQuery(document).ready(function($) {
	$(window).load(function() {
		$("#click").click();
	});
	$("a[href='#']").click(function(e) {
		e.preventDefault();
	});
	$("#consulta").change(function() {
		let v = $(this).val()
		let elem = $("#consulta option[value="+v+"]")
		let copy
		if ( elem.data('copy') != null ) {
			copy = elem.data('copy')
		}else{
			copy = elem.html()
		}
		$("#consultaHelp").text(copy)
	});
	$(".all").click(function (e) {
		let data = {
			consulta: $(this).data('value')
		}
		e.preventDefault();

		$.ajax({
			url: 'consulta.php',
			type: 'POST',
			data: data,
		})
		.always(function(data) {
			$("#mostrar").html(data);
		});
	});
	$("form").submit(function(e) {
		e.preventDefault();
		let data = $(this).serialize();
		$.ajax({
			url: 'consulta.php',
			type: 'POST',
			data: data,
		})
		.always(function(data) {
			$("#mostrar").html(data);
		});

	});
});