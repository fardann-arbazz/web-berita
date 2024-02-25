<?php
class NewsModels extends CI_Model
{
    public function getDataByAdmin()
    {
        $this->db->select('*');
        $this->db->from('news');
        $query = $this->db->get();

        return $query->result();
    }

    public function getDataByUser($id_user)
    {
        return $this->db->get_where('news', ['id_user' => $id_user])->row_array();
    }

    public function createDataNews($data)
    {
        $this->db->insert('news', $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('news', ['id' => $id])->row_array();
    }

    public function updateDataNews($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('news', $data);
    }

    public function getDataNewsDraft($status)
    {
        return $this->db->get_where('news', ['status' => $status])->row_array();
    }
}
