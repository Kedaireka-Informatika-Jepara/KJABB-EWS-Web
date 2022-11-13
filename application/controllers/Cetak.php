<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdfgenerator');
        $this->load->model('System_model');
    }

    public function cetak_laporan_result()
    {
        $data['title_pdf'] = 'Laporan Hasil Perhitungan';
        $userid = $this->session->userdata('id');
        $stationid = $this->session->userdata('stationid');
        $data['station'] = $this->System_model->get_station_print($stationid, $userid);
        $data['species'] = $this->System_model->get_species_print($stationid, $userid);
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
        $file_pdf = 'laporan_hasil_perhitungan';
        $paper = 'A4';
        $orientation = "portrait";
        $html = $this->load->view('print/laporan', $data, TRUE);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function cetak_laporan_data()
    {
        $data['title_pdf'] = 'Laporan Hasil Perhitungan';
        $userid = $this->session->userdata('id');
        $stationid = $this->session->userdata('print_station');
        $data['species'] = $this->System_model->get_species_print($stationid, $userid);
        $data['station'] = $this->System_model->get_all_station_print($stationid, $userid);
        $data['value'] = $this->System_model->get_all_value($stationid, $userid);
        $file_pdf = 'laporan_hasil_perhitungan';
        $paper = 'A4';
        $orientation = "portrait";
        $html = $this->load->view('print/laporan_data', $data, TRUE);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
