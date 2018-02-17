<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Preloader
{
    public function __construct()
    {
        // __construct
    }

    public function add($page = 'preloader')
    {
        return $this->load->view($page, [], true);
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }
}
