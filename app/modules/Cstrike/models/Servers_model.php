<?php
class Servers_model extends MY_Model
{
    public function __construct()
    {
        $this->load->library('hlds');
    }

    public function count_servers()
    {
        return $this->db_count_all('cs_view_servers');
    }

    public function get_servers()
    {
        $query = $this->db->get('cs_view_servers');
        return $query->result_array();
    }

    public function get_server($addr)
    {
        $query = $this->db->get_where('cs_view_servers', array('addres' => $addr));
        return $query->row_array();
    }

    public function set_servers($server)
    {
        $server = $this->db->escape($server);
        $sql = "UPDATE `cs_servers`
					SET `name` = {$server['name']},
						`map` = {$server['map']},
						`players` = {$server['players']},
						`max_players` = {$server['max_players']},
						`update` = NOW()
					WHERE `id` = {$server['id']}";
        $this->db->query($sql);
    }

    public function get_servers_info($server, $players = false)
    {
        if ($this->hlds->connect($server["addres"])) {
            $info = $this->hlds->info();
            if (isset($info)) {
                $server = array_replace($server, $info);
            }

            if ($players) {
                $server['players_list'] = $this->hlds->get_players();
            }
        } else {
            $server['map'] = "";
            $server['players'] = 0;
            $server['max_players'] = 0;
        }

        $server["update"] = strftime("%d.%m %H:%M", time());

        return $server;
    }
}
