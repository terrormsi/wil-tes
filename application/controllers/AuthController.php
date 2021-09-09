<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $data = [
            'email' => $this->input->post('email', true),
            'password' => $this->input->post('password', true),
        ];

        $response = $this->Auth->verify($data);
        if (empty($response)) {
            $this->session->set_flashdata('auth_failed', 'Username atau password anda salah !');

            return redirect(site_url());
        }

        $this->initSession($response);

        return redirect(site_url('user/dashboard'));
    }

    public function initSession(object $response): void
    {
        $_SESSION['user'] = [
            'id' => $response->id,
            'token' => $response->token,
        ];
    }

    public function logout()
    {
        session_destroy();

        return redirect(site_url());
    }
}
