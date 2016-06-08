$(function() {
	$("#login-form").submit(function() {
		$.ajax({
			type	: "post",
			url		: "includes/validasi.php?task=validasi",
			data	: $(this).serialize(),
			success : function(result) {
				window.location = './';
			}
		});
		return false;
	});

	$(".initial-expand").hide();
	$("div.content-module-heading").click(function(){
		$(this).next("div.content-module-main").slideToggle();
		$(this).children(".expand-collapse-text").toggle();
	});

});

function goBack(hal) {
	window.location = hal;
//	window.history.back();
}
