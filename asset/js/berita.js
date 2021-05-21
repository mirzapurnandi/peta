tinyMCE.init({
		selector: "textarea",
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
			alert("Silahkah isi Judul");
			$("#judul").focus();
			$(".btn_simpan").removeAttr("disabled");
			$(".btn_simpan").html("Simpan");
			return false;
		} else {
			$("#frmberita").submit();
		}
	});
});