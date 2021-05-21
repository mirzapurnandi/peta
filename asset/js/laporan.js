$(document).ready(function(){
	/* $(".tampil_data").click(function(){
		$(".tampil_data").each(function(){
			var key = $(this).attr('key');
			alert($(this).attr('key'));
			$(".tampil_data_"+key).removeAttr('hidden');
		});
	}); */
	
	$(".tr").each(function(){
		var key = $(this).attr('key');

		$(".tr_"+key).click(function() {
			if($(this).attr('tampil') == "tampil") {
				$(".tampil_"+key).hide();
				$(this).attr('tampil','');
			} else {
				$(".tampil_"+key).show();
				$(this).attr('tampil','tampil');
			}
		});
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