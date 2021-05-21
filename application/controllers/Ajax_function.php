<?php
	if(!defined('BASEPATH'))
		exit('No direct access allowed !');
		
	class Ajax_function extends MY_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('geografis');
		}

		public function get_kabupaten() 
		{
			$provinsiid = $_POST['provinsiid'];
			
			$result = $this->geografis->get_kabupaten("", $provinsiid);
			$data = "<option value=''> == Pilih Kabupaten == </option>";
			foreach($result as $key => $val){
				$data .= "<option value='".$val['kode']."'>".$val['nama']."</option>";
			}
			echo $data;
		}

		public function get_kecamatan() 
		{
			$kabupatenid = $_POST['kabupatenid'];
			
			$result = $this->geografis->get_kecamatan("", $kabupatenid);
			$data = "<option value=''> == Pilih Kecamatan == </option>";
			foreach($result as $key => $val){
				$data .= "<option value='".$val['kode']."'>".$val['nama']."</option>";
			}
			echo $data;
		}
	}
