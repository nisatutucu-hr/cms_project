<?php

class Product_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->tableName = 'products';
    }

    public function get(array $where = [])
    {
        return $this->db
            ->where($where)
            ->get($this->tableName)
            ->row();
    }

    public function get_all(array $where = [])
    {
        return $this->db
            ->where($where)
            ->get($this->tableName)
            ->result();
    }

    public function add(array $data = [])
    {
        return $this->db->insert($this->tableName, $data);
    }

    public function update(array $where = [], array $data = [])
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    public function delete(array $where = [])
    {
        return $this->db->where($where)->delete($this->tableName);
    }
}
