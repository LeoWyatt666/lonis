<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->model('profile_model', 'profile');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in())
            redirect('auth/login', 'refresh');

        // Get user
        $user = $this->ion_auth->user()->row();

        // Get cs player
        $player = $this->profile->get_player($user);

        if(!isset($player)) {
            redirect('cstrike/profile/add', 'refresh');
        }

        //$player->img_avatar = image("avatars/avatarfull/{$player->id}.jpg");

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if ($this->form_validation->run() === true) {
            $pplayer = (object) $this->input->post();

            if ($pplayer->name!=$player->name) {
                if ($this->profile->check_name($pplayer->name)) {
                    $this->form_validation->set_rules('name', 'Name', 'name_check');
                    $this->form_validation->set_message('name_check', lang("Name used"));
                    $this->form_validation->run();
                }
                else
                    $player->name = $pplayer->name;
            }

            if (!empty($pplayer->password))
                $player->password = md5($pplayer->password);

            if (!empty($pplayer->ip)) {
                preg_match('/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/',$pplayer->ip, $matches);
                if(isset($matches[0]))
                    $player->ip = $pplayer->ip;
            }
            else {
                $player->ip = '';
            }
            
            $player->icq = $pplayer->icq;

            $this->profile->upd_player($player);
        }

        // Render
        $this->render($player);
    }

    public function add() 
    {
        if (!$this->ion_auth->logged_in())
            redirect('auth/login', 'refresh');

        // Get user
        $user = $this->ion_auth->user()->row();

        // Get cs player
        $player = $this->profile->get_player($user);

        // Check player
        if(isset($player)) {
            redirect('cstrike/profile', 'refresh');
        }

        $name = $user->username;

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if ($this->form_validation->run() === true) {
            $pplayer = (object) $this->input->post();
            $pplayer->email = $user->email;

            if ($this->profile->check_name($pplayer->name)) {
                $this->form_validation->set_rules('name', 'Name', 'name_check');
                $this->form_validation->set_message('name_check', lang("Name used"));
                $this->form_validation->run();
            }
            else {
                $this->profile->add_player($pplayer);
                redirect('cstrike/profile', 'refresh');
            }

        }

        $this->render([
            'name' => $name
            ]
        );
    }
}