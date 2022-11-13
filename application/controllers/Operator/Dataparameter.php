<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataparameter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('System_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Login first!</div>');
            redirect('Login');
        }
    }

    public function index()
    {
        if ($this->session->userdata('role_id') == 3) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $stationid = $this->session->userdata('cek_station');
            $userid = $this->session->userdata('cek_user');
            $data['species'] = $this->System_model->get_species($stationid, $userid);
            $data['value'] = $this->System_model->get_all_value($stationid, $userid);
            $data['station'] = $this->System_model->get_station($stationid, $userid);
            $this->load->view('templates/main_header', $data);
            $this->load->view('templates/operator_sidebar', $data);
            $this->load->view('templates/main_topbar', $data);
            $this->load->view('operator/dataparameter', $data);
            $this->load->view('templates/main_footer', $data);
        } else {
            redirect('Login/blocked');
        }
    }
}
