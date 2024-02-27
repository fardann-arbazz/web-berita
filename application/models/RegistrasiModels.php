<?php
class RegistrasiModels extends CI_Model
{
    public function getDataByAdmin()
    {
        $this->db->select('*');
        $this->db->from('registrasi');
        $query = $this->db->get();

        return $query->result();
    }

    public function getDataByUser($id_user)
    {
        return $this->db->get_where('registrasi', ['id_user' => $id_user])->row_array();
    }

    public function createDataRegistrasi($data)
    {
        $this->db->insert('registrasi', $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('registrasi', ['id' => $id])->row_array();
    }

    public function updateDataRegistrasi($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('registrasi', $data);
    }

    public function deleteDataRegistrasi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('registrasi');
    }
}
