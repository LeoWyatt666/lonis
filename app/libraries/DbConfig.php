<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DbConfig
{
    public function __construct()
    {
        // Load configs from DB
        $this->load->model('config_model');
    }

    // Get menu
    public function get()
    {
        $config = $this->config_model->get_config('ci_config');
        return $this->config->items($config);
    }
    
    public function __get($var)
    {
        return get_instance()->$var;
    }
}
