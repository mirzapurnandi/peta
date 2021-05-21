<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Kotas extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('umum');
		}

		function index($id = ""){
			$data['seg3'] 	= $id;
			$nama 			= "";
			$keterangan 	= "Tambah";
			if($id != ""){
				$r_nama	= $this->global_model->get('kota', ["nama"], ['id' => $id], true);
				$nama 	= $r_nama['nama'];
				$keterangan = "Edit";
			}
			$data['nama'] = $nama;
			$data['keterangan'] = $keterangan;

			$result			= $this->global_model->get('kota', '*');
			$data['result']	= $result;

			$this->template->view('template', 'kota', $data);
		}

		function simpan(){
			$this->db->trans_start();
			$nama 	= $this->input->post('nama');
			$id 	= $this->input->post('id');

			$arr_data = [
				'nama' 		=> $nama, 
			];
			if($id == ""){
				if($this->umum->cek_data('kota', array('nama' => $nama)) > 0){
					$keterangan = "gagal";
					$pesan 		= "Gagal Menyimpan, karena nama Kota ".$nama." Sudah ada. Terima kasih.";
					$alert 		= "warning";
				} else {
					$keterangan = "berhasil";
					$pesan 		= "Data Sudah Tersimpan...";
					$alert 		= "success";
					$this->global_model->insert('kota', $arr_data);
				}
			} else {
				if($this->umum->cek_data('kota', array('nama' => $nama), $id) > 0){
					$keterangan = "gagal";
					$pesan 		= "Gagal Menyimpan, karena nama Kota ".$nama." Sudah ada. Terima kasih.";
					$alert 		= "warning";
				} else {
					$keterangan = "berhasil";
					$pesan 		= "Data Sudah Diperbaharui...";
					$alert 		= "success";
					$this->global_model->update('kota', $arr_data, array('id' => $id));
				}
			}
			$this->db->trans_complete();
			$this->session->set_flashdata('pesan', '<div class="alert alert-'.$alert.'"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i> </button> <strong> <i class="ace-icon fa fa-check"></i> '.$pesan.' </strong><br> </div>');
			echo $keterangan;
		}

		function hapus($id){
			if($this->umum->cek_data('pelanggan', array('kotaid' => $id)) > 0){
				$this->session->set_flashdata('pesan', "<div class='alert alert-danger' role='alert'>Data Tidak bisa di hapus, di karenakan Satuan sudah digunakan.</div>");
			} else {
				$this->global_model->delete('kota', array('id' => $id));
				$this->session->set_flashdata('pesan', "<div class='alert alert-success' role='alert'>Data Sudah Dihapus</div>");
			}
			redirect('kotas/');
		}
	}
?>