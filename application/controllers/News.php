<?php
class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('NewsModels');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = [];

        if (isset($this->session->userdata['username'])) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        }

        $models = $this->NewsModels->getDataByAdmin();
        $data['news'] = $models;

        $data['title'] = 'Admin News Pages';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/news/adminlist', $data);
        $this->load->view('layouts/footer');
    }

    public function list()
    {
        $data['user'] = [];

        if (isset($this->session->userdata['username'])) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        }

        $id_user = $this->session->userdata('id');
        $models = $this->NewsModels->getDataByUser($id_user);
        $data['news'] = $models;

        $data['title'] = 'User News Pages';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/news/userlist', $data);
        $this->load->view('layouts/footer');
    }

    public function create()
    {
        $data['user'] = [];

        if (isset($this->session->userdata['username'])) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        }

        $data['title'] = 'Create News Pages';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/news/create', $data);
        $this->load->view('layouts/footer');
    }

    public function store()
    {
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $user_id = $this->session->userdata('id');
        $role = $this->session->userdata('role') == 'admin';

        $capture = $_FILES['thumbnail'];

        $status = $role ? 'tayang' : 'draft';

        if ($capture['name'] == '') {
        } else {
            $config['upload_path'] = './thumbnail/';
            $config['allowed_types'] = 'jpeg|jpg|png|webp';
            $config['max_size'] = 2048;
            $config['max_width'] = 100000;
            $config['max_height'] = 100000;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('thumbnail')) {
                $error = $this->upload->display_errors();
                echo 'error' . $error;
                die();
            } else {
                $capture = $this->upload->data('file_name');
            }
        }

        $data = [
            'title' => $this->input->post('title'),
            'thumbnail' => $capture,
            'isi_konten' => $this->input->post('isi_konten'),
            'status' => $status,
            'category' => $this->input->post('category'),
            'pembuat' => $this->input->post('pembuat'),
            'id_user' => $user_id
        ];

        $this->NewsModels->createDataNews($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">News berhasil dibuat!!</div>');
        if ($role) {
            redirect('news');
        } else {
            redirect('news/list');
        }
    }

    public function update($id)
    {
        $data['user'] = [];

        if (isset($this->session->userdata['username'])) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        }

        $models = $this->NewsModels->getDataById($id);
        $data['news'] = $models;

        $data['title'] = 'Update News Pages';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/news/update', $data);
        $this->load->view('layouts/footer');
    }

    public function updateData($id)
    {
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $user_id = $this->session->userdata('id');
        $role = $this->session->userdata('role') == 'admin';

        $status = $role ? 'tayang' : 'draft';

        if ($_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
            $config['upload_path']  = './thumbnail/';
            $config['allowed_types'] = 'jpg|png|jpeg|webp';
            $config['max_size'] = 2048;
            $config['max_width'] = 100000;
            $config['max_height'] = 100000;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('thumbnail')) {
                $error = $this->upload->display_errors();
                echo 'Data error' . $error;
                die();
            } else {
                $capture = $this->upload->data('file_name');
            }
        } else {
            $capture = $this->input->post('thumbnail');
        }

        $data = [
            'title' => $this->input->post('title'),
            'thumbnail' => $capture,
            'isi_konten' => $this->input->post('isi_konten'),
            'status' => $status,
            'category' => $this->input->post('category'),
            'pembuat' => $this->input->post('pembuat'),
            'id_user' => $user_id
        ];

        $this->NewsModels->updateDataNews($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Update berhasil!!</div>');
        if ($role) {
            redirect('news');
        } else {
            redirect('news/list');
        }
    }

    public function draftNews()
    {
        $data['user'] = [];

        if (isset($this->session->userdata['username'])) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        }

        $status = 'draft';
        $models = $this->NewsModels->getDataNewsDraft($status);
        $data['news'] = $models;

        $data['title'] = 'Update News Pages';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/news/draft', $data);
        $this->load->view('layouts/footer');
    }

    public function updateStatus($id)
    {
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $role = $this->session->userdata('role') == 'admin';

        $status = 'tayang';

        $data = [
            'status' => $status,
        ];

        $this->NewsModels->updateDataNews($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Update berhasil!!</div>');
        if ($role) {
            redirect('news');
        } else {
            redirect('news/list');
        }
    }
}
