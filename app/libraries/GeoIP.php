<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GeoIP
{
    public function __construct()
    {
        $this->load->model('GeoIP_model', 'GeoIP_mod');
    }

    public function get_country($ip, $lang)
    {
        return $this->GeoIP_mod->get_country(strtolower($ip), $lang);
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }
}
