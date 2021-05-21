<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Login extends CI_Model {

	function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	function setUsername($username) {$this->username= $username;}
	function getUsername() {return $this->username;}
	
	public function cek_user($data){
		$query = $this->db->get_where('login',$data);
		return $query;
	}
	
	function ambil(){
		$this->db->select('
			login.username as username,
			login.nama_lengkap as nama_lengkap
		');
		$this->db->from('login');
		$this->db->where('username', $this->getUsername());
		$login = $this->db->get();
		return $login->result_array();
	}
	
}
?>
