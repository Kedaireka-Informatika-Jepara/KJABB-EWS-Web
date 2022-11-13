<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $this->load->view('templates/login_header', $data);
            $this->load->view('login/login');
            $this->load->view('templates/login_footer');
        } else {
            $this->_masuk();
        }
    }

    private function _masuk()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'membership' => $user['membership']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('Admin/Datauser');
                    } else if ($user['role_id'] == 2) {
                        redirect('Member/Station');
                    } else if ($user['role_id'] == 3) {
                        redirect('Operator/Dataweight');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('Login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User is not active!</div>');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User is not registered!</div>');
            redirect('Login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('stationid');
        $this->session->unset_userdata('geographical_zone');
        $this->session->unset_userdata('type_water');
        $this->session->unset_userdata('cek_station');
        $this->session->unset_userdata('cek_user');
        $this->session->unset_userdata('print_station');
        $this->session->unset_userdata('update_station');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('Login');
    }

    public function blocked()
    {
        $this->load->view('login/blocked');
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]', [
            'is_unique' => 'Email already registered!'
        ]);
        $this->form_validation->set_rules('membership', 'Membership', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]|min_length[4]', [
            'matches' => 'Password is not match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]|min_length[4]');
        $this->form_validation->set_rules('membership', 'Membership', 'required');
        $email = $this->input->post('email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Registrasi';
            $this->load->view('templates/login_header', $data);
            $this->load->view('login/registration');
            $this->load->view('templates/login_footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $email,
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time(),
                'membership' => $this->input->post('membership')
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User has been registered!</div>');
            redirect('Login');
        }
    }

    public function changepassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('oldpassword', 'Old Password', 'required|trim');
        $this->form_validation->set_rules('newpassword1', 'New Password1', 'required|trim|matches[newpassword2]|min_length[4]', [
            'matches' => 'Password is not match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('newpassword2', 'New Password2', 'required|trim|matches[newpassword1]|min_length[4]');
        $id = $this->input->post('id');
        $current_password = $this->input->post('oldpassword');
        $new_password = $this->input->post('newpassword1');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'There was some error at inputting data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('error', 'Old password is wrong');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('error', 'New password cannot be the same as old password');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('id', $id);
                    $this->db->update('user');
                    $this->session->set_flashdata('success', 'Password has been changed');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }
    }

    public function payment()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if (empty($_FILES['bukti']['name'])) {
            $this->form_validation->set_rules('bukti', 'Document', 'required');
        }
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Pembayaran';
            $this->load->view('templates/login_header', $data);
            $this->load->view('login/payment');
            $this->load->view('templates/login_footer');
        } else {
            $this->do_upload();
        }
    }

    private function do_upload()
    {
        $email = $this->input->post('email');
        $cek_user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($cek_user) {
            $new_name = time() . $_FILES['bukti']['name'];
            $config['upload_path']      = './bukti/';
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['file_name']        = $new_name;
            $config['max_size']         = 2048;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('bukti')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error['error'] . '</div>');

                redirect('login/payment');
            } else {
                date_default_timezone_set('Asia/Bangkok');
                $now = date('Y-m-d H:i:s');
                $data = array('upload_data' => $this->upload->data());
                $data = [
                    'user_email' => $email,
                    'bukti' => $data['upload_data']['file_name'],
                    'datetime' => $now,
                    'status' => 0
                ];
                $this->db->insert('payment', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Payment data has been entered!</div>');
                redirect('login/payment');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered</div>');
            redirect('login/payment');
        }
    }
}
