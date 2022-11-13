<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapayment extends CI_Controller
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
            $data['payment'] = $this->System_model->get_payment();
            $this->load->view('templates/main_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/main_topbar', $data);
            $this->load->view('admin/datapayment', $data);
            $this->load->view('templates/main_footer', $data);
        } else {
            redirect('Login/blocked');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $nama_file = $this->input->post('bukti');
        $this->db->where('id', $id);
        $this->db->delete('payment');
        unlink('./bukti/' . $nama_file);
        $this->session->set_flashdata('success', 'Payment data has been deleted');
        redirect('Admin/Datapayment');
    }

    public function confirm()
    {
        $id = $this->input->post('id');
        $data = [
            'status' => $this->input->post('status')
        ];
        $this->db->where('id', $id);
        $this->db->update('payment', $data);
        $this->session->set_flashdata('success', 'Payment has been confirmed');
        redirect('Admin/Datapayment');
    }

    public function unconfirm()
    {
        $id = $this->input->post('id');
        $data = [
            'status' => $this->input->post('status')
        ];
        $this->db->where('id', $id);
        $this->db->update('payment', $data);
        $this->session->set_flashdata('success', 'Payment has been unconfirmed');
        redirect('Admin/Datapayment');
    }
}
