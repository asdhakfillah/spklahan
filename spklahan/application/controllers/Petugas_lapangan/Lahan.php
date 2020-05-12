<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lahan extends CI_Controller
{
    public function index()
    {
        $this->load->library('form_validation');
        $this->load->library(array('session'));
        $data_perhitungan['data_perhitungan'] = $this->db->order_by('hasil')->get('lahan')->result();
        $this->load->view('petugas_lapangan/lahan/index', $data_perhitungan);
    }

    public function insert($id_pendaftaran = null)
    {
        $data = [];
        if ($id_pendaftaran != null) {
            $data['data_pendaftaran'] = $this->db->where('id', $id_pendaftaran)->get('pendaftaran')->row(0);
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('namapetugas', 'namapetugas', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('desa', 'desa', 'trim|required');
        $this->form_validation->set_rules('sumberair', 'sumberair', 'trim|required');
        $this->form_validation->set_rules('minatmasyarakat', 'minatmasyarakat', 'trim|required');
        $this->form_validation->set_rules('nilai_kekeruhan', 'nilai_kekeruhan', 'trim|required');
        $this->form_validation->set_rules('nilai_sisa_khlor', 'nilai_sisa_khlor', 'trim|required');
        $this->form_validation->set_rules('nilai_ph', 'nilai_ph', 'trim|required');
        $this->form_validation->set_rules('jaraksumberair', 'jaraksumberair', 'trim|required');
        $this->form_validation->set_rules('perizinan', 'perizinan', 'trim|required');
        $this->form_validation->set_rules('investor', 'investor', 'trim|required');
        $this->form_validation->set_rules('konturtanah', 'konturtanah', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('petugas_lapangan/lahan/insert', $data);
        } else {
            $set_users = [
                'nama' => $this->input->post('nama'),
                'namapetugas' => $this->input->post('namapetugas'),
                'kecamatan' => $this->input->post('kecamatan'),
                'desa' => $this->input->post('desa'),
                'sumberair' => $this->input->post('sumberair'),
                'minatmasyarakat' => $this->input->post('minatmasyarakat'),
                'nilai_kekeruhan' => $this->input->post('nilai_kekeruhan'),
                'nilai_sisa_khlor' => $this->input->post('nilai_sisa_khlor'),
                'nilai_ph' => $this->input->post('nilai_ph'),
                'jaraksumberair' => $this->input->post('jaraksumberair'),
                'perizinan' => $this->input->post('perizinan'),
                'investor' => $this->input->post('investor'),
                'konturtanah' => $this->input->post('konturtanah'),
            ];
            $this->db->insert('lahan', $set_users);

            redirect("Petugas_lapangan/Lahan");
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


            ##FUZZY
            #kekeruhan
            ##ganti iki lek wes mbok ganti database e
            #$nilai_kekeruhan = $value->nama_kolom_kekeruhanmu
            $nilai_kekeruhan = $value->nilai_kekeruhan;
            $nilai_sisa_khlor = $value->nilai_sisa_khlor;
            $nilai_ph = $value->nilai_ph;

            $himpunan_kekeruhan = [
                'min' => 0,
                'max' => 5,
            ];
            $himpunan_sisa_khlor = [
                'min' => 0.2,
                'max' => 0.5,
            ];
            $himpunan_ph = [
                'min' => 6,
                'max' => 8.5,
            ];
            $himpunan_mutu = [
                'min' => 0,
                'max' => 1,
            ];

            $fuzzy_kekeruhan_buruk = 0;
            $fuzzy_kekeruhan_baik = 0;
            if ($nilai_kekeruhan <= 0) {
                $fuzzy_kekeruhan_buruk = 1;
                $fuzzy_kekeruhan_baik = 0;
            } else if ($nilai_kekeruhan > $himpunan_kekeruhan['min'] && $nilai_kekeruhan <= $himpunan_kekeruhan['max']) {
                $fuzzy_kekeruhan_buruk = ($himpunan_kekeruhan['max'] - $nilai_kekeruhan) / ($himpunan_kekeruhan['max'] - $himpunan_kekeruhan['min']);
                $fuzzy_kekeruhan_baik = ($nilai_kekeruhan - $himpunan_kekeruhan['min']) / ($himpunan_kekeruhan['max'] - $himpunan_kekeruhan['min']);
            } else {
                $fuzzy_kekeruhan_buruk = 0;
                $fuzzy_kekeruhan_baik = 1;
            }

            $fuzzy_sisa_khlor_buruk = 0;
            $fuzzy_sisa_khlor_baik = 0;
            if ($nilai_sisa_khlor <= 0) {
                $fuzzy_sisa_khlor_buruk = 1;
                $fuzzy_sisa_khlor_baik = 0;
            } else if ($nilai_sisa_khlor > $himpunan_sisa_khlor['min'] && $nilai_sisa_khlor <= $himpunan_sisa_khlor['max']) {
                $fuzzy_sisa_khlor_buruk = ($himpunan_sisa_khlor['max'] - $nilai_sisa_khlor) / ($himpunan_sisa_khlor['max'] - $himpunan_sisa_khlor['min']);
                $fuzzy_sisa_khlor_baik = ($nilai_sisa_khlor - $himpunan_sisa_khlor['min']) / ($himpunan_sisa_khlor['max'] - $himpunan_sisa_khlor['min']);
            } else {
                $fuzzy_sisa_khlor_buruk = 0;
                $fuzzy_sisa_khlor_baik = 1;
            }


            $fuzzy_ph_buruk = 0;
            $fuzzy_ph_baik = 0;
            if ($nilai_ph <= 0) {
                $fuzzy_ph_buruk = 1;
                $fuzzy_ph_baik = 0;
            } else if ($nilai_ph > $himpunan_ph['min'] && $nilai_ph <= $himpunan_ph['max']) {
                $fuzzy_ph_buruk = ($himpunan_ph['max'] - $nilai_ph) / ($himpunan_ph['max'] - $himpunan_ph['min']);
                $fuzzy_ph_baik = ($nilai_ph - $himpunan_ph['min']) / ($himpunan_ph['max'] - $himpunan_ph['min']);
            } else {
                $fuzzy_ph_buruk = 0;
                $fuzzy_ph_baik = 1;
            }

            $a[1] = min($fuzzy_kekeruhan_baik, $fuzzy_sisa_khlor_baik, $fuzzy_ph_baik);
            $a[2] = min($fuzzy_kekeruhan_baik, $fuzzy_sisa_khlor_baik, $fuzzy_ph_buruk);
            $a[3] = min($fuzzy_kekeruhan_baik, $fuzzy_sisa_khlor_buruk, $fuzzy_ph_baik);
            $a[4] = min($fuzzy_kekeruhan_buruk, $fuzzy_sisa_khlor_baik, $fuzzy_ph_baik);
            $a[5] = min($fuzzy_kekeruhan_buruk, $fuzzy_sisa_khlor_buruk, $fuzzy_ph_baik);
            $a[6] = min($fuzzy_kekeruhan_buruk, $fuzzy_sisa_khlor_baik, $fuzzy_ph_buruk);
            $a[7] = min($fuzzy_kekeruhan_baik, $fuzzy_sisa_khlor_buruk, $fuzzy_ph_buruk);
            $a[8] = min($fuzzy_kekeruhan_buruk, $fuzzy_sisa_khlor_buruk, $fuzzy_ph_buruk);

            $z[1] = ((($himpunan_mutu['max'] - $himpunan_mutu['min']) * $a[1]) - $himpunan_mutu['max']) * (-1);
            $z[2] = ((($himpunan_mutu['max'] - $himpunan_mutu['min']) * $a[2]) - $himpunan_mutu['max']) * (-1);
            $z[3] = ((($himpunan_mutu['max'] - $himpunan_mutu['min']) * $a[3]) - $himpunan_mutu['max']) * (-1);
            $z[4] = ((($himpunan_mutu['max'] - $himpunan_mutu['min']) * $a[4]) - $himpunan_mutu['max']) * (-1);
            $z[5] = ((($himpunan_mutu['max'] - $himpunan_mutu['min']) * $a[5]) - $himpunan_mutu['max']) * (-1);
            $z[6] = ((($himpunan_mutu['max'] - $himpunan_mutu['min']) * $a[6]) - $himpunan_mutu['max']) * (-1);
            $z[7] = ((($himpunan_mutu['max'] - $himpunan_mutu['min']) * $a[7]) - $himpunan_mutu['max']) * (-1);
            $z[8] = ((($himpunan_mutu['max'] - $himpunan_mutu['min']) * $a[8]) - $himpunan_mutu['max']) * (-1);


            $sum_akaliz = 0;
            foreach ($a as $k => $v) {
                $sum_akaliz += $a[$k] * $z[$k];
            }

            ##iki menurutku
            $fuzzy_mutu = $sum_akaliz / array_sum($a);

            ##iki menurutmu
            //$fuzzy_mutu = $sum_akaliz / (array_sum($a) + array_sum($z));
            
            if ($fuzzy_mutu >= 0.5) {
                $segi_kesehatan = 2;
            } else {
                $segi_kesehatan = 1;
            }

            ##

            $data[$key][2] = $segi_kesehatan;
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
                    if ($v == 0) {
                        $normalisasi[$key][$k] = 0;
                    } else {

                        $normalisasi[$key][$k] = $kriteria_min[$k] / $v;
                    }
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
                $kali += $v * ($bobot / 100);
                $pangkat += pow($v, ($bobot / 100));
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

        foreach ($hasil as $key => $value) {
            $this->db->where('id', $data_id[$key])->update('lahan', ['hasil' => $value]);
        }

        ($return);
    }

    public function export()
	{
        // $this->load->library(array('session'));
		$data['invoice'] = $this->model_lahan->tampil_data();
		$this->load->view('export_data_hasil_lahan', $data);
	}
}
