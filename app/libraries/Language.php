<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Language
{
    public function __construct()
    {
        $this->load->library('parser');
    }

    public function lang()
    {
        return $this->config->item('language_abbr');
    }

    // --------------------------------------------------------------------
    public function parse($html = '')
    {
        return preg_replace_callback(
            '/<l>([^>]*)<\/l>/',
            function ($matches) {
                return $matches[1];
                //return isset($this->dict[$matches[1]]) ? $this->dict[$matches[1]] : $matches[1];
            },
            $html
        );
    }

    public function form($page = 'language_form')
    {
        $language = $this->config->item('language');
        $language_abbr = $this->config->item('language_abbr');
        $lang_uri_abbr = $this->config->item('lang_uri_abbr');

        $langs = [];
        foreach ($lang_uri_abbr as $key => $value) {
            $langs[] = [
                'active' => ($language_abbr==$key ? 'secondary' : 'basic'),
                'lang_curr' => $language_abbr,
                'lang_abbr' => $key,
                'url_lang' => $key.uri_string(),
                'lang' => ucfirst($value),
                'lang_flag' => ($key=='en' ? 'gb' : $key),
            ];
        }

        $data = [
            'language' =>  ucfirst($language),
            'language_abbr' => $language_abbr,
            'langs' => $langs,
        ];

        return $this->parser->parse($page, $data, true);
    }
    
    public function get_lang()
    {
        $lang = $this->session->lang;
        if (!$lang) {
            $alang = isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]) ? $_SERVER["HTTP_ACCEPT_LANGUAGE"] : $this->config->item('language');
            $lang = substr($alang, 0, 2);
            $this->session->set_userdata('lang', $lang);

            $language = strtolower($this->get_language($lang)['language']);
            $this->config->set_item('language', $language);
        }
        return $lang;
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }
}
