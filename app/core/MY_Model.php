<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    protected $table_name ;
    protected $id ;
    protected $slug ;

    public function __construct()
    {
        parent::__construct();
    }

    public function db_count_all($sql) 
    {
        $fsql = strtolower(substr($sql, 0, 6))=='select' ? '('.$sql.') AS tmp' : $this->db->protect_identifiers($sql, true, null, false);
        $query = $this->db->query('SELECT COUNT(*) AS `numrows` FROM '.$fsql);

        if ($query->num_rows() === 0) {
            return 0;
        }

        $query = $query->row();
        return (int) $query->numrows;
    }

    public function found_rows()
    {
        return $this->db->query("SELECT FOUND_ROWS() as found_rows")->row()->found_rows;
    }

    // CRUD
	public function crud_read($id = null)
	{
        if($id) {
            $this->db->from($this->table);
            $this->db->where($this->id,$id);
            return $this->db->get()->row();
        }
        else {
            $this->db->from($this->table);
		    return $this->db->get()->result();
        }
	}

	public function crud_create($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function crud_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function crud_delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}
}
