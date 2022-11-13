<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datataxa extends CI_Controller
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
            $data['family'] = $this->System_model->get_family_biotic();
            $this->load->view('templates/main_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/main_topbar', $data);
            $this->load->view('admin/datataxa', $data);
            $this->load->view('templates/main_footer', $data);
        } else {
            redirect('Login/blocked');
        }
    }

    public function add()
    {
        $this->form_validation->set_rules('family', 'Family', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'There was some error when inputting data');
            $this->index();
        } else {
            $data = [
                'family' => $this->input->post('family'),
                'bobot' => $this->input->post('bobot')
            ];
            $this->db->insert('family_biotic', $data);
            $this->session->set_flashdata('success', 'New data has been added');
            redirect('Admin/Datataxa');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('family', 'Family', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'There was some error when editing data');
            $this->index();
        } else {
            $id = $this->input->post('id');
            $data = [
                'family' => $this->input->post('family'),
                'bobot' => $this->input->post('bobot')
            ];
            $this->db->where('id', $id);
            $this->db->update('family_biotic', $data);
            $this->session->set_flashdata('success', 'Data has been edited');
            redirect('Admin/Datataxa');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('family_biotic');
        $this->session->set_flashdata('success', 'Data has been deleted');
        redirect('Admin/Datataxa');
    }
}
