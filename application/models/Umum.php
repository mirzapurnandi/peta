<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Umum extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->url = 'http://data.uui.ac.id/mahasiswa/data_mahasiswa';
		$this->datenow = date('Y-m-d H:i:s', time());
	}

	public function get_data()
	{
		$headers = ["Content-Type: application/json"];

	    $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $this->url);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    //curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	    $output = curl_exec($ch); 
	    curl_close($ch);
	    $this->db->insert('sync', ['tanggal' => $this->datenow, 'data' => $output]);
	    return json_decode($output, true);

	    /*if($result['status'] == 'success'){
	    	return $result['data'];
	    } else {
	    	return NULL;
	    }*/
	}

	public function ambil($id = "", $ket = ""){
		$this->db->select('*');
		$this->db->from('sync');
		//$this->db->where('status', 1);
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit(1);
		if($id != ""){
			$this->db->where('sync.id', $id);
		}
		$query = $this->db->get();

		if($query->num_rows() > 0){
			if($ket == 'data'){
				return $query->row();
			} else {
				return $query->row_array();
			}
		} else {
			return NULL;
		}
	}

	public function cek_nim($nim){
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('nim', $nim);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return 'ada';
		} else {
			return 'kosong';
		}
	}

	function cek_data($table, $where = "", $id = ""){
		$this->db->select('
			*
		');
		$this->db->from($table);
		if($where != '') {
			if(is_array($where)) {
				foreach ($where as $key => $val) {
					if(is_array($val)) {
						$this->db->where_in($key, $val);
					} else {
						$this->db->where($key, $val);
					}
				}
			} else {
				$this->db->where($where);
			}
		}

		if($id != ""){
			$this->db->where_not_in('id', $id);
		}
		
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return count($data->result_array());
		} else {
			return 0;
		}
	}

	public function prodi(){
		$this->db->select('
			count(*) as jumlah,
			(select NAMA from prodi where prodi.ID = mahasiswa.prodi) as nama_prodi
		');
		$this->db->from('mahasiswa');
		$this->db->group_by('mahasiswa.prodi');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		} else {
			return NULL;
		}
	}

}

?>