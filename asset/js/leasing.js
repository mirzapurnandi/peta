$(document).ready(function(){

	$(".btn_simpan").click(function(){
		$(".btn_simpan").attr("disabled", true);
		$(".btn_simpan").html("Sedang Proses...");
		// validasi semua form
		if($("#tenor").val()== "") {
			alert("Silakah Pilih Tenor");
			$("#tenor").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Edit");
			return false;
		} else if($("#bunga").val() == "") {
			alert("Persen Bunga Harus di isi");
			$("#bunga").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Edit");
			return false;
		} else if($("#asuransi_ph").val() == "") {
			alert("Persen Asuransi PH harus di isi");
			$("#asuransi_ph").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Edit");
			return false;
		} else if($("#premi_asuransi").val() == "") {
			alert("Persen Premi Asuransi harus di isi");
			$("#premi_asuransi").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Edit");
			return false;
		} else if($("#administrasi").val() == "" || $("#administrasi").val() == 0) {
			alert("Administrasi harus di isi");
			$("#administrasi").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Edit");
			return false;
		} else {
			$("#frmleasing").submit();
		}
	});

	$(".btn_edit").click(function(){
		$(".btn_edit").attr("disabled", true);
		$(".btn_edit").html("Sedang Proses...");
		// validasi semua form
		if($("#bunga").val() == "") {
			alert("Persen Bunga Harus di isi");
			$("#bunga").focus();
			$(".btn_edit").removeAttr("disabled");
			$(".btn_edit").html("Edit");
			return false;
		} else if($("#asuransi_ph").val() == "") {
			alert("Persen Asuransi PH harus di isi");
			$("#asuransi_ph").focus();
			$(".btn_edit").removeAttr("disabled");
			$(".btn_edit").html("Edit");
			return false;
		} else if($("#premi_asuransi").val() == "") {
			alert("Persen Premi Asuransi harus di isi");
			$("#premi_asuransi").focus();
			$(".btn_edit").removeAttr("disabled");
			$(".btn_edit").html("Edit");
			return false;
		} else if($("#administrasi").val() == "" || $("#administrasi").val() == 0) {
			alert("Administrasi harus di isi");
			$("#administrasi").focus();
			$(".btn_edit").removeAttr("disabled");
			$(".btn_edit").html("Edit");
			return false;
		} else {
			$("#frmleasing").submit();
		}
	});

	$(".btn_simpan_leasing").click(function(){
		$(".btn_simpan_leasing").attr("disabled", true);
		$(".btn_simpan_leasing").html("Sedang Proses...");
		// validasi semua form
		if($("#nama").val()== "") {
			alert("Masukan Nama Leasing");
			$("#nama").focus();
			$(".btn_simpan_leasing").removeAttr("disabled");
			$(".btn_simpan_leasing").html("Simpan");
			return false;
		} else if($("#no_telp").val() == "") {
			alert("Masukan No Telp");
			$("#no_telp").focus();
			$(".btn_simpan_leasing").removeAttr("disabled");
			$(".btn_simpan_leasing").html("Simpan");
			return false;
		} else if($("#no_telp2").val() == "") {
			alert("Masukan No Telp Tambahan");
			$("#no_telp2").focus();
			$(".btn_simpan_leasing").removeAttr("disabled");
			$(".btn_simpan_leasing").html("Simpan");
			return false;
		} else if($("#alamat").val() == "") {
			alert("Masukan Alamat Leasing");
			$("#alamat").focus();
			$(".btn_simpan_leasing").removeAttr("disabled");
			$(".btn_simpan_leasing").html("Simpan");
			return false;
		} else if($("#email").val() == "") {
			alert("Masukan Alamat Email");
			$("#email").focus();
			$(".btn_simpan_leasing").removeAttr("disabled");
			$(".btn_simpan_leasing").html("Simpan");
			return false;
		} else {
			$("#frmleasing").submit();
		}
	});
});