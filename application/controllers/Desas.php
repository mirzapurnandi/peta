<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Desas extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model(['umum', 'geografis']);
		}

		function index($id = ""){
			$data['seg3'] 	= $id;
			$nama 			= "";
			$kecamatanid	= "";
			$keterangan 	= "Tambah";
			if($id != ""){
				$r_nama	= $this->geografis->get_desa($id);
				$nama 	= $r_nama['nama'];
				$kecamatanid = $r_nama['kecamatanid'];
				$keterangan = "Edit";
			}
			$data['nama'] 	= $nama;
			$data['kecamatanid'] = $kecamatanid;
			$data['keterangan'] = $keterangan;
			$data['kecamatan'] 	= dropdown_kecamatan();

			$result			= $this->geografis->get_desa();
			$data['result']	= $result;

			$this->template->view('template', 'desa', $data);
		}

		function simpan(){
			$this->db->trans_start();
			$nama 	= $this->input->post('nama');
			$kecamatanid = $this->input->post('kecamatanid');
			$id 	= $this->input->post('id');

			$arr_data = [
				'nama' 	 => $nama, 
				'kecamatanid' => $kecamatanid, 
			];
			if($id == ""){
				if($this->umum->cek_data('desa', ['nama'=>$nama, 'kecamatanid'=>$kecamatanid]) > 0){
					$keterangan = "gagal";
					$pesan 		= "Gagal Menyimpan, karena nama Desa ".$nama." Sudah ada. Terima kasih.";
					$alert 		= "warning";
				} else {
					$keterangan = "berhasil";
					$pesan 		= "Data Sudah Tersimpan...";
					$alert 		= "success";
					$this->global_model->insert('desa', $arr_data);
				}
			} else {
				if($this->umum->cek_data('desa', ['nama'=>$nama, 'kecamatanid'=>$kecamatanid], $id) > 0){
					$keterangan = "gagal";
					$pesan 		= "Gagal Menyimpan, karena nama Desa ".$nama." Sudah ada. Terima kasih.";
					$alert 		= "warning";
				} else {
					$keterangan = "berhasil";
					$pesan 		= "Data Sudah Diperbaharui...";
					$alert 		= "success";
					$this->global_model->update('desa', $arr_data, ['id' => $id]);
				}
			}
			$this->db->trans_complete();
			$this->session->set_flashdata('pesan', '<div class="alert alert-'.$alert.'"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i> </button> <strong> <i class="ace-icon fa fa-check"></i> '.$pesan.' </strong><br> </div>');
			echo $keterangan;
		}

		function hapus($id){
			if($this->umum->cek_data('pelanggan', array('desaid' => $id)) > 0){
				$this->session->set_flashdata('pesan', "<div class='alert alert-danger' role='alert'>Data Tidak bisa di hapus, di karenakan Satuan sudah digunakan.</div>");
			} else {
				$this->global_model->delete('desa', ['id' => $id]);
				$this->session->set_flashdata('pesan', "<div class='alert alert-success' role='alert'>Data Sudah Dihapus</div>");
			}
			redirect('desas/');
		}
	}
?>