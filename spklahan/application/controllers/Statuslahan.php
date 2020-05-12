<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statuslahan extends CI_Controller
{
    public function index()
    {
        $this->load->library('form_validation');
        $data_status['data_status'] = $this->db->order_by('status')->get('statuslahan')->result();
        $this->load->view('admin/statuslahan/index',$data_status);
    }
    public function insert($id_lahan = null)
    {
        $data = [];
        if($id_lahan != null){
            $data['data_status'] = $this->db->where('id',$id_lahan)->get('lahan')->row(0);
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('desa', 'desa', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/statuslahan/insert',$data);
        } else {
            $set_users = [
                'kecamatan' => $this->input->post('kecamatan'),
                'desa' => $this->input->post('desa'),
                'status' => $this->input->post('status'),
            ];
            $this->db->insert('statuslahan', $set_users);

            redirect("Statuslahan");
        }
    }
}