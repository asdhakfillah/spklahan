<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisi extends CI_Controller
{


    public function index()
    {
        $data['kondisi_data'] = $this->db
            ->get('kondisi')
            ->result();
        $this->load->view('admin/kondisi/index', $data);
    }

    public function insert()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
       
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/kondisi/insert');
        } else {
            $set_users = [
                'keterangan' => $this->input->post('keterangan'),
                'range_awal' => $this->input->post('range_awal'),
                'range_akhir' => $this->input->post('range_akhir'),
                'nilai_bobot' => $this->input->post('nilai_bobot'),
            ];
            $this->db->insert('kondisi', $set_users);

            redirect("Kondisi");
        }
    }

    public function update($id_kondisi)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    

        if ($this->form_validation->run() == false) {
            $users_data = $this->db
                ->where('id_kondisi', $id_kondisi)
                ->get('kondisi')
                ->row(0);
            $data['kondisi_data'] = $users_data;
            $this->load->view('admin/kondisi/update', $data);
        } else {
            $set_kondisi = [
                'keterangan' => $this->input->post('keterangan'),
                'range_awal' => $this->input->post('range_awal'),
                'range_akhir' => $this->input->post('range_akhir'),
                'nilai_bobot' => $this->input->post('nilai_bobot'),
            ];

            $this->db
                ->where('id_kondisi', $id_kondisi)
                ->update('kondisi', $set_kondisi);

            redirect('Kondisi');
        }
    }

    public function delete($id_kondisi)
    {

        $this->db
            ->where('id_kondisi', $id_kondisi)
            ->delete('kondisi');

        redirect("Kondisi");
    }
}
