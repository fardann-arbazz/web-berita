<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModels');
    }

    public function index()
    {
        $data['user'] = [];
        if (isset($this->session->userdata['username'])) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        }
        $data['title'] = 'User List Pages';

        $models = $this->UserModels->getDataUser();
        $data['users'] = $models;

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/data-master/read', $data);
        $this->load->view('layouts/footer');
    }

    public function create()
    {
        $data['user'] = [];
        if (isset($this->session->userdata['username'])) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        }
        $data['title'] = 'Create User Pages';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/data-master/create', $data);
        $this->load->view('layouts/footer');
    }

    public function store()
    {
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => $this->input->post('role'),

        ];

        $this->UserModels->addDataUser($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">User berhasil dibuat!!</div>');
        redirect('user');
    }

    public function update($id)
    {
        $data['user'] = [];
        if (isset($this->session->userdata['username'])) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        }

        $data['title'] = 'Update User Pages';

        $models = $this->UserModels->getDataUserById($id);
        $data['users'] = $models;
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/data-master/update', $data);
        $this->load->view('layouts/footer');
    }

    public function updateUser($id)
    {
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $new_password = $this->input->post('password');
        if (!empty($new_password)) {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        $data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'role' => $this->input->post('role'),
        ];

        $this->UserModels->updateDataUser($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">User berhasil diupdate!!</div>');
        redirect('user');
    }

    public function delete($id)
    {
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $this->UserModels->deleteDataUser($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">User berhasil didelete!!</div>');
        redirect('user');
    }
}
