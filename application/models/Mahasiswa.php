<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Mahasiswa extends CI_Model {
	
	//private $id;

	function __construct() {
		parent::__construct();
	}

	function get_data($id = ""){
		$this->db->select('
			m.*,
			(select nama from kabupaten k where k.kode = mg.kabid) as nama_kabupaten,
			(select NAMA from prodi where prodi.ID = m.prodi) as nama_prodi
		');
		$this->db->from('mahasiswa m');
		$this->db->join('mahasiswa_geografis mg', 'mg.nim = m.nim', 'left');
		$this->db->order_by('m.nama', 'ASC');
		if($id != ""){
			$this->db->where('m.id', $id);
		}
		$query = $this->db->get();

		if($query->num_rows() > 0){
			if($id == ""){
				return $query->result_array();
			} else {
				return $query->row_array();
			}
		} else {
			return NULL;
		}
	}

	function get_detail($nim){
		$this->db->select('
			mg.*
		');
		$this->db->from('mahasiswa_geografis mg');
		$this->db->order_by('mg.id', 'DESC');
		if($nim != ""){
			$this->db->where('mg.nim', $nim);
		}
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->row_array();
		} else {
			return NULL;
		}
	}

	function count_detail($ket = ""){
		$this->db->select('
			count(*) as jumlah,
			mg.provid,
			mg.kabid,
			mg.kecid
		');
		$this->db->from('mahasiswa_geografis mg');
		$this->db->order_by('mg.id', 'DESC');

		if($ket == 'provid'){
			$this->db->select('
				(select nama from provinsi k where k.kode = mg.provid) as nama,
				mg.provid as kode
			');
			$this->db->group_by('mg.provid');
		} elseif ($ket == 'kabid') {
			$this->db->select('
				(select nama from kabupaten k where k.kode = mg.kabid) as nama,
				mg.kabid as kode'
			);
			$this->db->group_by('mg.kabid');
		} else {
			$this->db->select('
				(select nama from kecamatan k where k.kode = mg.kecid) as nama,
				mg.kecid as kode
			');
			$this->db->group_by('mg.kecid');
		}
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		} else {
			return NULL;
		}
	}

	public function cek_nim($nim){
		$this->db->select('*');
		$this->db->from('mahasiswa_geografis');
		$this->db->where('nim', $nim);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return 'ada';
		} else {
			return 'kosong';
		}
	}
}

?>