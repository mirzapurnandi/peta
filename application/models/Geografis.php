<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Geografis extends CI_Model {
	
	//private $id;

	function __construct() {
		parent::__construct();
	}

	function get_provinsi($id = ""){
		$this->db->select('
			p.*,
		');
		$this->db->from('provinsi p');
		$this->db->order_by('p.id', 'ASC');
		if($id != ""){
			$this->db->where('p.id', $id);
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

	function get_kabupaten($id = "", $prov = ""){
		$this->db->select('
			k.*,
			(select nama from provinsi where provinsi.kode = k.provid) as nama_provinsi
		');
		$this->db->from('kabupaten k');
		$this->db->order_by('k.nama', 'DESC');
		if($id != ""){
			$this->db->where('k.id', $id);
		}
		if($prov != ""){
			$this->db->where('k.provid', $prov);
		}
		$query = $this->db->get();

		if($query->num_rows() > 0){
			if($id == ""){
				return $query->result_array();
			} elseif($prov != ""){
				return $query->result_array();
			} else {
				return $query->row_array();
			}
		} else {
			return NULL;
		}
	}

	function get_kecamatan($id = "", $kab = ""){
		$this->db->select('
			k.*,
			(select nama from kabupaten where kabupaten.kode = k.kabid) as nama_kabupaten
		');
		$this->db->from('kecamatan k');
		$this->db->order_by('k.nama', 'DESC');
		if($id != ""){
			$this->db->where('k.id', $id);
		}

		if($kab != ""){
			$this->db->where('k.kabid', $kab);
		}

		$query = $this->db->get();

		if($query->num_rows() > 0){
			if($id == ""){
				return $query->result_array();
			} elseif($kab != ""){
				return $query->result_array();
			} else {
				return $query->row_array();
			}
		} else {
			return NULL;
		}
	}

	/*function get_desa($id = ""){
		$this->db->select('
			d.*,
			(select nama from kecamatan where kecamatan.id = d.kecamatanid) as nama_kecamatan
		');
		$this->db->from('desa d');
		$this->db->order_by('d.kecamatanid, d.nama', 'ASC');
		if($id != ""){
			$this->db->where('d.id', $id);
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
	}*/
}

?>