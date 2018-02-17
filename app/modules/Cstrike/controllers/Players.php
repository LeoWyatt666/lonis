<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Players extends MY_Controller
{
    public $lang;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('players_model', 'players');

        $this->lang = $this->config->item('language_abbr');
    }

    // player
    public function index($page = 1)
    {
        if(!is_numeric($page)) 
            show_404();

        // Get search query
        $query = $this->input->get_post('q');

        // XSS
        $query = $this->security->xss_clean($query);

        // Get total rows
        $total = $this->players->count_players($query);

        // Generate pagination
        $pag = $this->pagination->init([
            'base_url' => 'cstrike/players',
            'total_rows' => $total,
            'uri_segment' => 3,
            'page' => $page,
        ]);

        // Get all rows and sets
        $players = $this->players->get_players($query, $pag);
        foreach ($players as &$player) {
            $player->url_player = "cstrike/players/player/{$player->id}";
            $player->url_avatar = image("avatars/avatar/{$player->id}.jpg");

            $country = $this->geoip->get_country($player->lastIp, $this->lang);
            $player->country_code =  strtolower($country->code);
            $player->country_name = $country->country_name;

            //$country = geoip_record_by_name($player->lastIp);
            //$player->country_code =  strtolower($country['country_code']);
            //$player->country_name = $country['country_name'];
        }

        // Render
        $this->render([
            'total' => $total,
            'players' => $players,
            'PAGINATION_LINKS' => $pag['PAGINATION_LINKS'],
        ]);
    }

    public function player($id = null)
    {
        if(!is_numeric($id)) 
            show_404();

        // Get player
        $player = $this->players->get_player($id);
        empty($player) && show_404();

        $player->lastTime = date('d.m.Y G:i:s', $player->lastTime);
        $player->mapCompleted = 0;
        $player->onlineTimes = time_elasped($player->onlineTime);
        $player->url_kreedz_player = "kreedz/player/{$player->id}";
        $player->url_achievs_player = "achievs/player/{$player->id}";
        $player->img_player = image("avatars/avatarfull/{$player->id}.jpg");

        $country = $this->geoip->get_country($player->lastIp, $this->lang);
        $player->country_code = $country->code;
        $player->country_name = $country->country_name;

        //$achievs = Modules::run('Achievs/count_player_achievs', $player->id);

        // Render
        $this->render($player);
    }
}
