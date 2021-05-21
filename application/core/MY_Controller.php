<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

  public function __construct() {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
    
    if(!$this->session->userdata('userid')){
      redirect('logins', 'refresh');
    } else {
      $this->nama   = $this->session->userdata('nama');
      $this->level  = $this->session->userdata('level');
      $this->userid   = $this->session->userdata('userid');
      $this->username = $this->session->userdata('username');
    }

    $this->datenow = date('Y-m-d H:i:s', time());
  }

  public function template($page, $data=null, $datas=array())
  {
    $this->load->view('template/header', $data);
    $this->load->view('template/left', $data);
    $this->load->view($page, $data);
    $this->load->view('template/footer', $data);
    
    if(count($datas) > 0){
      $this->load->view('home_bantuan', $datas);
    }
  }

  public function setPesan(){
    $pesan = array(
      'required'    =>   '%s harus diisi.',
      'valid_email' =>   '%s harus format email.',
      'numeric'     =>   '%s harus diisi angka.',
      'matches'     => '%s tidak cocok dengan %s.',
      'is_unique'   => '%s Anda telah terdaftar',
      'max_length'  =>  '%s maksimal %s karakter.',
      'min_length'  =>  '%s minimal %s karakter.',
      'alpha_dash'  => '%s diisi alpabet, numerik, dan garis bawah.',
      'alpha'       =>  '%s diisi dengan format alpha a-z',
      'valid_url_format'  =>  '%s format salah, exampel (htpp://www.xxxxx.com/xxx)',
      'is_natural'  =>  '%s harus format number 0-9',
      'decimal'     =>  '%s harus format decimal',
      'is_natural_no_zero' =>  '%s Tidak Mungkin Kosong',
    );
    foreach($pesan as $key => $value){
      $this->form_validation->set_message($key, $value);
    }

  }

} 
?>
