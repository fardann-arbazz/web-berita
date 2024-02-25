<?php
class UserModels extends CI_Model
{
    public function getDataUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();

        return $query->result();
    }

    public function addDataUser($data)
    {
        return $this->db->insert('user', $data);
    }

    public function getDataUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function updateDataUser($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function deleteDataUser($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }
}
