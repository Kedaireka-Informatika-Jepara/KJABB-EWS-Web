<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Updatemain extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('System_model');
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Login first!</div>');
            redirect('Login');
        }
    }

    public function index()
    {
        if ($this->session->userdata('role_id') == 1) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $userid = $this->session->userdata('id');
            $stationid = $this->session->userdata('stationid');
            $data['species'] = $this->System_model->get_species($stationid, $userid);
            $data['value_input'] = $this->System_model->get_value_main_abiotic($stationid, $userid);
            $data['family_dd'] = $this->System_model->get_family_biotic_dd();
            $this->load->view('templates/main_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/main_topbar', $data);
            $this->load->view('admin/updatemain', $data);
            $this->load->view('templates/main_footer', $data);
        } else {
            redirect('Login/blocked');
        }
    }

    public function addSpecies()
    {
        $this->form_validation->set_rules('species_genus', 'Species_Genus', 'required');
        $this->form_validation->set_rules('family', 'Family', 'required');
        $this->form_validation->set_rules('abundance', 'Abundance', 'required');
        $family = $this->input->post('family');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $biotic = $this->db->get('family_biotic')->result();
            foreach ($biotic as $row) {
                if ($family === $row->family) {
                    $taxa_indicator = $row->bobot;
                    break;
                } else {
                    $taxa_indicator = 0;
                }
            }
            $data = [
                'family' => $this->input->post('family'),
                'species' => $this->input->post('species_genus'),
                'abundance' => $this->input->post('abundance'),
                'taxa_indicator' => $taxa_indicator,
                'station_id' => $this->session->userdata('stationid'),
                'user_id' => $this->session->userdata('id')
            ];
            $this->db->insert('species', $data);
            $this->session->set_flashdata('success', 'New species has been added');
            redirect('Admin/Updatemain');
        }
    }

    public function deleteSpecies()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('species');
        $this->session->set_flashdata('success', 'Species has been deleted');
        redirect('Admin/Updatemain');
    }

    public function updateMainAbiotic()
    {
        $temperature = $this->input->post('temperature');
        $salinity = $this->input->post('salinity');
        $do = $this->input->post('do');
        $ph = $this->input->post('ph');
        if ($temperature != NULL) {
            $bobot_temperature = $this->db->get_where('main_abiotic', ['nilai_awal <=' => $temperature, 'nilai_akhir >=' => $temperature, 'geographical_zone' => $this->session->userdata('geographical_zone'), 'name' => 'Temperature'])->row();
        } else {
            $this->db->select_max('bobot');
            $bobot_temperature = $this->db->get_where('main_abiotic', ['geographical_zone' => $this->session->userdata('geographical_zone'), 'name' => 'Temperature'])->row();
        }
        if ($salinity != NULL) {
            $bobot_salinity = $this->db->get_where('main_abiotic', ['nilai_awal <=' => $salinity, 'nilai_akhir >=' => $salinity, 'type_water' => $this->session->userdata('type_water'), 'name' => 'Salinity'])->row();
        } else {
            $this->db->select_max('bobot');
            $bobot_salinity = $this->db->get_where('main_abiotic', ['type_water' => $this->session->userdata('type_water'), 'name' => 'Salinity'])->row();
        }
        if ($do != NULL) {
            $bobot_do = $this->db->get_where('main_abiotic', ['nilai_awal <=' => $do, 'nilai_akhir >=' => $do, 'name' => 'DO'])->row();
        } else {
            $this->db->select_max('bobot');
            $bobot_do = $this->db->get_where('main_abiotic', ['name' => 'DO'])->row();
        }
        if ($ph != NULL) {
            $bobot_ph = $this->db->get_where('main_abiotic', ['nilai_awal <=' => $ph, 'nilai_akhir >=' => $ph, 'name' => 'PH'])->row();
        } else {
            $this->db->select_max('bobot');
            $bobot_ph = $this->db->get_where('main_abiotic', ['name' => 'PH'])->row();
        }
        $data = [
            'temperature' => $temperature,
            'bobot_temperature' => $bobot_temperature->bobot,
            'salinity' => $salinity,
            'bobot_salinity' => $bobot_salinity->bobot,
            'do' => $do,
            'bobot_do' => $bobot_do->bobot,
            'ph' => $ph,
            'bobot_ph' => $bobot_ph->bobot,
            'user_id' => $this->session->userdata('id'),
            'station_id' => $this->session->userdata('stationid')
        ];
        $this->db->where('station_id', $this->session->userdata('stationid'));
        $this->db->where('user_id', $this->session->userdata('id'));
        $this->db->update('main_abiotic_station', $data);
        $this->session->set_flashdata('success', 'Values has been updated');
        redirect('Admin/Updateadd');
    }
}
