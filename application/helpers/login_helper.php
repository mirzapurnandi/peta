<?php 
function cek_session(){
	$CI = &get_instance();
	$level	= $CI->session->userdata('level');
	if($level != "admin"){
		redirect('logins/logout');
	}
}
?>