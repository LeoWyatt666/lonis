<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Players_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function sql_players($name = '')
    {
        $name = $this->db->escape_like_str($name);
        $where = $name ? "AND `name` LIKE '%{$name}%' ESCAPE '!'" : '';
        $sql = "SELECT * FROM `cs_players` WHERE 1 {$where} ORDER BY `name`";
        return $sql;
    }

    public function get_players($name, $pag)
    {
        $sql = $this->sql_players($name);
        $query = $this->db->query($sql." LIMIT {$pag['offset']}, {$pag['per_page']}");
        return $query->result();
    }

    public function count_players($name)
    {
        $sql = $this->sql_players($name);
        return $this->db_count_all($sql);
    }

    public function get_player($id)
    {
        $query = $this->db->get_where('cs_players', ['id' => $id]);
        return $query->row();
    }
}
