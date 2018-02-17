<?php (defined('BASEPATH')) or exit('No direct script access allowed');

/* load the MX_Config class */
require APPPATH."third_party/MX/Config.php";

class MY_Config extends MX_Config
{
    public function __construct()
    {
        parent::__construct();

        // Read .env file
        $dotenv = new Dotenv\Dotenv(FCPATH);
        $dotenv->load();

        // Generate base URL
        $this->set_item('base_url', getenv('BASE_URL'));

        //$this->config->load('images');
    }

    public function items($config = [])
    {
        foreach ($config as $row) {
            foreach ($row as $key => $value) {
                $this->set_item($key, $value);
            }
        }
    }
}
