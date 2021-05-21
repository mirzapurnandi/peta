<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Umum extends CI_Model {
	
	//private $id;

	function __construct() {
		parent::__construct();
		$this->url 	= 'https://gsm.zenziva.net/api/sendsms/';
		$this->userkey = 'ae17d17847c2';
		$this->passkey = 'ip0r9ewn1z';
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

	public function send_sms($datas = array())
	{
		$data = array_merge(['userkey' => $this->userkey, 'passkey' => $this->passkey], $datas);
		$curlHandle = curl_init();
		curl_setopt($curlHandle, CURLOPT_URL, $this->url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
		curl_setopt($curlHandle, CURLOPT_POST, 1);
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $data);
		$result = json_decode(curl_exec($curlHandle), true);
		curl_close($curlHandle);

	    //$result = json_decode($output, true);

	    if($result['status'] == true){
	    	return $result;
	    } else {
	    	return NULL;
	    }
	}

	public function cek_perkecamatan(){
		$this->db->select('
			count(p.kecamatanid) as total,
			(select nama from kecamatan where kecamatan.id = p.kecamatanid) as nama_kecamatan
		');
		$this->db->from('pelanggan p');
		$this->db->group_by('p.kecamatanid');

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		} else {
			return NULL;
		}
	}
}
?>
