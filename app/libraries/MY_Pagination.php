<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Pagination extends CI_Pagination
{
    public $pag = [];

    public function __construct()
    {
        parent::__construct();

        $this->config->load('pagination');

        $this->pag = $this->config->item('pagination');
    }

    public function calc($page) 
    {  
        return [
            'offset' => ($page-1)*$this->pag['per_page'],
            'limit' => $this->pag['per_page'],
        ];
    }

    public function init($pag = [])
    {
        $self = str_replace(SELF, '', $_SERVER['SCRIPT_NAME']);
        $pag += $this->config->item('pagination');

        $pag = array_replace($pag, [
            'uri_segment' => $pag['uri_segment']-2,
            'offset' => ($pag['page']-1)*$pag['per_page'],
            'limit' => $pag['per_page'],
            'url_pagination_prev' => $self.$pag['base_url'].'/'.($pag['page']-1),
            'url_pagination_next' => $self.$pag['base_url'].'/'.($pag['page']+1),
            'page_last' => floor($pag['total_rows']/$pag['per_page'])+1,
        ]);

        if ($pag['page']<1 || $pag['page']>$pag['page_last']) {
            show_404();
        }

        $this->pagination->initialize($pag);
        $pag['PAGINATION_LINKS'] = $this->pagination->create_links();

        $pag['PAGINATION_LINKS'] = $this->parser->parse('libraries/pagination_links', $pag, true);

        return $pag;
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }
}
