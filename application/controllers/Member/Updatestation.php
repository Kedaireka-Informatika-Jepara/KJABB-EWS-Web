<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Updatestation extends CI_Controller
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
        if ($this->session->userdata('role_id') == 2) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $stationid = $this->session->userdata('update_station');
            $userid = $this->session->userdata('id');
            $data['station'] = $this->System_model->get_station_update($stationid, $userid);
            $this->load->view('templates/main_header', $data);
            $this->load->view('templates/member_sidebar', $data);
            $this->load->view('templates/main_topbar', $data);
            $this->load->view('member/updatestation', $data);
            $this->load->view('templates/main_footer', $data);
        } else {
            redirect('Login/blocked');
        }
    }

    public function updateStation()
    {
        $this->form_validation->set_rules('geographical_zone', 'Geographical_Zone', 'required');
        $this->form_validation->set_rules('type_water', 'Type_Water', 'required');
        $this->form_validation->set_rules('station_id', 'Station_ID', 'required|trim|max_length[14]', [
            'max_length' => 'Station ID is too long'
        ]);
        $stationid = $this->input->post('station_id');
        $geographical_zone = $this->input->post('geographical_zone');
        $type_water = $this->input->post('type_water');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'station_id' => $stationid,
                'geographical_zone' => $geographical_zone,
                'type_water' => $type_water,
                'user_id' => $this->session->userdata('id')
            ];
            $this->db->where('station_id', $stationid);
            $this->db->where('user_id', $this->session->userdata('id'));
            $this->db->update('station', $data);
            $this->session->set_flashdata('success', 'Station is updated');
            $this->session->set_userdata('stationid', $stationid);
            $this->session->set_userdata('geographical_zone', $geographical_zone);
            $this->session->set_userdata('type_water', $type_water);
            redirect('Member/Updatemain');
        }
    }
}
