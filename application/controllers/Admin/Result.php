<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Result extends CI_Controller
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
            $userid = $this->session->userdata('id');
            $stationid = $this->session->userdata('stationid');
            $data['station'] = $this->System_model->get_station($stationid, $userid);
            $data['species'] = $this->System_model->get_species($stationid, $userid);
            $data['result'] = $this->System_model->result($stationid, $userid);
            $data['value'] = $this->System_model->get_all_value($stationid, $userid);
            if (($data['result'] >= 55.51) && ($data['result'] <= 74.00)) {
                $data['status'] = "Undisturbed Area";
                $data['conclusion'] = "Water environment condition is healthy, within normal range and undisturbed (Undisturbed Areas)";
                $data['recommendation'] = "Keep the carrying capacity of the environment (environmental carrying capacity) under normal/ stable conditions (equilibrium)";
            } elseif (($data['result'] >= 37.01) && ($data['result'] <= 55.50)) {
                $data['status'] = "Lightly Disturbed Area";
                $data['conclusion'] = "The aquatic environment is disrupted light level by the surrounding activity (Lightly Disturbed Areas)";
                $data['recommendation'] = "Further monitoring of local environmental conditions is needed and also needed to identifies the underlying causes of environmental disturbance";
            } elseif (($data['result'] >= 18.51) && ($data['result'] <= 37.00)) {
                $data['status'] = "Moderately Disturbed Area";
                $data['conclusion'] = "The aquatic environment is disrupted medium level by the surrounding activity  (Moderately Disturbed Areas)";
                $data['recommendation'] = "Further investigation and the application of biomonitoring on a regular basis is necessary to determine the factors causing environmental disturbance and decreased activity";
            } elseif ($data['result'] < 18.51) {
                $data['status'] = "Heavily Disturbed Area";
                $data['conclusion'] = "The aquatic environment is disrupted high level by the surrounding activity  (Heavy Disturbed Areas)";
                $data['recommendation'] = "Immediate action is required to restore local environmental conditions (recovery action). And if necessary, stop the temporary activity of the cause of environmental disturbance (vallowing action) at the time periode that determined based on abiotic and biotic factors";
            }
            $this->load->view('templates/main_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/main_topbar', $data);
            $this->load->view('admin/result', $data);
            $this->load->view('templates/main_footer', $data);
        } else {
            redirect('Login/blocked');
        }
    }

    public function addResult()
    {
        $data = [
            'result' => $this->input->post('value'),
            'conclusion' => $this->input->post('conclusion'),
            'status' => $this->input->post('status'),
            'recommendation' => $this->input->post('recommendation'),
            'station_id' => $this->session->userdata('stationid'),
            'user_id' => $this->session->userdata('id')
        ];
        $this->db->insert('result', $data);
        $this->session->unset_userdata('stationid');
        $this->session->unset_userdata('geographical_zone');
        $this->session->unset_userdata('type_water');
        $this->session->set_flashdata('success', 'Results has been added');
        redirect('Admin/Station');
    }
}
