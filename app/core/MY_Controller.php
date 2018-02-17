<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends MX_Controller
{
    public $data = [];
    public $page = '';
    public $tpl = 'default';

    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('assets');
    }

    // Render HTML
    public function render()
    {
        foreach (func_get_args() as $arg) {
            is_array($arg) && $this->data_array($arg);
            is_object($arg) && $this->data_object($arg);
            is_string($arg) && $this->page($arg);
        }

        if(!$this->page)
            $this->page(
                $this->router->module .'/'. 
                $this->router->class .'/'. 
                $this->router->method
            );

        // Load Vars
        $this->data += [
            'language' => $this->config->item('language'),
            'site_name' => $this->config->item('site_name'),
            'authors' => $this->config->item('authors'),
            'template' => $this->tpl,
            'module' =>  $this->router->module,
            'class' => $this->router->class,
        ];

        // Load Blocks
        $this->data += $this->dbmenu->main();            // {MENU_MAIN}, {MENU_UCP}, {MENU_AUTH}
        $this->data['SOCIAL']        = $this->social->lists(0, 'libraries/social_lists');
        $this->data['LANGUAGE_FORM'] = $this->language->form('libraries/language_form');
        $this->data['GROCERY_CRUD']  = $this->load->view('libraries/grocery_crud', $this->data, true);

        $dir = directory_map(VIEWPATH."template/{$this->tpl}/");
        foreach($dir as $file) {
            $file = explode('.', $file);
            if(isset($file[1]) && $file[1]=='php')
                $this->data[strtoupper($file[0])] = $this->parser->parse("template/{$this->tpl}/{$file[0]}", $this->data, true);
        }
        $this->data['ASSETS_CSS']  = $this->assets->get_styles('assets');
        $this->data['ASSETS_JS']  = $this->assets->get_scripts('assets');

        // Content
        $this->data['CONTENT'] = $this->parser->parse($this->page, $this->data, true);

        // Generate HTML
        $html = $this->parser->parse("template/{$this->tpl}/html", $this->data, true);
        $html = $this->language->parse($html);

        // Testing
        $time = microtime(TRUE) - TEST_TIME;
        $memory = (memory_get_usage() - TEST_MEMORY) / (1024 * 1024);
        $html .= "<center><small>Time: {$time}, Memory: {$memory}<small></center><br>";

        // Protection
        $this->output->set_header('X-Content-Type-Options: nosniff');
        $this->output->set_header('X-Frame-Options: DENY');
        $this->output->set_header('X-XSS-Protection: 1; mode=block');

        // Output HTML
        $this->output->set_output($html);
    }

    // Choose template
    public function template($tpl)
    {
        $this->tpl = $tpl;
    }

    // Set data
    public function data_array($data = [])
    {
        isset($data) && $this->data = $data;
    }

    public function data_object($data)
    {
        isset($data) && $this->data = (array) $data;
    }

    // Set page
    public function page($page = '')
    {
        $page && $this->page = $page;
    }
}
