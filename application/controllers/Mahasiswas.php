<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswas extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(['mahasiswa']);
	}

	public function index()
	{
		$result			= $this->mahasiswa->get_data();
		$data['result']	= $result;

		$this->template('mahasiswa/index', $data);
	}

	public function entry($id = NULL)
	{
		$data['prodi'] = dropdown_prodi();
		$data['tahun'] = dropdown_tahun();
		$data['agama'] = config_item('agama');

		if ($id == "") {
			$this->template('mahasiswa/add', $data);
		} else {
			$data['result'] = $this->global_model->get('mahasiswa', '*', array('id' => $id), true);
			$this->template('mahasiswa/edit', $data);
		}
	}

	public function proses()
	{
		$this->db->trans_start();
		$mahasiswaid = empty($this->input->post('mahasiswaid')) ? "" : $this->input->post('mahasiswaid');

		$nim 	 		= $this->input->post('nim');
		$nama 	 		= $this->input->post('nama');
		$tempat_lahir 	= $this->input->post('tempat_lahir');
		$tanggal_lahir 	= $this->input->post('tanggal_lahir');
		$jenis_kelamin 	= $this->input->post('jenis_kelamin');
		$agama 			= $this->input->post('agama');
		$email 			= $this->input->post('email');
		$no_hp	 		= $this->input->post('no_hp');
		$tahun	 		= $this->input->post('tahun');
		$prodi	 		= $this->input->post('prodi');
		$alamat	 		= $this->input->post('alamat');

		$return_data = [
			'nama'			=> $nama,
			'jenis_kelamin'	=> $jenis_kelamin,
			'email'			=> $email,
			'no_hp'			=> $no_hp,
			'prodi'			=> $prodi,
			'tahun_masuk'	=> $tahun,
			'agama'			=> $agama,
			'tanggal_lahir'	=> $tanggal_lahir,
			'tempat_lahir'	=> $tempat_lahir,
			'alamat'		=> $alamat
		];

		if ($mahasiswaid == "") {
			$return_data += array(
				'nim'	 => $nim
			);
			$this->global_model->insert('mahasiswa', $return_data);
			$this->db->trans_complete();
			$this->session->set_flashdata('pesan', "<div class='alert alert-success' role='alert'>Data Sudah Ditambah</div>");
			redirect('mahasiswas');
		} else {
			$this->global_model->update('mahasiswa', $return_data, ['id' => $mahasiswaid]);
			$this->db->trans_complete();
			$this->session->set_flashdata('pesan', "<div class='alert alert-success' role='alert'>Data Sudah Diperbaharui</div>");
			redirect('mahasiswas');
		}
	}

	public function geografis($nim)
	{
		$this->template->add_js('asset/js/geografis.js');
		$data['result']	= $this->global_model->get('mahasiswa', '*', ['nim' => $nim], true);

		$data['nim'] 		= $nim;
		$data['provinsi'] 	= dropdown_provinsi();

		if ($this->mahasiswa->cek_nim($nim) == "ada") {
			$ambil = $this->mahasiswa->get_detail($nim);
			$data['kabupaten'] 	= dropdown_kabupaten($ambil['provid']);
			$data['kecamatan'] 	= dropdown_kecamatan($ambil['kabid']);
			$data['provinsiid'] = $ambil['provid'];
			$data['kabupatenid'] = $ambil['kabid'];
			$data['kecamatanid'] = $ambil['kecid'];
		} else {
			$data['kabupaten'] 	= ['== Pilih Kabupaten =='];
			$data['kecamatan'] 	= ['== Pilih Kecamatan =='];
			$data['provinsiid']  = "";
			$data['kabupatenid'] = "";
			$data['kecamatanid'] = "";
		}

		$this->template('mahasiswa/detail', $data);
	}

	public function simpan()
	{
		$this->db->trans_start();
		$nim 		 = $this->input->post('nim');
		$provinsiid  = $this->input->post('provinsiid');
		$kabupatenid = $this->input->post('kabupatenid');
		$kecamatanid = $this->input->post('kecamatanid');

		$arr_data = [
			'nim'	 => $nim,
			'provid' => $provinsiid,
			'kabid'	 => $kabupatenid,
			'kecid'	 => $kecamatanid
		];

		if ($this->mahasiswa->cek_nim($nim) == "kosong") {
			$this->global_model->insert('mahasiswa_geografis', $arr_data);
		} else {
			$this->global_model->update('mahasiswa_geografis', $arr_data, ['nim' => $nim]);
		}
		$this->db->trans_complete();
		$this->session->set_flashdata('pesan', "<div class='alert alert-success' role='alert'>Data Sudah Diperbaharui</div>");
		redirect('mahasiswas');
	}

	public function delete($id)
	{
		$this->global_model->delete('mahasiswa', ['id' => $id]);
		$this->session->set_flashdata('pesan', '<div class="form-group"><div class="col-sm-12 alert alert-success" role="alert">Data Sudah di Hapus</div></div>');
		echo "<script>window.history.go(-1);</script>";
	}
}
