<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lahan extends CI_Controller
{
    public function index()
    {
        $this->load->library('form_validation');
        $this->load->library(array('session'));
        $data_perhitungan['data_perhitungan'] = $this->db->order_by('hasil')->get('lahan')->result();
        $this->load->view('petugas_pusat/lahan/index', $data_perhitungan);
    }

    public function export()
	{
        // $this->load->library(array('session'));
		$data['invoice'] = $this->model_lahan->tampil_data();
		$this->load->view('export_data_hasil_lahan', $data);
	}
}
