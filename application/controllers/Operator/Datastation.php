<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datastation extends CI_Controller
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
        if ($this->session->userdata('role_id') == 3) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['station'] = $this->System_model->get_all_station();
            $this->load->view('templates/main_header', $data);
            $this->load->view('templates/operator_sidebar', $data);
            $this->load->view('templates/main_topbar', $data);
            $this->load->view('operator/datastation', $data);
            $this->load->view('templates/main_footer', $data);
        } else {
            redirect('Login/blocked');
        }
    }

    public function delete()
    {
        $station_id = $this->input->post('station_id');
        $user_id = $this->input->post('user_id');
        $this->db->where('station_id', $station_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete(array('station', 'result', 'main_abiotic_station', 'index_add_station', 'species'));
        $this->session->set_flashdata('success', 'Data has been deleted');
        redirect('Operator/Datastation');
    }

    public function parameter($stationid, $userid)
    {
        $stationid = $this->uri->segment(4);
        $userid = $this->uri->segment(5);
        $this->session->set_userdata('cek_station', $stationid);
        $this->session->set_userdata('cek_user', $userid);
        redirect('Operator/Dataparameter');
    }
}
