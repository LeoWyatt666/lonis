<?php
defined('BASEPATH') or exit('No direct script access allowed');

class YaMentrika
{
    public function __construct()
    {
        // __construct
    }

    public function add($page = 'ya-metrika')
    {
        return $this->load->view($page, [], true);
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }
}
