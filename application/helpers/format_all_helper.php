<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');
	
if (!function_exists('format_bulan_add_nol')) {
	function format_bulan_add_nol($bulan) {
		if ($bulan < 10) {
			$bulan = "0" . $bulan;
		}
		return $bulan;
	}
}
?>