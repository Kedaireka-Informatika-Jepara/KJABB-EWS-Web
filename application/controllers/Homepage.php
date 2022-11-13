<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/homepage_header');
        $this->load->view('homepage/homepage');
        $this->load->view('templates/homepage_footer');
    }
}
