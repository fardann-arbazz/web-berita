<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['user'] = [];
        if (isset($this->session->userdata['username'])) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        }
        $data['title'] = 'Dashboard Pages';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/home', $data);
        $this->load->view('layouts/footer');
    }
}
