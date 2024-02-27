<?php

class Registrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('RegistrasiModels');
        $this->load->library('form_validation');
    }

    public function admin()
    {
        $data['user'] = [];

        if (isset($this->session->userdata['username'])) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        }

        $models = $this->RegistrasiModels->getDataByAdmin();
        $data['registrasi'] = $models;

        $data['title'] = 'Admin Registrasi List Pages';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/registrasi/adminlist', $data);
        $this->load->view('layouts/footer');
    }

    public function list()
    {
        $data['user'] = [];

        if (isset($this->session->userdata['username'])) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        }

        $id_user = $this->session->userdata('id');
        $models = $this->RegistrasiModels->getDataByUser($id_user);
        $data['registrasi'] = $models;

        $data['title'] = 'User Registrasi List Pages';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/registrasi/userlist', $data);
        $this->load->view('layouts/footer');
    }

    public function create()
    {
        $data['user'] = [];

        if (isset($this->session->userdata['username'])) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        }

        $data['title'] = 'Create Registrasi Pages';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/registrasi/create', $data);
        $this->load->view('layouts/footer');
    }

    public function store()
    {
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $id_user = $this->session->userdata('id');
        $role = $this->session->userdata('role') == 'admin';
        $capture = $_FILES['file_bukti'];

        if ($capture['name'] == '') {
        } else {
            $config['upload_path'] = './registrasi/';
            $config['allowed_types'] = 'jpeg|jpg|webp|png|pdf|doc|docx';
            $config['max_size'] = 2048;
            $config['max_width'] = 100000;
            $config['max_height'] = 100000;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file_bukti')) {
                $error = $this->upload->display_errors();
                echo 'Error upload' . $error;
                die();
            } else {
                $capture = $this->upload->data('file_name');
            }
        }

        $data = [
            'id_user' => $id_user,
            'bid_lomba' => $this->input->post('bid_lomba'),
            'asal_sekolah' => $this->input->post('asal_sekolah'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'jk_siswa' => $this->input->post('jk_siswa'),
            'nisn' => $this->input->post('nisn'),
            'tempat_lahir_siswa' => $this->input->post('tempat_lahir_siswa'),
            'tgl_lahir_siswa' => $this->input->post('tgl_lahir_siswa'),
            'no_hp_siswa' => $this->input->post('no_hp_siswa'),
            'nama_guru' => $this->input->post('nama_guru'),
            'nip' => $this->input->post('nip'),
            'jk_guru' => $this->input->post('jk_guru'),
            'tempat_lahir_guru' => $this->input->post('tempat_lahir_guru'),
            'tgl_lahir_guru' => $this->input->post('tgl_lahir_guru'),
            'no_hp_guru' => $this->input->post('no_hp_guru'),
            'file_bukti' => $capture,
        ];

        $this->RegistrasiModels->createDataRegistrasi($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Registrasi berhasil dibuat!!</div>');
        if ($role) {
            redirect('registrasi/admin');
        } else {
            redirect('registrasi/list');
        }
    }

    public function update($id)
    {

        $data['user'] = [];

        if (isset($this->session->userdata['username'])) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        }

        $data['title'] = 'Update Registrasi Pages';

        $models = $this->RegistrasiModels->getDataById($id);
        $data['registrasi'] = $models;

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/registrasi/update', $data);
        $this->load->view('layouts/footer');
    }

    public function updateData($id)
    {
        if (!$this->session->userdata('id')) {
            redirect('auth');
        }

        $id_user = $this->session->userdata('id');
        $role = $this->session->userdata('role') == 'admin';

        if ($_FILES['file_bukti']['error'] === UPLOAD_ERR_OK) {
            $config['upload_path'] = './registrasi/';
            $config['allowed_types'] = 'jpeg|jpg|webp|png|pdf|doc|docx';
            $config['max_size'] = 2048;
            $config['max_width'] = 100000;
            $config['max_height'] = 100000;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file_bukti')) {
                $error = $this->upload->display_errors();
                echo 'Error upload' . $error;
                die();
            } else {
                $capture = $this->upload->data('file_name');
            }
        } else {
            $capture = $this->input->post('file_bukti');
        }

        $data = [
            'id_user' => $id_user,
            'bid_lomba' => $this->input->post('bid_lomba'),
            'asal_sekolah' => $this->input->post('asal_sekolah'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'jk_siswa' => $this->input->post('jk_siswa'),
            'nisn' => $this->input->post('nisn'),
            'tempat_lahir_siswa' => $this->input->post('tempat_lahir_siswa'),
            'tgl_lahir_siswa' => $this->input->post('tgl_lahir_siswa'),
            'no_hp_siswa' => $this->input->post('no_hp_siswa'),
            'nama_guru' => $this->input->post('nama_guru'),
            'nip' => $this->input->post('nip'),
            'jk_guru' => $this->input->post('jk_guru'),
            'tempat_lahir_guru' => $this->input->post('tempat_lahir_guru'),
            'tgl_lahir_guru' => $this->input->post('tgl_lahir_guru'),
            'no_hp_guru' => $this->input->post('no_hp_guru'),
            'file_bukti' => $capture,
        ];

        $this->RegistrasiModels->updateDataRegistrasi($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Update registrasi berhasil!!</div>');
        if ($role) {
            redirect('registrasi/admin');
        } else {
            redirect('registrasi/list');
        }
    }

    public function deleteDataRegistrasi($id)
    {
        $data = $this->RegistrasiModels->getDataById($id);
        $role = $this->session->userdata('role') == 'admin';

        if ($data) {
            if (!empty($data['file_bukti'])) {
                $file_path = './thumbnail/' . $data['file_bukti'];
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            $this->RegistrasiModels->deleteDataRegistrasi($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Delete registrasi berhasil!!</div>');
            if ($role) {
                redirect('registrasi/admin');
            } else {
                redirect('registrasi/list');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ditemukkan!!</div>');
            if ($role) {
                redirect('registrasi/admin');
            } else {
                redirect('registrasi/list');
            }
        }
    }

    public function generate_laporan()
    {
        $id_user = $this->session->userdata('id');

        $models = $this->RegistrasiModels->getDataByAdmin();
        $data['registrations'] = $models;

        $modelsUser = $this->RegistrasiModels->getDataByUser($id_user);
        $data['users'] = $modelsUser;
        $this->load->view('dashboard/registrasi/laporan', $data);
    }

    public function generate_laporan_user()
    {
        $id_user = $this->session->userdata('id');

        $modelsUser = $this->RegistrasiModels->getDataByUser($id_user);
        $data['users'] = $modelsUser;
        $this->load->view('dashboard/registrasi/laporan_user', $data);
    }


}
