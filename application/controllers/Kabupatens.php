<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupatens extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(['geografis']);
	}

	function index(){
		$result			= $this->geografis->get_kabupaten();
		$data['result']	= $result;

		$this->template('kabupaten/index', $data);
	}

}