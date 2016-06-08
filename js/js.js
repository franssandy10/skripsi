$(function() {
	$("#name").focus();
	cekSession();
	$("#progress").progressbar({ 
		change: function() {
			$("#amount").text($("#progress").progressbar("option", "value") + "%");
		}
	});

	$("form").submit(function(e) {
		if($( '#soal6:checked').length == 0 ) {
			alert('Anda belum memilih pertanyaan No. 6...!');
			return false;
		} else if($( '#soal7:checked').length == 0 ) {
			alert('Anda belum memilih pertanyaan No. 7...!');
			return false;
		} else if($( '#soal8:checked').length == 0 ) {
			alert('Anda belum memilih pertanyaan No. 8...!');
			return false;
		} else if($( '#soal9:checked').length == 0 ) {
			alert('Anda belum memilih pertanyaan No. 9...!');
			return false;
		} else if($( '#soal10:checked').length == 0 ) {
			alert('Anda belum memilih pertanyaan No. 10...!');
			return false;
		} else if($( '#soal11:checked').length == 0 ) {
			alert('Anda belum memilih pertanyaan No. 11...!');
			return false;
		} else {
			$("#save").hide();
			$("#back").hide();
			$(".required").hide();
			$.ajax({
				type	: "post",
				url	: "save.php?task=save",
				data	: $(this).serialize(),
				dataType: "json",
				success	: function(data) {
					$.each(data, function(i,n) {
						if(n['error']=='false') {
							$(".form-panel").each(function() {
								($(this).hasClass("ui-helper-hidden")) ? null : $(this).fadeOut("fast", function() {
									$(this).addClass("ui-helper-hidden").next().fadeIn("fast", function() {
										$(this).removeClass("ui-helper-hidden");
										$("#progress").progressbar("option", "value", $("#progress").progressbar("option", "value") + 50);
										$( '#report' ).val( data );
									});
								});
							});
						} else {
							alert('Data gagal tersimpan');
						}
					});
				}
			});
			e.preventDefault();	
		}
	});
	$("#next").click(function(e) {
		if( $('#matkul').val() == 0 ) {
			alert('Anda belum memilih matakuliah...!');
			return false;
		} else if($( '#dosen').val() == 0 ) {
			alert('Anda belum memilih Nama Dosen...!');
			return false;
		} else if($( '#soal1:checked').length == 0 ) {
			alert('Anda belum memilih pertanyaan No. 1...!');
			return false;
		} else if($( '#soal2:checked').length == 0 ) {
			alert('Anda belum memilih pertanyaan No. 2...!');
			return false;
		} else if($( '#soal3:checked').length == 0 ) {
			alert('Anda belum memilih pertanyaan No. 3...!');
			return false;
		} else if($( '#soal4:checked').length == 0 ) {
			alert('Anda belum memilih pertanyaan No. 4...!');
			return false;
		} else if($( '#soal5:checked').length == 0 ) {
			alert('Anda belum memilih pertanyaan No. 5...!');
			return false;
		} else {
			e.preventDefault();
			$(".form-panel").each(function() {
				if ($(this).attr("id") != "panel1") {
					$("#back").removeAttr("disabled");
				} else {
					$("#back").attr("disabled", "disabled");
				}
				($(this).hasClass("ui-helper-hidden")) ? null : $(this).fadeOut("fast", function() {
					$(this).addClass("ui-helper-hidden").next().fadeIn("fast", function() {
	    				($(this).attr("id") != "thanks") ? null : $("#next").attr("disabled", "disabled");	
						$(this).removeClass("ui-helper-hidden");
						$("#progress").progressbar("option", "value", $("#progress").progressbar("option", "value") + 50);	
						if( $("#progress").progressbar("option", "value") == 50) {
							$("#save").removeAttr("hidden");
							$("#next").attr("hidden","hidden");
						}
					});
				});
			});
		}
	});

	$("#back").click(function(e) {
		e.preventDefault();
		$(".form-panel").each(function() {
			($(this).attr("id") != "thanks") ? null : $("#next").attr("disabled", "");
			($(this).hasClass("ui-helper-hidden")) ? null : $(this).fadeOut("fast", function() {
				$(this).addClass("ui-helper-hidden").prev().fadeIn("fast", function() {
					if ($(this).attr("id") != "panel1") {
						$("#back").removeAttr("disabled");
					} else {
						$("#back").attr("disabled", "disabled");
						$("#next").removeAttr("disabled");
					}
					$(this).removeClass("ui-helper-hidden");
					$("#progress").progressbar("option", "value", $("#progress").progressbar("option", "value") - 50);
					if( $("#progress").progressbar("option", "value") < 50) {
						$("#save").attr("hidden","hidden");
						$("#next").removeAttr("hidden");
					}

				});
			});
		});
	});

	$("#matkul").change(function(e) {
		e.preventDefault();
		var id_matkul = $("#matkul").val();
		$.ajax({
			type	: "get",
			url	: "save.php?task=matkul&id="+id_matkul,
			dataType: "json",
			success	: function(result) {
				combo = '<option value="0">--- Nama Dosen ---</option>';
				$.each(result, function(i,n) {
					combo = combo + '<option value="'+n['id_dosen']+'">'+n['nama_dosen']+'</option>';
				});
				$("#dosen").html(combo);
			}
		});
	});
});

function cekSession() {
	$.ajax({
		type	: "get",
		url	: "save.php?task=cekSession",
		dataType: "json",
		success	: function(result) {
			$.each(result, function(i,n) {
				if(n['error']=='false') {
					$(".required").removeAttr("hidden");
					$("#panel1").removeAttr("hidden");
					$("#next").removeAttr("hidden");
					$("#back").removeAttr("hidden");
					$("#back").attr("disabled","disabled");
				} else {
					$("#progress").progressbar("option", "value", $("#progress").progressbar("option", "value") + 100);
					$("#thanks").fadeIn("slow");
				}
			});
		}
	});
}