<?php

use FontLib\Table\Type\post;

defined('BASEPATH') or exit('Tidak ada akses skrip langsung yang diizinkan');

class Datauser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('System_model');
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tolong masuk terlebih dahulu!</div>');
            redirect('Login');
        }
    }

    public function index()
    {

        if ($this->session->userdata('role_id') == 1) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['member'] = $this->System_model->get_user();
            $this->load->view('templates/main_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/main_topbar', $data);
            $this->load->view('admin/datauser', $data);
            $this->load->view('templates/main_footer', $data);
        } else {
            redirect('Login/blocked');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]', [
            'is_unique' => 'Email telah berhasil terdaftar'
        ]);
        $this->form_validation->set_rules('role', 'Roles', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]|min_length[4]', [
            'matches' => 'Password tidak sesuai!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]|min_length[4]');
        $role_id = $this->input->post('role');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Disini terjadi error saat memasukkan data');
            $this->index();
        } else {
            if ($role_id == 2) {
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => $role_id,
                    'is_active' => 1,
                    'date_created' => time(),
                    'membership' => $this->input->post('membership')
                ];
                $this->db->insert('user', $data);
                $this->session->set_flashdata('sukses', 'User baru berhasil ditambahkan');
                redirect('Admin/Datauser');
            } else {
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => $role_id,
                    'is_active' => 1,
                    'date_created' => time(),
                    'membership' => 4
                ];
                $this->db->insert('user', $data);
                $this->session->set_flashdata('sukses', 'User baru berhasil ditambahkan');
                redirect('Admin/Datauser');
            }
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('role', 'Roles', 'required');
        $this->form_validation->set_rules('membership', 'Membership', 'required');
        $id = $this->input->post('id');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Disini terjadi error saat memasukkan data');
            $this->index();
        } else {
            if ($this->form_validation->run()) {
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'role_id' => $this->input->post('role'),
                    'membership' => $this->input->post('membership')
                ];
                $this->db->where('id', $id);
                $this->db->update('user', $data);
                $this->session->set_flashdata('sukses', 'Data pengguna berhasil diubah');
                redirect('Admin/Datauser');
            }
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('sukses', 'Data pengguna berhasil dihapus');
        redirect('Admin/Datauser');
    }

    public function deactivate()
    {
        $id = $this->input->post('id');
        $data = [
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        $this->session->set_flashdata('sukses', 'Data pengguna berhasil dinonaktifkan');
        redirect('Admin/Datauser');
    }

    public function activate()
    {
        $id = $this->input->post('id');
        $data = [
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        $this->session->set_flashdata('sukses', 'Data pengguna berhasil diaktifkan');
        redirect('Admin/Datauser');
    }
}
