<?php
if (!defined('BASEPATH'))
	exit('No direct access allowed !');

class Utama extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(['umum', 'mahasiswa']);
	}

	public function template($page, $data = null, $datas = array())
	{
		$this->load->view('template/header', $data);
		if ($this->session->userdata('userid')) {
			$this->load->view('template/left', $data);
		}
		$this->load->view($page, $data);
		$this->load->view('template/footer', $data);

		if (count($datas) > 0) {
			$this->load->view('home_bantuan', $datas);
		}
	}

	function index()
	{
		$data['total_mhs']	= $this->umum->cek_data('mahasiswa');
		$total_wanita	= $this->umum->cek_data('mahasiswa', ['jenis_kelamin' => 'P']);
		$total_pria		= $this->umum->cek_data('mahasiswa', ['jenis_kelamin' => 'L']);
		$data['total_geo']	= $this->umum->cek_data('mahasiswa_geografis');
		$data['total_prov']	= $this->umum->cek_data('provinsi');
		$data['total_kab']	= $this->umum->cek_data('kabupaten');
		$data['total_kec']	= $this->umum->cek_data('kecamatan');

		$prodi = $this->umum->prodi();
		$arr_j = "";
		$arr_n = "";
		$count_prodi = count($prodi);
		foreach ($prodi as $key => $val) {
			$arr_j .= $val['jumlah'];
			$arr_n .= '"' . $val['nama_prodi'] . '"';
			if ($count_prodi > $key + 1) {
				$arr_j .= ', ';
				$arr_n .= ', ';
			}
		}
		$result			= $this->mahasiswa->get_data();
		$data['result']	= $result;

		$data['jumlah'] = $this->mahasiswa->count_detail('kabid');

		$dataparsing = [
			'total_wanita' => $total_wanita,
			'total_pria' => $total_pria,
			'arr_j' => $arr_j,
			'arr_n' => $arr_n,
		];

		$this->template('home', $data, $dataparsing);
	}
}
