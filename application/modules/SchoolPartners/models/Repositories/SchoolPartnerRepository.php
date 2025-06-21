<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SchoolPartnerRepository extends CI_Model
{

    private $table = 'partners';

    public function get_all($limit, $offset, $search = null)
    {
        if ($search) {
            $this->db->like('school_name', $search);
            $this->db->or_like('contact_person', $search);
            $this->db->or_like('email', $search);
        }
        return $this->db
            ->order_by('id', 'DESC')
            ->get($this->table, $limit, $offset)
            ->result();
    }

    public function count_all($search = null)
    {
        if ($search) {
            $this->db->like('school_name', $search);
            $this->db->or_like('contact_person', $search);
            $this->db->or_like('email', $search);
        }
        return $this->db->count_all_results($this->table);
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
