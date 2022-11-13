<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataweight extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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
            $this->load->view('admin/dataweight', $data);
            $this->load->view('templates/main_footer', $data);
        } else {
            redirect('Login/blocked');
        }
    }

    public function redirect()
    {
        $halaman = $this->input->post('redirect');

        if ($halaman == 'index') {
            redirect('Admin/Dataindex');
        } else if ($halaman == 'main') {
            redirect('Admin/Datamain');
        } else if ($halaman == 'add') {
            redirect('Admin/Dataadd');
        }
    }
}
