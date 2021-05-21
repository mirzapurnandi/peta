function tampilKabupaten(){
	provinsiid = $(".provinsiid").val();
	$.ajax({
		url: base_url + "ajax_function/get_kabupaten",
		type: "POST",
		data: { provinsiid : provinsiid },
		dataType: "html",
		cache: false,
		success: function(response){
			$("#kabupatenid").html(response);
		}

	});
}

function tampilKecamatan(){
	kabupatenid = $(".kabupatenid").val();
	$.ajax({
		url: base_url + "ajax_function/get_kecamatan",
		type: "POST",
		data: { kabupatenid : kabupatenid },
		dataType: "html",
		cache: false,
		success: function(response){
			$("#kecamatanid").html(response);
		}

	});
}