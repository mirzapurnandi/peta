$(document).ready(function(){
	if($("#pembayaran_hid").val() == 2){
		$(".kredit").show();
	} else {
		$(".kredit").hide();
	}
	$(".tanggal").datepicker({
		format: "dd-mm-yyyy",
		autoclose:true
	});
	$(".btn_loading").hide();
	$(".btn_simpan").click(function(){
		$(".btn_simpan").hide();
		$(".btn_loading").show();

		if($("#kode_costumer").val() == ""){
			// validasi semua form
			if($("#nama").val()== "") {
				alert("Silakah Isi Nama Pembeli");
				$("#nama").focus();
				$(".btn_simpan").show();
				$(".btn_loading").hide();
				return false;
			} else if($("#telp").val() == "") {
				alert("Silahkah Isi Nomor yang dapat di hubungi");
				$("#telp").focus();
				$(".btn_simpan").show();
				$(".btn_loading").hide();
				return false;
			} else if($("#alamat").val() == "") {
				alert("Alamat jangan kosong");
				$("#alamat").focus();
				$(".btn_simpan").show();
				$(".btn_loading").hide();
				return false;
			} else if($("#provinsi").val() == "") {
				alert("Silakah Pilih Provinsi");
				$("#provinsi").focus();
				$(".btn_simpan").show();
				$(".btn_loading").hide();
				return false;
			} else if($("#kota").val() == "") {
				alert("Silakah Pilih Kota");
				$("#kota").focus();
				$(".btn_simpan").show();
				$(".btn_loading").hide();
				return false;
			}
		}

		if($('input[name=pembayaran]:checked').val() == 2){
			if($("#uangmuka").val()== "") {
				alert("Masukan Uang Muka jika pembayaran Kredit");
				$("#uangmuka").focus();
				$(".btn_simpan").show();
				$(".btn_loading").hide();
				return false;
			} else if($("#leasing").val() == "") {
				alert("Silahkah Pilih Leasing");
				$("#leasing").focus();
				$(".btn_simpan").show();
				$(".btn_loading").hide();
				return false;
			} else if($("#masa").val() == "") {
				alert("Silahkah Pilih Masa Pinjaman");
				$("#masa").focus();
				$(".btn_simpan").show();
				$(".btn_loading").hide();
				return false;
			}
		}

		$("#frmpenjualan").submit();
	});

	$("#harga").keyup(function(){
		var hargabeli 		= parseFloat($("#hargabeli").val());
		var hargaperbaikan	= parseFloat($("#hargaperbaikan").val());
		var hargajual		= parseFloat(newText($(this).val()));
		
		total = hargajual - (hargabeli + hargaperbaikan);
		$(".labarugi").html("Rp. "+total);
		$(".hid_hargajual").html("Rp. "+$(this).val());
	});
	
	$("#provinsi").change(function(){
		var provinsiid = $(this).val();
		if(provinsiid == ""){
			$("#kota").html("== Pilih Kota ==");
		}
		$.ajax({
			url: base_url + "penjualans/get_kota",
			type: "POST",
			data: { provinsiid : provinsiid },
			dataType: "html",
			cache: false,
			success: function(response){
				$("#kota").html(response);
			}
		});
	});
	
	$(".pembayaran").click(function() {
		if($(this).val() == 1){
			$(".kredit").hide();
			$("#uangmuka").val("");
		} else {
			$(".kredit").show();
		}
	});
	
	$("#kode_costumer").change(function(){
		var kode_costumer = $(this).val();
		if(kode_costumer == ""){
			$("#nama").val("").attr("disabled", false);
			$("#telp").val("").attr("disabled", false);
			$(".jk").val("").attr("disabled", false);
			$("#alamat").val("").attr("disabled", false);
			$(".provinsi_hid").html("");
			$("#provinsi").show().attr("disabled", false);
			$(".kota_hid").html("");
			$("#kota").show().attr("disabled", false);
			$("#ktp").attr("type", "file");
			$(".ktp_hid").html("");
			$("#paspoto").attr("type", "file");
			$(".paspoto_hid").html("");
		} else {
			$.ajax({
				url: base_url + "penjualans/get_costumer",
				type: "POST",
				data: { kode_costumer : kode_costumer },
				dataType: "json",
				cache: false,
				success: function(response){
					$("#nama").val(response.nama).attr("disabled", true);
					$("#telp").val(response.telp).attr("disabled", true);
					$(".jk").val(response.jk).attr("disabled", true);
					$("#alamat").val(response.alamat).attr("disabled", true);
					$(".provinsi_hid").html(response.nama_provinsi);
					$("#provinsi").hide();
					$(".kota_hid").html(response.nama_kota);
					$("#kota").hide();
					$("#ktp").attr("type", "hidden");
					$(".ktp_hid").html("<img src='"+ base_url1 +"img/ktp/"+ response.ktp+"' width='50px' onclick='onClick(this)' class='w3-hover-opacity' style='cursor:zoom-in'> <br>");
					$("#paspoto").attr("type", "hidden");
					$(".paspoto_hid").html("<img src='"+ base_url1 +"img/paspoto/"+ response.paspoto+"' width='50px' onclick='onClick(this)' class='w3-hover-opacity' style='cursor:zoom-in'> <br>");
				}
			});
		}
	});
});

function onClick(element) {
	document.getElementById("img01").src = element.src;
	document.getElementById("modal01").style.display = "block";
}