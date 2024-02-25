<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Pages';
            $this->load->view('layouts/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('layouts/auth_footer');
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $users = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($users) {
            if (password_verify($password, $users['password'])) {
                $data = [
                    'id' => $users['id'],
                    'username' => $users['username'],
                    'role' => $users['role']
                ];

                $this->session->set_userdata($data);
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Akun tidak ditemukan, Silahkan coba lagi!!</div>');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Sudah Ada!!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username Sudah Ada!!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password Terlalu Pendek!!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register Pages';
            $this->load->view('layouts/auth_header', $data);
            $this->load->view('auth/register', $data);
            $this->load->view('layouts/auth_footer');
        } else {
            $data = [
                'email' => htmlspecialchars($this->input->post('email')),
                'username' => htmlspecialchars($this->input->post('username')),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'guest'
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Register berhasil, Silahkan login!!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '<div class="alert alert-success">Logout berhasil!!</div>');
        redirect('auth');
    }
}
