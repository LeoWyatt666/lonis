<?php
class DbConfig_model extends MY_Model
{
    public function get_config($name = '', $type = 'array')
    {
        if ($type == 'json') {
            $where = $name ? "WHERE `name` = '{$name}'" : '';
            $sql = "SELECT `name`, `json` FROM ci_config {$where}";

            $query = $this->db->query($sql);
            $result = $query->result_array();

            $config = [];
            foreach ($result as $row) {
                $json = json_decode($row['json'], true);
                $config[$row['name']] = (json_last_error()===JSON_ERROR_NONE) ? $json : '';
            }

            return $config;
        } else {
            $where = $name ? "WHERE `var` = '{$name}'" : '';
            $sql = "SELECT `var`, `value` FROM ci_config {$where}";

            $query = $this->db->query($sql);
            $result = $query->result_array();

            $config = [];
            foreach ($result as $row) {
                $var = explode('.', $row['var']);
                if (isset($var[0]) && isset($var[1])) {
                    $config['main'][$var[0]][$var[1]] = $row['value'];
                } else {
                    $config['main'][$row['var']] = $row['value'];
                }
            }

            return $config;
        }
    }
}
