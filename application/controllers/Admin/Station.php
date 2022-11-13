<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Station extends CI_Controller
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
            $this->load->view('templates/main_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/main_topbar', $data);
            $this->load->view('admin/station', $data);
            $this->load->view('templates/main_footer', $data);
        } else {
            redirect('Login/blocked');
        }
    }

    public function addStation()
    {
        $this->form_validation->set_rules('geographical_zone', 'Geographical_Zone', 'required');
        $this->form_validation->set_rules('type_water', 'Type_Water', 'required');
        $this->form_validation->set_rules('station_id', 'Station_ID', 'required|trim|max_length[14]', [
            'max_length' => 'Station ID is too long'
        ]);
        $stationid = $this->input->post('station_id');
        $geographical_zone = $this->input->post('geographical_zone');
        $type_water = $this->input->post('type_water');
        $cek = $this->db->get_where('station', ['user_id' => $this->session->userdata('id'), 'station_id' => $stationid])->num_rows();
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            if ($cek > 0) {
                $this->session->set_flashdata('error', 'Station ID is already used!');
                redirect('Admin/Station');
            } else {
                $data = [
                    'station_id' => $stationid,
                    'geographical_zone' => $geographical_zone,
                    'type_water' => $type_water,
                    'user_id' => $this->session->userdata('id')
                ];
                $this->db->insert('station', $data);
                $this->session->set_flashdata('success', 'New station has been added');
                $this->session->set_userdata('stationid', $stationid);
                $this->session->set_userdata('geographical_zone', $geographical_zone);
                $this->session->set_userdata('type_water', $type_water);
                redirect('Admin/Mainparameter');
            }
        }
    }
}
