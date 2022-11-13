<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
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
        if ($this->session->userdata('role_id') == 2) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $userid = $this->session->userdata('id');
            $data['species'] = $this->System_model->get_species_user($userid);
            $data['station'] = $this->System_model->get_station_user($userid);
            $this->load->view('templates/main_header', $data);
            $this->load->view('templates/member_sidebar', $data);
            $this->load->view('templates/main_topbar', $data);
            $this->load->view('member/data', $data);
            $this->load->view('templates/main_footer', $data);
        } else {
            redirect('Login/blocked');
        }
    }

    public function update($stationid)
    {
        $stationid = $this->uri->segment(4);
        $this->session->set_userdata('update_station', $stationid);
        redirect('Member/Updatestation');
    }

    public function cetak($stationid)
    {
        $stationid = $this->uri->segment(4);
        $this->session->set_userdata('print_station', $stationid);
        redirect('Cetak/cetak_laporan_data');
    }
}
