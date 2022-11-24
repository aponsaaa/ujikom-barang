<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data = ['title' => 'Login'];
        $this->load->view('auth/login', $data);
    }
}
