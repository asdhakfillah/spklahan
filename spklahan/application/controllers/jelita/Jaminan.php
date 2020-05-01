<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jaminan extends CI_Controller
{


    public function index()
    {
        $data['jaminan_data'] = $this->db
            ->get('jaminan')
            ->result();
        $this->load->view('admin/jaminan/index', $data);
    }

    public function insert()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
       
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/jaminan/insert');
        } else {
            $set_users = [
                'keterangan' => $this->input->post('keterangan'),
                'nilai_bobot' => $this->input->post('nilai_bobot'),
            ];
            $this->db->insert('jaminan', $set_users);

            redirect("Jaminan");
        }
    }

    public function update($id_jaminan)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    

        if ($this->form_validation->run() == false) {
            $users_data = $this->db
                ->where('id_jaminan', $id_jaminan)
                ->get('jaminan')
                ->row(0);
            $data['jaminan_data'] = $users_data;
            $this->load->view('admin/jaminan/update', $data);
        } else {
            $set_jaminan = [
                'keterangan' => $this->input->post('keterangan'),
                'nilai_bobot' => $this->input->post('nilai_bobot'),
            ];

            $this->db
                ->where('id_jaminan', $id_jaminan)
                ->update('jaminan', $set_jaminan);

            redirect('Jaminan');
        }
    }

    public function delete($id_jaminan)
    {

        $this->db
            ->where('id_jaminan', $id_jaminan)
            ->delete('jaminan');

        redirect("Jaminan");
    }
}
