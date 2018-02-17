<?php
class Servers extends MY_Controller
{
    public $timezone;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('servers_model', 'servers');

        $this->timezone = $this->config->item('time_zone');
    }

    public function index($page = 1)
    {
        if(!is_numeric($page)) 
            show_404();

        // Get total rows
        $total = $this->servers->count_servers();

        // Generate pagination
        $pag = $this->pagination->init([
            'base_url' => 'servers',
            'total_rows' => $total,
            'uri_segment' => 2,
            'page' => $page,
        ]);

        // Get all rows and sets
        $servers = $this->servers->get_servers($pag);
        foreach ($servers as &$server) {
            $update = strtotime($server['update']." ".$this->timezone);
            $server += [
                "update" => strftime("%d.%m %H:%M", $update),
                'url_addres' => "cstrike/servers/server/{$server['addres']}",
            ];

            //$addr = explode(":",$server['addres']);
            //$server["ip"] = gethostbyname($addrs[0]);
            //$server['addr'] = gethostbyaddr($addr[0]);

            // Autoupdate
            if (time()-$update > 1800) {
                $server = $this->servers->get_servers_info($server);
                $this->servers->set_servers($server);
            }
        }

        // Render
        $this->render([
            'total' => $total,
            'servers' => $servers,
        ] + $pag);
    }

    public function server($addr = null)
    {
        // XSS
        $addr = $this->security->xss_clean($addr);

        $addrs = explode(":", $addr);
        $addr = gethostbyname($addrs[0]).":". (isset($addrs[1]) ? $addrs[1] : "27015");

        // Get server
        $server = $this->servers->get_server($addr);
        empty($server) && show_404();

        $server = $this->servers->get_servers_info($server, true);
        $server += [
            'img_map' => image("maps/{$server['map']}.jpg"),
            "ip" => $addr,
        ];

        $this->render($server);
    }
}
