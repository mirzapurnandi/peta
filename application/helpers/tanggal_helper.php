<?php
function format_tanggal($tgl){
		$tanggal = substr($tgl,8,2);
		$bulan = getBulan(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;		 
}	

function getBulan($bln){
	switch ($bln){
		case 1: 
			return "Jan";
			break;
		case 2:
			return "Feb";
			break;
		case 3:
			return "Mar";
			break;
		case 4:
			return "Apr";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Jun";
			break;
		case 7:
			return "Jul";
			break;
		case 8:
			return "Agust";
			break;
		case 9:
			return "Sept";
			break;
		case 10:
			return "Okt";
			break;
		case 11:
			return "Nov";
			break;
		case 12:
			return "Des";
			break;
	}
}

if(! function_exists('clean_separator')) {
	function clean_separator($val="") {
		$new_val = ($val !="" ? $val : 0);
		$result = preg_replace(REPLACEMENT, '', $new_val);

		if($result !="") {
			return trim($result);
		} else {
			return 0;
		}
	}
}

if(!function_exists('format_tgl')) {
	function format_tgl($tanggal) {
		$res= date('j F Y', strtotime($tanggal));
		return $res;
	}
}

function format_angka($angka) {
	$hasil =  number_format($angka,0, ",",".");
	return "Rp. ".$hasil;
}

function format_angka1($angka) {
	$hasil =  number_format($angka,0, ",",".");
	return $hasil;
}

if(!function_exists('explode_tanggal_datepicker')) {
	function explode_tanggal_datepicker($tanggal_datepicker) {
		$arraytanggal= explode('-', $tanggal_datepicker);
		$var_tanggal= $arraytanggal[0];
		$var_bulan= $arraytanggal[1];
		$var_tahun= $arraytanggal[2];
		return $tanggal= $var_tahun . '-' . $var_bulan . '-' . $var_tanggal;
	}
}
?>
