<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CrudModel extends CI_Model
{
    public function get($table)
    {
        return $this->db->get($table);
    }

    public function getId($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function add($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function joinOne($table1, $table2, $field1, $field2, $order, $ordering)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1 . '.' . $field1 . '=' . $table2 . '.' . $field2);
        $this->db->order_by($order, $ordering);
        return $this->db->get();
    }

    public function joinOneWhere($table1, $table2, $field1, $field2, $where, $order, $ordering)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1 . '.' . $field1 . '=' . $table2 . '.' . $field2);
        $this->db->where($where);
        $this->db->order_by($order, $ordering);
        return $this->db->get();
    }
}
