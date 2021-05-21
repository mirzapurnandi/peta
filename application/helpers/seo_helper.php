<?php
function seo_title($s) {
    $c = array (' ');
    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    
    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}

#Fungsi untuk mengacak kode unik
function kode_acak($n, $random = "") {
	$gpass = NULL;
	//$n = 26; // jumlah karakter yang akan di bentuk.
	if($random == ""){
		$chr = "Ilo0123456789Ilo123456789";
	} else {
		$chr = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	}
	for ($i = 0; $i < $n; $i++) {
		$rIdx = rand(1, strlen($chr));
		$gpass .=substr($chr, $rIdx, 1);
	}
	return $gpass;
}
?>