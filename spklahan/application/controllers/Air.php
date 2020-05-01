<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Air extends CI_Controller
{
	public function index()
	{
		$this->load->library('form_validation');
		$data_perhitungan['data_perhitungan'] = $this->db->order_by('hasil')->get('air')->result();
		$this->load->view('admin/air/index',$data_perhitungan);
	}
    public function insert($id_pendaftaran = null)
    {
        $data = [];
        if($id_pendaftaran != null){
            $data['data_pendaftaran'] = $this->db->where('id',$id_pendaftaran)->get('pendaftaran')->row(0);
        }
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('desa', 'desa', 'trim|required');
        $this->form_validation->set_rules('namapetugas', 'namapetugas', 'trim|required');
        $this->form_validation->set_rules('kekeruhan', 'kekeruhan', 'trim|required');
        $this->form_validation->set_rules('sisakhlor', 'sisakhlor', 'trim|required');
        $this->form_validation->set_rules('ph', 'ph', 'trim|required');
       
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/air/insert',$data);
        } else {
            $set_users = [
                'nama' => $this->input->post('nama'),
                'kecamatan' => $this->input->post('kecamatan'),
                'desa' => $this->input->post('desa'),
                'namapetugas' => $this->input->post('namapetugas'),
                'kekeruhan' => $this->input->post('kekeruhan'),
                'sisakhlor' => $this->input->post('sisakhlor'),
                'ph' => $this->input->post('ph'),
            ];
            $this->db->insert('air', $set_users);

            redirect("Air");
        }
    }

    // public function perhitungan()
    // {
    // 	$data_lahan = $this->db
    //         ->get('lahan')
    //         ->result();

    //     $data_id = [];
    //     $data = [];
    //     foreach ($data_lahan as $key => $value) {
    //         $data_id[$key] = $value->id;
    //         $data[$key][0] = $value->sumberair;
    //         $data[$key][1] = $value->minatmasyarakat;
    //         $data[$key][2] = $value->segikesehatan;
    //         $data[$key][3] = $value->jaraksumberair;
    //         $data[$key][4] = $value->perizinan;
    //         $data[$key][5] = $value->investor;
    //         $data[$key][6] = $value->konturtanah; 
    //     }

    //     $kriteria_max = [];
    //     $kriteria_min = [];

    //     $truncate = [];
    //     foreach ($data as $key => $value) {
    //         foreach ($value as $k => $v) {
    //             $truncate[$k][$key] = $v;
    //         }
    //     }

    //     foreach ($truncate as $key => $value) {
    //         $kriteria_max[$key] = max($value);
    //         $kriteria_min[$key] = min($value);
    //     }

    //     $normalisasi = [];
    //     foreach ($data as $key => $value) {
    //         foreach ($value as $k => $v) {
    //             if ($this->db->where('id', $k + 1)->get('bobot')->row(0)->jenis == 1) {
    //                 $normalisasi[$key][$k] = $v / $kriteria_max[$k];
    //             } else {
    //                 $normalisasi[$key][$k] = $kriteria_min[$k] / $v;
    //             }
    //         }
    //     }
    //     ($normalisasi);

    //     $hasil = [];
    //     foreach ($normalisasi as $key => $value) {
    //         $kali = 0;
    //         $pangkat = 0;
    //         foreach ($value as $k => $v) {
    //             $bobot = $this->db->where('id', $k + 1)->get('bobot')->row(0)->bobot;
    //             $kali += $v * ($bobot/100);
    //             $pangkat += pow($v, ($bobot/100));
    //         }
    //         $hasil[$key] = 0.5 * $kali + 0.5 * $pangkat;
    //     }

    //     $rank = $hasil;
    //     rsort($rank);
    //     foreach ($hasil as $value) {
    //         $rankedValue = array();
    //         $rankedValue['value'] = $value;
    //         $rankedValue['rank'] = array_search($value, $rank) + 1;
    //         $return[] = $rankedValue;
    //     }
        
    //     foreach($hasil as $key => $value){
    //         $this->db->where('id',$data_id[$key])->update('lahan',['hasil'=> $value]);
    //     }

    //     ($return);
    // }
}