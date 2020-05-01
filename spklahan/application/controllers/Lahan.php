<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lahan extends CI_Controller
{
	public function index()
	{
		$this->load->library('form_validation');
        $this->load->library(array('session'));
        $this->load->library('pdf');
		$data_perhitungan['data_perhitungan'] = $this->db->order_by('hasil')->get('lahan')->result();
		$this->load->view('admin/lahan/index',$data_perhitungan);   
    }
    function generate_to_pdf(){
        $data['data_perhitungan']=$this->db->order_by('id')->get('lahan')->result();
        $this->pdf->view('admin/lahan/index',$data);
        $this->pdf->render();
        $this->pdf->stream("data-lahan.pdf");
    }

    public function insert($id_pendaftaran = null)
    {
        $data = [];
        if($id_pendaftaran != null){
            $data['data_pendaftaran'] = $this->db->where('id',$id_pendaftaran)->get('pendaftaran')->row(0);
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('namapetugas', 'namapetugas', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('desa', 'desa', 'trim|required');
        $this->form_validation->set_rules('sumberair', 'sumberair', 'trim|required');
        $this->form_validation->set_rules('minatmasyarakat', 'minatmasyarakat', 'trim|required');
        $this->form_validation->set_rules('segikesehatan', 'segikesehatan', 'trim|required');
        $this->form_validation->set_rules('jaraksumberair', 'jaraksumberair', 'trim|required');
        $this->form_validation->set_rules('perizinan', 'perizinan', 'trim|required');
        $this->form_validation->set_rules('investor', 'investor', 'trim|required');
        $this->form_validation->set_rules('konturtanah', 'konturtanah', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/lahan/insert',$data);
        } else {
            $set_users = [
            'nama' => $this->input->post('nama'),
            'kecamatan' => $this->input->post('kecamatan'),
            'desa' => $this->input->post('desa'),
            'sumberair' => $this->input->post('sumberair'),
            'minatmasyarakat' => $this->input->post('minatmasyarakat'),
            'segikesehatan' => $this->input->post('segikesehatan'),
            'jaraksumberair' => $this->input->post('jaraksumberair'),
            'perizinan' => $this->input->post('perizinan'),
            'investor' => $this->input->post('investor'),
            'konturtanah' => $this->input->post('konturtanah'),
            ];
            $this->db->insert('lahan', $set_users);

            redirect("Lahan");
        }
    }

public function perhitungan()
{
   $data_lahan = $this->db
   ->get('lahan')
   ->result();

   $data_id = [];
   $data = [];
   foreach ($data_lahan as $key => $value) {
    $data_id[$key] = $value->id;
    $data[$key][0] = $value->sumberair;
    $data[$key][1] = $value->minatmasyarakat;
    $data[$key][2] = $value->segikesehatan;
    $data[$key][3] = $value->jaraksumberair;
    $data[$key][4] = $value->perizinan;
    $data[$key][5] = $value->investor;
    $data[$key][6] = $value->konturtanah; 
}

$kriteria_max = [];
$kriteria_min = [];

$truncate = [];
foreach ($data as $key => $value) {
    foreach ($value as $k => $v) {
        $truncate[$k][$key] = $v;
    }
}

foreach ($truncate as $key => $value) {
    $kriteria_max[$key] = max($value);
    $kriteria_min[$key] = min($value);
}

$normalisasi = [];
foreach ($data as $key => $value) {
    foreach ($value as $k => $v) {
        if ($this->db->where('id', $k + 1)->get('bobot')->row(0)->jenis == 1) {
            $normalisasi[$key][$k] = $v / $kriteria_max[$k];
        } else {
            $normalisasi[$key][$k] = $kriteria_min[$k] / $v;
        }
    }
}
($normalisasi);

$hasil = [];
foreach ($normalisasi as $key => $value) {
    $kali = 0;
    $pangkat = 0;
    foreach ($value as $k => $v) {
        $bobot = $this->db->where('id', $k + 1)->get('bobot')->row(0)->bobot;
        $kali += $v * ($bobot/100);
        $pangkat += pow($v, ($bobot/100));
    }
    $hasil[$key] = 0.5 * $kali + 0.5 * $pangkat;
}

$rank = $hasil;
rsort($rank);
foreach ($hasil as $value) {
    $rankedValue = array();
    $rankedValue['value'] = $value;
    $rankedValue['rank'] = array_search($value, $rank) + 1;
    $return[] = $rankedValue;
}

foreach($hasil as $key => $value){
    $this->db->where('id',$data_id[$key])->update('lahan',['hasil'=> $value]);
}

($return);
}


}