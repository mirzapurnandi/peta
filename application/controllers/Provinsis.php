<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsis extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(['geografis']);
	}

	function index(){
		$result			= $this->geografis->get_provinsi();
		$data['result']	= $result;

		$this->template('provinsi/index', $data);
	}

}