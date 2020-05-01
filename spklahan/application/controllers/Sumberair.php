<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sumberair extends CI_Controller
{


    public function index()
    {
        $data['sumberair_data'] = $this->db
            ->get('sumberair')
            ->result();
        $this->load->view('admin/sumberair/index', $data);
    }

    public function insert()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
       
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/sumberair/insert');
        } else {
            $set_users = [
                'keterangan' => $this->input->post('keterangan'),
                'nilai_bobot' => $this->input->post('nilai_bobot'),
            ];
            $this->db->insert('sumberair', $set_users);

            redirect("Sumberair");
        }
    }

    public function update($id_sumberair)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    

        if ($this->form_validation->run() == false) {
            $users_data = $this->db
                ->where('id_sumberair', $id_sumberair)
                ->get('sumberair')
                ->row(0);
            $data['sumberair_data'] = $users_data;
            $this->load->view('admin/sumberair/update', $data);
        } else {
            $set_sumberair = [
                'keterangan' => $this->input->post('keterangan'),
                'nilai_bobot' => $this->input->post('nilai_bobot'),
            ];

            $this->db
                ->where('id_sumberair', $id_sumberair)
                ->update('sumberair', $set_sumberair);

            redirect('Sumberair');
        }
    }

    public function delete($id_sumberair)
    {

        $this->db
            ->where('id_sumberair', $id_sumberair)
            ->delete('sumberair');

        redirect("Sumberair");
    }
}
