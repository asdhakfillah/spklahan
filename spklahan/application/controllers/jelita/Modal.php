<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modal extends CI_Controller
{


    public function index()
    {
        $data['modal_data'] = $this->db
            ->get('modal')
            ->result();
        $this->load->view('admin/modal/index', $data);
    }

    public function insert()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
       
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/modal/insert');
        } else {
            $set_users = [
                'keterangan' => $this->input->post('keterangan'),
                'range_awal' => $this->input->post('range_awal'),
                'range_akhir' => $this->input->post('range_akhir'),
                'nilai_bobot' => $this->input->post('nilai_bobot'),
            ];
            $this->db->insert('modal', $set_users);

            redirect("Modal");
        }
    }

    public function update($id_modal)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    

        if ($this->form_validation->run() == false) {
            $users_data = $this->db
                ->where('id_modal', $id_modal)
                ->get('modal')
                ->row(0);
            $data['modal_data'] = $users_data;
            $this->load->view('admin/modal/update', $data);
        } else {
            $set_modal = [
                'keterangan' => $this->input->post('keterangan'),
                'range_awal' => $this->input->post('range_awal'),
                'range_akhir' => $this->input->post('range_akhir'),
                'nilai_bobot' => $this->input->post('nilai_bobot'),
            ];

            $this->db
                ->where('id_modal', $id_modal)
                ->update('modal', $set_modal);

            redirect('Modal');
        }
    }

    public function delete($id_modal)
    {

        $this->db
            ->where('id_modal', $id_modal)
            ->delete('modal');

        redirect("Modal");
    }
}
