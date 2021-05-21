<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Syncs extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(['umum']);
	}

	function index()
	{
		$this->template->add_js('asset/js/sync.js');
		$data['datasync'] 	= dropdown_datasync();
		$data['prodi'] 		= dropdown_prodi();
		$data['tahun'] 		= dropdown_tahun();

		$this->template('sync/index', $data);
	}

	function proses()
	{
		$result = $this->umum->get_data();
		echo '<div class="alert alert-info alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Berhasil</strong> Data hasil sinkron berhasil di simpan, ' . $this->datenow . '.
                  </div>';
	}

	function filter()
	{
		$datasync 	= $this->input->post('datasync');
		$prodi 		= $this->input->post('prodi');
		$tahun 		= $this->input->post('tahun');

		$result	= $this->umum->ambil($datasync, 'data');
		$hasil  = json_decode($result->data, true);

		$arr_data = array();
		foreach ($hasil as $key => $val) {
			if ($prodi == $val['prodi_id']) {
				$arr_data[$key] = $val;
				$res_data = [
					'nim'	=> $val['nim'],
					'nama'	=> $val['nama'],
					'email' => $val['email'],
					'no_hp' => $val['nohp'],
					'prodi' => $val['prodi_id'],
					'agama' =>	$val['agama_kd'],
					'jenis_kelamin' => $val['gender'],
					'tahun_masuk' 	=> $val['tahun_masuk'],
					'tanggal_lahir' => $val['tanggal_lahir'],
					'tempat_lahir' 	=> $val['tempat_lahir'],
					'alamat' 		=> $val['alamat']
				];
				if ($this->umum->cek_nim($val['nim']) == 'ada') {
					$this->db->update('mahasiswa', $res_data, ['nim' => $val['nim']]);
				} else {
					$this->db->insert('mahasiswa', $res_data);
				}
			}

			if ($tahun <= $val['tahun_masuk']) {
				$arr_data[$key] = $val;
				$res_data = [
					'nim'	=> $val['nim'],
					'nama'	=> $val['nama'],
					'email' => $val['email'],
					'no_hp' => $val['nohp'],
					'prodi' => $val['prodi_id'],
					'agama' =>	$val['agama_kd'],
					'jenis_kelamin' => $val['gender'],
					'tahun_masuk' 	=> $val['tahun_masuk'],
					'tanggal_lahir' => $val['tanggal_lahir'],
					'tempat_lahir' 	=> $val['tempat_lahir'],
					'alamat' 		=> $val['alamat']
				];
				if ($this->umum->cek_nim($val['nim']) == 'ada') {
					$this->db->update('mahasiswa', $res_data, ['nim' => $val['nim']]);
				} else {
					$this->db->insert('mahasiswa', $res_data);
				}
			}
		}

		$json = json_encode($arr_data, true);
		$update = $this->db->update('sync', ['hasil' => $json, 'status' => 1, 'tanggal' => $this->datenow], ['id' => $datasync]);
		if ($update) {
			redirect('syncs/berhasil');
		}
	}

	function berhasil()
	{
		$data = array();
		$this->template->view('template', 'sync/berhasil', $data);
	}
}
