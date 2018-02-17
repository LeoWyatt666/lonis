<?php
class About extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $language = $this->config->item('language');
        
        $this->render("Cstrike/About/about.{$language}.php");
    }
}
