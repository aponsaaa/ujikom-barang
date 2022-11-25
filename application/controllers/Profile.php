<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $cek = $this->CrudModel->getId(['email' => $this->session->userdata('email')], 'users')->row_array();
        $data = [
            'title' => 'Profile',
            'row' => $cek,
        ];
        $this->load->view('header');
        $this->load->view('profile/v_profile', $data);
        $this->load->view('footer');
    }
}
