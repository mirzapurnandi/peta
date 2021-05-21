tinyMCE.init({
		selector: ".textarea",
		plugins: [
					"advlist autolink lists link image charmap print preview anchor",
					"searchreplace visualblocks code fullscreen",
					"insertdatetime media table contextmenu paste"
				],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
	file_browser_callback:function(d,a,b,c){
		tinyMCE.activeEditor.windowManager.open({
			file:base_url1+"asset/kcfinder/browse.php?opener=tinymce4&field="+d+"&type="+b+"&dir="+b+"/public",title:"KCFinder web file manager",
			width:700,
			height:500,
			inline:true,
			close_previous:false
		},
		{ 
			window:c,input:d
		});
		return false
	}
});
 
$(document).ready(function(){
	$(".btn_simpan").click(function(){
		$(".btn_simpan").attr("disabled", true);
		$(".btn_simpan").html("Sedang Proses...");
		// validasi semua form
		if($("#judul").val() == "") {
			alert("Silahkah Masukan Judul...");
			$("#judul").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Simpan");
			return false;
		} else if($("#kategori").val() == "") {
			alert("Silahkah Pilih kategori...");
			$("#kategori").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Simpan");
			return false;
		} else if($("#form-field-tags").val() == "") {
			alert("Tag Label Harus diisi...");
			$("#form-field-tags").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Simpan");
			return false;
		} else {
			$("#frmshop").submit();
		}
	});

	$('#gambar').ace_file_input({
		no_file:'No File ...',
		btn_choose:'Choose',
		btn_change:'Change',
		droppable:false,
		onchange:null,
		thumbnail:false //| true | large
		//whitelist:'gif|png|jpg|jpeg',
		//blacklist:'exe|php'
		//onchange:''
		//
	});
});

function tampilSubkategori(){
	kategoriid = $("#kategori").val();
	$("#supersubkategori").html("== Pilih Super Sub Kategori ==");
	if(kategoriid == ""){
		$("#subkategori").html("== Pilih Sub Kategori ==");
	}
	$.ajax({
		url: base_url + "ajax_function/get_subkategori",
		type: "POST",
		data: { kategoriid : kategoriid },
		dataType: "html",
		cache: false,
		success: function(response){
			$("#subkategori").html(response);
		}
	});
}