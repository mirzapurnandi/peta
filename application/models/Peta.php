<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Peta extends CI_Model {
	function detail($id, $idkec = ''){
		$this->db->select('
			count(*) as jumlah
		');
		$this->db->from('mahasiswa_geografis mg');
		$this->db->where('mg.kabid', $id);
		if($idkec != ""){
			$this->db->where('mg.kecid', $idkec);
		} else {
			$this->db->select('
				(select nama from provinsi k where k.kode = mg.provid) as nama_prov,
				(select nama from kabupaten k where k.kode = mg.kabid) as nama_kab,
				(select nama from kecamatan k where k.kode = mg.kecid) as nama_kec
			');
		}
		$this->db->group_by('mg.kecid');
		
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		} else {
			return NULL;
		}
	}

	function kecamatan($idkec = ""){

	}

}
