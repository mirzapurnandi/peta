$(document).ready(function(){
	$(".sync").click(function(){
		var result = confirm('Yakin Sync data terbaru dari server UUI');
		if(result){
			$.ajax({
				url: base_url + "syncs/proses",
				global: true,
				type: "POST",
				async: true,
				dataType: "html",
				success: function (response) {
					$(".tampil").html(response);
				},
				beforeSend: function () {
					$(".tampil").html('<div id="loading" align="center"><img src="' + base_url1 + 'images/loading2.gif" width="200px"/></div>');
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert('gagal mengambil data');
				}
			});
		}
	});
	
	/* $(".btn_simpan").click(function(){
		$(".btn_simpan").attr("disabled", true);
		$(".btn_simpan").html("Sedang Proses...");
		// validasi semua form
		if($("#merk").val()== "") {
			alert("Silakah Pilih Merk");
			$("#merk").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Simpan");
			return false;
		} else if($("#jenis_mobil").val() == "") {
			alert("Silakah isi jenis mobil");
			$("#jenis_mobil").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Simpan");
			return false;
		} else if($("#judul").val() == "") {
			alert("Silakah isi Judul");
			$("#judul").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Simpan");
			return false;
		} else {
			//alert('oke mantap');
			$("#frmberita").submit();
		}
	}); */
});