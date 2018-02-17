<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DbMenu_model extends MY_Model
{
    public function get_menus($auth = '')
    {
        $where = is_numeric($auth) ? "`m`.`auth`={$auth}" : "`ma`.`aname`='{$auth}'";
        $sql = "SELECT `m`.`id`, `m`.`parent`, `m`.`icon`, `m`.`slug`, `order`,`m`.`name`
                    FROM `ci_menu` `m`
                    LEFT JOIN `ci_gorups_menu` `ma` ON `ma`.`id`=`m`.`auth`
                    WHERE `active`=1 AND {$where}";

        return $this->db->query($sql)->result_array();
    }
}
