<?php
class global_model extends CI_Model {

	private $id;
	private $param;
	private $keyword;

	function __construct() { parent::__construct(); }
	function getId() { return $this->id; }
	function setId($id) { $this->id= $id; }
	function getKeyword() { return $this->keyword; }
	function setKeyword($keyword) { $this->keyword = $keyword; }
	function getParam() { return $this->param; }
	function setParam($param) { $this->param = $param; }

	function insert($table,$form_data = array()){
		return $this->db->insert($table, $form_data);
	}

	function update($table,$form_data = array(),$key = array()){
		if(count($key)>0){
			$this->db->where($key);
		}

		$this->db->update($table, $form_data);
		if ($this->db->affected_rows() >= 0) {
			return TRUE;
		}

		return FALSE;
	}

	function insert_return_id($table,$form_data = array()){
		$this->db->insert($table,$form_data);
		return $this->db->insert_id();
	}

	function delete($table,$key = array()){
		if(array_key_exists("all", $key)) {
			$this->db->delete($table);
			if ($this->db->affected_rows() == '1') {
				return TRUE;
			}
		} else {
			if(count($key) <= 0){
				//exit("Fungsi Delete Harus Berdasarkan Id");
				return FALSE;
			} else{
				$this->db->where($key);
				$this->db->delete($table);
				if ($this->db->affected_rows() == '1') {
					return TRUE;
				}
			}
		}

		return FALSE;
	}

	function get($table, $fields, $where='', $one=false, $perpage='', $start='', $sort_by='', $sort_order=''){

		$this->db->select($fields);
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

		if($perpage != '' || $start != ''){
			$this->db->limit($perpage,$start);
		}

		if($sort_by != '' || $sort_order != ''){
			$this->db->order_by($sort_by,$sort_order);
		}

		$query = $this->db->get();

		$result = !$one ? $query->result_array() : $query->row_array();

		return $result;
	}

	function get_row($table, $fields, $where='', $one=false, $perpage='', $start='', $sort_by='', $sort_order=''){

		$this->db->select($fields);
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

		if($perpage != '' || $start != ''){
			$this->db->limit($perpage,$start);
		}

		if($sort_by != '' || $sort_order != ''){
			$this->db->order_by($sort_by,$sort_order);
		}

		$query = $this->db->get();

		$result = !$one ? $query->result() : $query->row();

		return $result;
	}

	function get_join($table, $fields, $where='', $one=false, $tablejoin='', $join='', $perpage='', $start=''){

		$this->db->select($fields);
		$this->db->from($table);

		if($join != '' && $tablejoin != ''){
			$this->db->join($tablejoin, $join, 'left');
		}

		if($where != ''){
			$this->db->where($where);
		}

		if($perpage != '' || $start != ''){
			$this->db->limit($perpage,$start);
		}

		$query = $this->db->get();

		$result = !$one ? $query->result_array() : $query->row_array();

		return $result;
	}

	function list_data_all_dinamis($table_name = "", $offset, $sort_by, $sort_order) {
		if($this->getParam() == 1 || $this->getParam() == 3) {

			$field = $this->db->list_fields($table_name);
			$select_text = "";
			$count_field = count($field);
			foreach($field as $key_field => $val_field) {
				$select_text .= $table_name.'.'.$val_field;
				if($key_field != ($count_field - 1)) {
					$select_text .= ", ";
				} else {
					$select_text .= " ";
				}
			}

			$this->db->select($select_text, FALSE);
		} else {
			$this->db->select('COUNT('.$table_name.'.id) as total_record', FALSE);
		}
		$this->db->from($table_name);

		if($this->getKeyword()) {
			if($this->getKeyword() != 'all') {
				$this->db->where(''.$table_name.'.id IS NOT NULL');

				$field = $this->db->list_fields($table_name);
				$keyword_or_where = "";
				$count_field = count($field);
				foreach($field as $key_field => $val_field) {
					$keyword_or_where .= $table_name.'.'.$val_field.' LIKE \'%'.$this->getKeyword().'%\'';
					if($key_field != ($count_field - 1)) {
						$keyword_or_where .= " OR ";
					} else {
						$keyword_or_where .= " ";
					}
				}
				//$keyword_or_where .= " OR bla bla bla "; // uncomment me jika mau menambahkan or where
				$this->db->where('('.$keyword_or_where.')');
			}
		}

		if($this->getParam() == 1|| $this->getParam() == 3) {
			$this->db->order_by($sort_by,$sort_order,FALSE);
			if($this->getParam() == 1) {
				$this->db->limit(config_item('per_page'),$offset);
			}
		}

		$query= $this->db->get();
		if($query->num_rows() > 0) {
			if($this->getParam() == 1 || $this->getParam() == 3) {
				return($query->result_array());
			} else {
				return($query->row()->total_record);
			}
		} else {
			return NULL;
		}
	}

	function count($table) {
		return $this->db->count_all($table);
	}
	
	function getkodeunik($table, $id) { 
		//FF202008230001
		$ymd = date('Ymd');
		$q = $this->db->query("SELECT MAX(RIGHT(".$id.",4)) AS idmax FROM ".$table." where substr(no_faktur,3,8)='".$ymd."'");
		$kd = ""; //kode awal
		if($q->num_rows()>0){ //jika data ada
			foreach($q->result() as $k){
				$tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
				$kd = sprintf("%04s", $tmp); //kode ambil 4 karakter terakhir
			}
		}else{ //jika data kosong diset ke kode awal
			$kd = "0001";
		}
		//gabungkan string dengan kode yang telah dibuat tadi
		return "FF".$ymd.$kd;
	}

}
?>
