<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Addparameter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('System_model');
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Login first!</div>');
            redirect('Login');
        }
    }

    public function index()
    {
        if ($this->session->userdata('role_id') == 2) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $userid = $this->session->userdata('id');
            $stationid = $this->session->userdata('stationid');
            $data['nospecies'] = $this->System_model->number_of_species($stationid, $userid);
            $data['taxa_indicator'] = $this->System_model->taxa_indicator($stationid, $userid);
            if ($this->System_model->totalabundance($stationid, $userid) == NULL) {
                $data['totalabundance'] = 0;
            } else {
                $data['totalabundance'] = $this->System_model->totalabundance($stationid, $userid);
            }
            $this->load->view('templates/main_header', $data);
            $this->load->view('templates/member_sidebar', $data);
            $this->load->view('templates/main_topbar', $data);
            $this->load->view('member/addparameter', $data);
            $this->load->view('templates/main_footer', $data);
        } else {
            redirect('Login/blocked');
        }
    }

    public function addIndexAdditional()
    {
        $userid = $this->session->userdata('id');
        $stationid = $this->session->userdata('stationid');
        $similarity = $this->input->post('similarity');
        $dominance = $this->input->post('dominance');
        $diversity = $this->input->post('diversity');
        if ($this->System_model->totalabundance($stationid, $userid) == NULL) {
            $totalabundance = 0;
        } else {
            $totalabundance = $this->System_model->totalabundance($stationid, $userid);
        }
        $nospecies = $this->System_model->number_of_species($stationid, $userid);
        $valuetaxa = $this->System_model->taxa_indicator($stationid, $userid);
        $conductivity = $this->input->post('conductivity');
        $ratiocn = $this->input->post('ratiocn');
        $turbidity = $this->input->post('turbidity');
        $sand = $this->input->post('sand');
        $clay = $this->input->post('clay');
        $silt = $this->input->post('silt');
        if ($similarity != NULL) {
            $bobot_similarity = $this->db->get_where('index_biotic', ['nilai_awal <=' => $similarity, 'nilai_akhir >=' => $similarity, 'name' => 'Similarity'])->row();
        } else {
            $this->db->select_max('bobot');
            $bobot_similarity = $this->db->get_where('index_biotic', ['name' => 'Similarity'])->row();
        }
        if ($dominance != NULL) {
            $bobot_dominance = $this->db->get_where('index_biotic', ['nilai_awal <=' => $dominance, 'nilai_akhir >=' => $dominance, 'name' => 'Dominance'])->row();
        } else {
            $this->db->select_max('bobot');
            $bobot_dominance = $this->db->get_where('index_biotic', ['name' => 'Dominance'])->row();
        }
        if ($diversity != NULL) {
            $bobot_diversity = $this->db->get_where('index_biotic', ['nilai_awal <=' => $diversity, 'nilai_akhir >=' => $diversity, 'name' => 'Diversity'])->row();
        } else {
            $this->db->select_max('bobot');
            $bobot_diversity = $this->db->get_where('index_biotic', ['name' => 'Diversity'])->row();
        }
        $bobot_abundance = $this->db->get_where('index_biotic', ['nilai_awal <=' => $totalabundance, 'nilai_akhir >=' => $totalabundance, 'name' => 'Total Abundance'])->row();
        $bobot_nospecies = $this->db->get_where('index_biotic', ['nilai_awal <=' => $nospecies, 'nilai_akhir >=' => $nospecies, 'name' => 'Number of Species'])->row();
        if ($conductivity != NULL) {
            $bobot_conductivity = $this->db->get_where('additional_abiotic', ['nilai_awal <=' => $conductivity, 'nilai_akhir >=' => $conductivity, 'name' => 'Conductivity'])->row();
        } else {
            $this->db->select_max('bobot');
            $bobot_conductivity = $this->db->get_where('additional_abiotic', ['name' => 'Conductivity'])->row();
        }
        if ($ratiocn != NULL) {
            $bobot_ratiocn = $this->db->get_where('additional_abiotic', ['nilai_awal <=' => $ratiocn, 'nilai_akhir >=' => $ratiocn, 'name' => 'Ratio CN'])->row();
        } else {
            $this->db->select_max('bobot');
            $bobot_ratiocn = $this->db->get_where('additional_abiotic', ['name' => 'Ratio CN'])->row();
        }
        if ($turbidity != NULL) {
            $bobot_turbidity = $this->db->get_where('additional_abiotic', ['nilai_awal <=' => $turbidity, 'nilai_akhir >=' => $turbidity, 'name' => 'Kekeruhan'])->row();
        } else {
            $this->db->select_max('bobot');
            $bobot_turbidity = $this->db->get_where('additional_abiotic', ['name' => 'Kekeruhan'])->row();
        }
        if ($sand != NULL) {
            $bobot_sand = $this->db->get_where('additional_abiotic', ['nilai_awal <=' => $sand, 'nilai_akhir >=' => $sand, 'name' => 'Sand'])->row();
        } else {
            $this->db->select_max('bobot');
            $bobot_sand = $this->db->get_where('additional_abiotic', ['name' => 'Sand'])->row();
        }
        if ($clay != NULL) {
            $bobot_clay = $this->db->get_where('additional_abiotic', ['nilai_awal <=' => $clay, 'nilai_akhir >=' => $clay, 'name' => 'Clay'])->row();
        } else {
            $this->db->select_max('bobot');
            $bobot_clay = $this->db->get_where('additional_abiotic', ['name' => 'Clay'])->row();
        }
        if ($silt != NULL) {
            $bobot_silt = $this->db->get_where('additional_abiotic', ['nilai_awal <=' => $silt, 'nilai_akhir >=' => $silt, 'name' => 'Silt'])->row();
        } else {
            $this->db->select_max('bobot');
            $bobot_silt = $this->db->get_where('additional_abiotic', ['name' => 'Silt'])->row();
        }
        $data = [
            'similarity' => $similarity,
            'bobot_similarity' => $bobot_similarity->bobot,
            'dominance' => $dominance,
            'bobot_dominance' => $bobot_dominance->bobot,
            'diversity' => $diversity,
            'bobot_diversity' => $bobot_diversity->bobot,
            'total_abundance' => $totalabundance,
            'bobot_total_abundance' => $bobot_abundance->bobot,
            'number_species' => $nospecies,
            'bobot_number_species' => $bobot_nospecies->bobot,
            'taxa_indicator' => $valuetaxa,
            'conductivity' => $conductivity,
            'bobot_conductivity' => $bobot_conductivity->bobot,
            'ratiocn' => $ratiocn,
            'bobot_ratiocn' => $bobot_ratiocn->bobot,
            'turbidity' => $turbidity,
            'bobot_turbidity' => $bobot_turbidity->bobot,
            'sand' => $sand,
            'bobot_sand' => $bobot_sand->bobot,
            'clay' => $clay,
            'bobot_clay' => $bobot_clay->bobot,
            'silt' => $silt,
            'bobot_silt' => $bobot_silt->bobot,
            'user_id' => $this->session->userdata('id'),
            'station_id' => $this->session->userdata('stationid')
        ];
        $this->db->insert('index_add_station', $data);
        $this->session->set_flashdata('success', 'Values has been added');
        redirect('Member/Result');
    }
}
