<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statuslahan extends CI_Controller
{
    public function index()
    {
        $this->load->library('form_validation');
        $data_status['data_status'] = $this->db->order_by('status')->get('statuslahan')->result();
        $this->load->view('petugas_pusat/statuslahan/index',$data_status);
    }
}