<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Steam_auth_model extends CI_Model
{
    public $tables = [];
    public $join = [];

    public function __construct()
    {
        $this->config->load('steam_auth', true);
        $this->config->load('ion_auth', true);

        $this->tables = $this->config->item('tables', 'steam');
    }

    public function get_steamid($userid)
    {
        $sql = "SELECT `s`.`steamid` FROM `ci_steams` `s`
                LEFT JOIN `unr_players` `u` ON `u`.`steam_id_64`=`s`.`steamid`
                WHERE `u`.`id` = '{$userid}' LIMIT 1";

        return $this->db->query($sql)->row_array();
    }

    public function check_steamid($steamid)
    {
        $steamid = $this->db->escape($steamid);
        $sql = "SELECT `id` FROM `ci_users` `u` WHERE `steam_id_64` = {$steamid} LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function check_name($name)
    {
        $name = $this->db->escape($name);
        $sql = "SELECT `id` FROM `unr_players` `u` WHERE `u`.`name` = {$name} LIMIT 1";
        return $this->db->query($sql)->row_array();
    }

    public function upd_steamid($user)
    {
        $user = $this->db->escape($user);
        $sql = "UPDATE `unr_players` `u`
                    SET `steam_id_64` = {$user['steamid']}
                    WHERE `userid` = {$user['id']}";
        return $this->db->query($sql);
    }
    
    public function set_user($name, $user)
    {
        $user = $this->db->escape($user);
        $param = '';
        foreach ($user as $key => $value) {
            $param .= "`{$key}`='{$value}',";
        }
        $param = substr($param, 0, -1);

        $sql = "INSERT INTO `unr_users` SET `name`='{$name}'";
        $this->db->query($sql);
        $id = $this->db->insert_id();

        $sql = "INSERT INTO `ci_steams` `s` SET {$param} 
                    ON DUPLICATE KEY UPDATE {$param}";
        $this->db->query($sql);
        return $id;
    }
}
