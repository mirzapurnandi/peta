<?php
	
	class logins extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('login');
		}

		function index() {
			if(($this->session->userdata('username'))) {
				redirect('');
			} else {
				$this->load->view('login');
			}
		}
		
		function cek_login(){
			$data = array(
						'username' => $this->input->post('username') , 
						'password' => md5($this->input->post('password'))
					);
			$hasil = $this->login->cek_user($data);

			if ($hasil->num_rows() == 1){
				foreach($hasil->result() as $val){
					$sess_data['username'] 	= $val->username;
					$sess_data['userid'] 	= $val->id;
					$sess_data['level'] 	= $val->level;
					$sess_data['nama'] 		= $val->nama_lengkap;

					$this->session->set_userdata($sess_data);
					$status = 1;
					$keterangan = "<div class='alert alert-success' role='alert'>Login Sukses </div>";
				}
			} else {
				$status = 0;
				$keterangan = "<div class='alert alert-danger' role='alert'>Login Gagal </div>";
			}
			//echo json_encode($_log);
			
			
			$arr_data = array(
				'status'	 => $status,
				'keterangan' => $keterangan
			);
			echo json_encode($arr_data);
		}
			
		function logout(){
			$this->session->sess_destroy();
			redirect('logins');
		}
	}
?>