<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Survey extends CI_Controller
{

    public function index()
    {
        $this->load->library('form_validation');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/penentuan/index');
        } else {
        }
    }

    public function perhitungan()
    {
        $id = 2;

        $data_survey = $this->db
            ->get('survey')
            ->result();

        $data_id = [];
        $data = [];
        foreach ($data_survey as $key => $value) {
            $data_id[$key] = $value->id;
            $data[$key][0] = $this->db->query("SELECT * FROM `kepribadian` WHERE range_awal <= " . $value->nilai_kepribadian . " and range_akhir >= " . $value->nilai_kepribadian)->row(0)->nilai_bobot;
            $data[$key][1] = $this->db->query("SELECT * FROM `kondisi` WHERE range_awal <= " . $value->nilai_kondisi . " and range_akhir >= " . $value->nilai_kondisi)->row(0)->nilai_bobot;
            $data[$key][2] = $this->db->query("SELECT * FROM `penghasilan` WHERE range_awal <= " . $value->nilai_penghasilan . " and range_akhir >= " . $value->nilai_penghasilan)->row(0)->nilai_bobot;
            $data[$key][3] = $this->db->where('keterangan', $value->nilai_jaminan)->get('jaminan')->row(0)->nilai_bobot;
            $data[$key][4] = $this->db->query("SELECT * FROM `modal` WHERE range_awal <= " . $value->nilai_modal . " and range_akhir >= " . $value->nilai_modal)->row(0)->nilai_bobot;
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

        $hasil = [];
        foreach ($normalisasi as $key => $value) {
            $kali = 0;
            $pangkat = 1;
            foreach ($value as $k => $v) {
                $bobot = $this->db->where('id', $k + 1)->get('bobot')->row(0)->bobot;
                $kali += $v * $bobot;
                $pangkat *= pow($v, $bobot);
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
            $this->db->where('id',$data_id[$key])->update('survey',['hasil'=> $value]);
        }
    }
}
