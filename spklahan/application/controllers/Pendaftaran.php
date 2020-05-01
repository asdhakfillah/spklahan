<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{


    public function index()
    {
        $data['pendaftaran_data']= $this->db->get('pendaftaran')->result();
        $this->load->view('admin/pendaftaran/index',$data);
    }

    public function insert()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('no_telpon', 'no_telpon', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('desa', 'desa', 'trim|required|is_unique[pendaftaran.desa]');
       
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/pendaftaran/insert');
        } else {
            $set_users = [
                'nama' => $this->input->post('nama'),
                'no_telpon' => $this->input->post('no_telpon'),
                'tanggal' => $this->input->post('tanggal'),
                'kecamatan' => $this->input->post('kecamatan'),
                'desa' => $this->input->post('desa'),
            ];
            $this->db->insert('pendaftaran', $set_users);

            redirect("Pendaftaran");
        }
    }
}