$(document).ready(function(){
	$(".tanggal").datepicker({
		format: "dd-mm-yyyy",
		autoclose:true
	});

	$(".btn_simpan").click(function(){
		$(".btn_simpan").attr("disabled", true);
		$(".btn_simpan").html("Sedang Proses...");
		// validasi semua form
		if($("#merk").val()== "") {
			alert("Silakah Pilih Merk");
			$("#merk").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Simpan");
			return false;
		} else if($("#model").val() == "") {
			alert("Silakah Model mobil");
			$("#model").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Simpan");
			return false;
		} else if($("#tipe").val() == "") {
			alert("Silakah Pilih Tipe Mobil");
			$("#tipe").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Simpan");
			return false;
		} else if($("#warna").val() == "") {
			alert("Silakah Pilih Warna Mobil");
			$("#warna").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Simpan");
			return false;
		} else if($("#tahun").val() == "") {
			alert("Silakah Pilih Tahun Mobil");
			$("#tahun").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Simpan");
			return false;
		} else if($("#bahan_bakar").val() == "") {
			alert("Silahkah Pilih Bahan Bakar Mobil");
			$("#bahan_bakar").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Simpan");
			return false;
		} else if($("#transmisi").val() == "") {
			alert("Silahkah Pilih Transmisi Mobil");
			$("#transmisi").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Simpan");
			return false;
		} else {
			$("#frmpembelian").submit();
		}
	});
	
	$("#merk").change(function(){
		var merkid = $(this).val();
		$.ajax({
			url: base_url + "pembelians/get_model",
			type: "POST",
			data: { merkid : merkid },
			dataType: "html",
			cache: false,
			success: function(response){
				$("#model").html(response);
				$("#tipe").html("<option value='' selected='selected'>== Pilih Tipe ==</option>");
			}
		});
	});
	
	$("#model").change(function(){
		var modelid = $(this).val();
		$.ajax({
			url: base_url + "pembelians/get_tipe",
			type: "POST",
			data: { modelid : modelid },
			dataType: "html",
			cache: false,
			success: function(response){
				$("#tipe").html(response);
			}
		});
	});
});