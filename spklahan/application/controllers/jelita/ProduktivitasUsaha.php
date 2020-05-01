<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProduktivitasUsaha extends CI_Controller
{


    public function index()
    {
        $data['produktivitas_data'] = $this->db
            ->get('produktivitas')
            ->result();
        $this->load->view('admin/produktivitas/index', $data);
    }

    public function insert()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
       
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/produktivitas/insert');
        } else {
            $set_users = [
                'keterangan' => $this->input->post('keterangan'),
                'range_awal' => $this->input->post('range_awal'),
                'range_akhir' => $this->input->post('range_akhir'),
                'nilai_bobot' => $this->input->post('nilai_bobot'),
            ];
            $this->db->insert('produktivitas', $set_users);

            redirect("Produktivitas");
        }
    }

    public function update($id_produktivitas)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    

        if ($this->form_validation->run() == false) {
            $users_data = $this->db
                ->where('id_produktivitas', $id_produktivitas)
                ->get('produktivitas')
                ->row(0);
            $data['produktivitas_data'] = $users_data;
            $this->load->view('admin/produktivitas/update', $data);
        } else {
            $set_produktivitas = [
                'keterangan' => $this->input->post('keterangan'),
                'range_awal' => $this->input->post('range_awal'),
                'range_akhir' => $this->input->post('range_akhir'),
                'nilai_bobot' => $this->input->post('nilai_bobot'),
            ];

            $this->db
                ->where('id_produktivitas', $id_produktivitas)
                ->update('produktivitas', $set_produktivitas);

            redirect('Produktivitas');
        }
    }

    public function delete($id_produktivitas)
    {

        $this->db
            ->where('id_produktivitas', $id_produktivitas)
            ->delete('produktivitas');

        redirect("Produktivitas");
    }
}
