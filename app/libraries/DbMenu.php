<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DbMenu
{
    public function __construct()
    {
        $this->load->library("multi_menu");
        $this->load->model("DbMenu_model", "dbmenu_mod");
        $this->load->model("user_info_model", 'user_info');
    }

    // Get menu
    public function get($group)
    {
        $items = $this->dbmenu_mod->get_menus($group);
        $this->multi_menu->set_items($items);
        return $this->multi_menu->render();
    }
    
    // MENU
    public function main($views = 'members')
    {
        $data['MENU_MAIN'] = $this->get('members');

        if ($this->ion_auth->logged_in()) {
            $data['MENU_USER'] = '';

            if ($this->ion_auth->is_admin()) {
                $data['MENU_USER'] .= $this->get('admin');
            }

            $data['MENU_USER'] .= $this->get('logged');
            
            $username = $this->ion_auth->user()->row()->username;
            $data['MENU_USER'] = str_replace('%username%', $username, $data['MENU_USER']);
        } else {
            $data['MENU_USER'] = $this->get('unlogged');
        }

        return $data;
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }
}
