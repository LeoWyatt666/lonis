<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        !$this->ion_auth->is_admin() && show_404();
    }

    public function config()
    {
        $crud = new grocery_CRUD();
        $output = $crud
                ->set_crud_url_path('crud/config')
                ->set_table('ci_config')
                ->set_subject('var')
                ->columns('id', 'var', 'value')
                ->display_as('id', 'Id')
                ->display_as('var', '<l>Var</l>')
                ->display_as('value', '<l>Value</l>')
                ->required_fields('var', 'value')
                ->render();

        //$this->load->view('_blocks/gcrud', $output);
        $this->render($output);
    }

    public function menu()
    {
        $crud = new grocery_CRUD();
        $output = $crud
                ->set_crud_url_path('crud/menu')
                ->set_table('ci_menu')
                ->set_subject('menu')
                ->columns('idx', 'id', 'parent', 'name', 'icon', 'slug','order','active','auth')
                ->order_by('id', 'desc')
                ->render();

        $this->render((array)$output);
    }

    public function players()
    {
        $crud = new grocery_CRUD();
        $output = $crud
                ->set_crud_url_path('crud/players')
                ->set_table('cs_players')
                ->set_subject('user')
                ->columns('id', 'name', 'email', 'steam_id_64')
                ->display_as('id', 'Id')
                ->display_as('name', '<l>Name</l>')
                ->display_as('email', '<l>Email</l>')
                ->display_as('steam_id_64', '<l>SteamId</l>')
                ->order_by('name', 'desc')
                ->required_fields('name')
                ->render();

        $this->render((array)$output);
    }
}
