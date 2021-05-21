<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

if (!function_exists('dropdown_provinsi')) {
	function dropdown_provinsi(){
		$CI = &get_instance();
		$CI->load->database();
		## Menampilkan data kategori
		$CI->db->select('*');
		$CI->db->from('provinsi');
		$CI->db->order_by('nama', 'asc');
		
		$hasil = $CI->db->get();

		$arr_data[''] = "== Pilih Provinsi ==";
		if($hasil->num_rows()>0) {
			foreach($hasil->result_array() as $key => $val){
				$arr_data[$val['kode']] = $val['nama'];
			}
		}
		return ($arr_data);
	}
}

if (!function_exists('dropdown_kabupaten')) {
	function dropdown_kabupaten($prov = ""){
		$CI = &get_instance();
		$CI->load->database();
		## Menampilkan data kategori
		$CI->db->select('*');
		$CI->db->from('kabupaten');
		$CI->db->order_by('nama', 'asc');
		if($prov != ""){
			$CI->db->where('provid', $prov);
		}
		
		$hasil = $CI->db->get();

		$arr_kota[''] = "== Pilih Kota ==";
		if($hasil->num_rows()>0) {
			foreach($hasil->result_array() as $key => $val){
				$arr_kota[$val['kode']] = $val['nama'];
			}
		}
		return ($arr_kota);
	}
}

if (!function_exists('dropdown_kecamatan')) {
	function dropdown_kecamatan($kab = ""){
		$CI = &get_instance();
		$CI->load->database();

		$CI->db->select('*');
		$CI->db->from('kecamatan');
		$CI->db->order_by('nama', 'asc');
		if($kab != ""){
			$CI->db->where('kabid', $kab);
		}
		
		$hasil = $CI->db->get();

		$arr_data[''] = "== Pilih Kecamatan ==";
		if($hasil->num_rows()>0) {
			foreach($hasil->result_array() as $key => $val){
				$arr_data[$val['kode']] = $val['nama'];
			}
		}
		return ($arr_data);
	}
}

if (!function_exists('dropdown_desa')) {
	function dropdown_desa($kecamatan = 0){
		$CI = &get_instance();
		$CI->load->database();
		## Menampilkan data kategori
		$CI->db->select('*');
		$CI->db->from('desa');
		$CI->db->order_by('nama', 'asc');
		if($kecamatan > 0){
			$CI->db->where('kecamatanid', $kecamatan);
		}
		
		$hasil = $CI->db->get();

		$arr_data[''] = "== Pilih Desa ==";
		if($hasil->num_rows()>0) {
			foreach($hasil->result_array() as $key => $val){
				$arr_data[$val['id']] = $val['nama'];
			}
		}
		return ($arr_data);
	}
}

if (!function_exists('dropdown_datasync')) {
	function dropdown_datasync(){
		$CI = &get_instance();
		$CI->load->database();
		## Menampilkan data kategori
		$CI->db->select('*');
		$CI->db->from('sync');
		$CI->db->order_by('tanggal', 'desc');
		
		$hasil = $CI->db->get();

		$arr_data[''] = "== Pilih Data Sync ==";
		if($hasil->num_rows()>0) {
			foreach($hasil->result_array() as $key => $val){
				$arr_data[$val['id']] = $val['id'].' - '.$val['tanggal'];
			}
		}
		return ($arr_data);
	}
}

if (!function_exists('dropdown_prodi')) {
	function dropdown_prodi(){
		$CI = &get_instance();
		$CI->load->database();
		## Menampilkan data kategori
		$CI->db->select('ID, NAMA');
		$CI->db->from('prodi');
		$CI->db->order_by('NAMA', 'desc');
		
		$hasil = $CI->db->get();

		$arr_data[''] = "== Pilih Prodi ==";
		if($hasil->num_rows()>0) {
			foreach($hasil->result_array() as $key => $val){
				$arr_data[$val['ID']] = $val['NAMA'];
			}
		}
		return ($arr_data);
	}
}

if (!function_exists('dropdown_tahun')) {
	function dropdown_tahun(){
		$arr_data[0] = "== Pilih Tahun ==";
		for ($i=2015; $i <= 2020; $i++) { 
			$arr_data[$i] = $i;
		}
		return $arr_data;
	}
}

?>
