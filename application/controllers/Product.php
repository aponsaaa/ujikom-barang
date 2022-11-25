<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $result = $this->CrudModel->get('product')->result_array();
        $data = [
            'title' => 'Listing Product',
            'result' => $result
        ];
        $this->load->view('header');
        $this->load->view('product/v_product', $data);
        $this->load->view('footer');
    }

    public function addProduct()
    {
        $this->form_validation->set_rules(
            'nama',
            'nama produk',
            'required|min_length[5]',
            array(
                'required'      => 'Kamu belum memasukan %s.',
                'min_length'     => 'Minimal 5 karakter'
            )
        );
        $this->form_validation->set_rules(
            'harga',
            'harga',
            'required',
            array(
                'required'      => 'Kamu belum memasukan %s.',
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                'There is something wrong'
            );
            $this->load->view('header');
            $this->load->view('product/v_add_product');
            $this->load->view('footer');
        } else {
            // Upload image summernote
            $config['allowed_types']    = 'jpeg|jpg|png';
            $config['max_size']         = '5048';
            $config['encrypt_name']     = true;
            $config['upload_path']      = './assets/assets/img/product/';
            $fileUpload = $_FILES['fotoProduk']['name'];
            if ($fileUpload) {
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('fotoProduk')) {
                    $new_fileUpload = $this->upload->data('file_name');
                    $data = [
                        'id' => $this->uuid->v4(),
                        'nama' => ucwords($this->input->post('nama')),
                        'harga' => $this->input->post('harga'),
                        'gambar' => $new_fileUpload
                    ];
                    $this->CrudModel->add($data, 'product');
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata(
                            'success',
                            'Berhasil menambahkan produck'
                        );
                        redirect(
                            'product',
                            'refresh'
                        );
                    } else {
                        $this->session->set_flashdata(
                            'error',
                            'Ada sesuatu yang salah dengan database'
                        );
                        redirect(
                            'product/add-product',
                            'refresh'
                        );
                    }
                } else {
                    $this->session->set_flashdata('error', ' Ada yang salah dengan picture');
                    redirect('product/add-product', 'refresh');
                }
            } else {
                $this->session->set_flashdata('error', ' Periksa kembali inputan anda');
                redirect('product/add-product', 'refresh');
            }
        }
    }
}
