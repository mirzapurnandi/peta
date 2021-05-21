<?php
	if(!defined('BASEPATH'))
		exit('No direct access allowed !');
		
	class Petas extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model(['peta','mahasiswa']);
		}

		function index(){
			$data['jumlah'] = $this->mahasiswa->count_detail('kabid');

			$this->template('peta/index', $data);
		}

		function kabupaten($id){
			$result	= $this->global_model->get('kabupaten', "*", ['kode' => $id], true);
			$data['result'] = $result;
			$data['latlong'] = $result['latlong'] == "" ? '4.5807774,96.2584266' : $result['latlong'];

			$kecamatan	= $this->global_model->get('kecamatan', "*", ['kabid' => $id]);
			$arr_data = array();
			foreach ($kecamatan as $key => $val) {
				$arr_data[$key]['id'] 	= $val['id'];
				$arr_data[$key]['nama'] = $val['nama'];
				$arr_data[$key]['kode'] = $val['kode'];
				$total = $this->peta->detail($id, $val['kode']);
				$arr_data[$key]['jumlah'] = $total[0]['jumlah'] == "" ? 0 : $total[0]['jumlah'];
			}

			$data['jumlah'] = $arr_data;

			$this->template('peta/kabupaten', $data);
		}
	}
?>