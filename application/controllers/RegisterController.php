<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RegisterController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }

    public function index()
    {
        $this->load->view('register');
    }

    public function store()
    {
        $data = [
            'email' => $this->input->post('email', true),
            'password' => $this->input->post('password', true),
        ];

        $response = $this->User->register($data);
        if (empty($response)) {
            $this->session->set_flashdata('register_failed', 'Maaf, terjadi kesalahan');

            return redirect(site_url());
        }
        $this->session->set_flashdata('register_success', 'Akun anda berhasil dibuat !');

        return redirect(site_url());
    }
}
