<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }

    public function index()
    {
        $current_page = $this->uri->segment(3);
        if (empty($current_page)) {
            $current_page = 1;
        }
        $this->setPaginationConfig();

        $user_list = $this->User->getUserList($current_page);
        $this->load->view('dashboard', ['user_list' => $user_list]);
    }

    public function store()
    {
        $data = [
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
        ];
        $response = $this->User->insert($data);

        if (empty($response)) {
            $this->session->set_flashdata('insert_failed', 'Maaf, terjadi kesalahan');

            return redirect(site_url('user/dashboard'));
        }

        $this->session->set_flashdata('insert_success', "Berhasil ditambah pada pukul {$response->createdAt}");

        return redirect(site_url('user/dashboard'));
    }

    public function edit()
    {
        $data = [
            'id' => $this->input->post('user_id'),
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
        ];
        $response = $this->User->update($data);

        if (empty($response)) {
            $this->session->set_flashdata('update_failed', 'Maaf, terjadi kesalahan');

            return redirect(site_url('user/dashboard'));
        }

        $this->session->set_flashdata('update_success', "Berhasil diperbarui pada pukul {$response->updatedAt}");

        return redirect(site_url('user/dashboard'));
    }

    public function delete()
    {
        $uid = $this->input->post('user_id');
        $status_code = $this->User->drop($uid);

        if (204 !== $status_code) {
            $this->session->set_flashdata('delete_failed', 'Maaf, terjadi kesalahan');

            return redirect(site_url('user/dashboard'));
        }

        $this->session->set_flashdata('delete_success', 'User telah dihapus');

        return redirect(site_url('user/dashboard'));
    }

    private function setPaginationConfig(): void
    {
        $config['base_url'] = site_url('user/dashboard/');
        $config['total_rows'] = 12;
        $config['per_page'] = 6;
        $config['use_page_numbers'] = true;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="text-center"><nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $this->pagination->initialize($config);
    }
}
