<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepribadian extends CI_Controller
{


    public function index()
    {
        $data['kepribadian_data'] = $this->db
            ->get('kepribadian')
            ->result();
        $this->load->view('admin/kepribadian/index', $data);
    }

    public function insert()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
       
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/kepribadian/insert');
        } else {
            $set_users = [
                'keterangan' => $this->input->post('keterangan'),
                'range_awal' => $this->input->post('range_awal'),
                'range_akhir' => $this->input->post('range_akhir'),
                'nilai_bobot' => $this->input->post('nilai_bobot'),
            ];
            $this->db->insert('kepribadian', $set_users);

            redirect("Kepribadian");
        }
    }

    public function update($id_kepribadian)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    

        if ($this->form_validation->run() == false) {
            $users_data = $this->db
                ->where('id_kepribadian', $id_kepribadian)
                ->get('kepribadian')
                ->row(0);
            $data['kepribadian_data'] = $users_data;
            $this->load->view('admin/kepribadian/update', $data);
        } else {
            $set_kepribadian = [
                'keterangan' => $this->input->post('keterangan'),
                'range_awal' => $this->input->post('range_awal'),
                'range_akhir' => $this->input->post('range_akhir'),
                'nilai_bobot' => $this->input->post('nilai_bobot'),
            ];

            $this->db
                ->where('id_kepribadian', $id_kepribadian)
                ->update('kepribadian', $set_kepribadian);

            redirect('Kepribadian');
        }
    }

    public function delete($id_kepribadian)
    {

        $this->db
            ->where('id_kepribadian', $id_kepribadian)
            ->delete('kepribadian');

        redirect("Kepribadian");
    }
}
