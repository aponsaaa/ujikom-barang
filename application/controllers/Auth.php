<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {
        $data = ['title' => 'Login'];
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login', $data);
            // echo 'hai';
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];
            $this->load->view('auth/login', $data);
        }
    }

    public function register()
    {
        $data = ['title' => 'Register'];
        $this->form_validation->set_rules(
            'nama',
            'nama lengkap',
            'required|min_length[5]',
            array(
                'required'      => 'Kamu belum memasukan %s.',
                'min_length'     => 'Minimal 5 karakter'

            )
        );
        $this->form_validation->set_rules(
            'email',
            'email',
            'required|is_unique[users.email]',
            array(
                'required'      => 'Kamu belum memasukan %s.',
                'is_unique'     => '%s ini sudah digunakan.'
            )
        );
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|min_length[5]',
            array(
                'required'      => 'Kamu belum memasukan %s.',
                'min_length'     => 'Minimal 5 karakter'
            )
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register', $data);
            // echo 'hai';
        } else {
            $data = [
                'id' => str_replace('-', '', $this->uuid->v4()),
                'nama' => ucwords($this->input->post('nama')),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];
            $this->CrudModel->add($data, 'users');
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata(
                    'success',
                    'You have successfully registered'
                );
                redirect('login', 'refresh');
            } else {
                $this->session->set_flashdata(
                    'error',
                    'There is something wrong'
                );
                redirect('register', 'refresh');
            }
        }
    }
}
