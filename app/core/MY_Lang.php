<?php

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014-2018, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package CodeIgniter
 * @author  EllisLab Dev Team
 * @copyright   Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright   Copyright (c) 2014-2018, British Columbia Institute of Technology (http://bcit.ca/)
 * @license http://opensource.org/licenses/MIT  MIT License
 * @link    https://codeigniter.com
 * @since   Version 1.0.0
 * @filesource
 */
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Language Class extension.
 *
 * Adds language fallback handling.
 *
 * When loading a language file, CodeIgniter will load first the english version,
 * if appropriate, and then the one appropriate to the language you specify.
 * This lets you define only the language settings that you wish to over-ride
 * in your idiom-specific files.
 *
 * This has the added benefit of the language facility not breaking if a new
 * language setting is added to the built-in ones (english), but not yet
 * provided for in one of the translations.
 *
 * To use this capability, transparently, copy this file (MY_Lang.php)
 * into your application/core folder.
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Language
 * @author      EllisLab Dev Team
 * @link        https://codeigniter.com/user_guide/libraries/language.html
 */
class MY_Lang extends CI_Lang
{

    /**
     * Refactor: base language provided inside system/language
     *
     * @var string
     */
    public $base_language = 'english';

    /**
     * Class constructor
     *
     * @return  void
     */
    public function __construct()
    {
        parent::__construct();

        $this->localize();
    }

    public function localize()
    {
        global $URI, $CFG, $IN;

        $config =& $CFG->config;

        $index_page    = $config['index_page'];
        $lang_ignore   = $config['lang_ignore'];
        $default_abbr  = $config['language_abbr'];
        $lang_uri_abbr = $config['lang_uri_abbr'];

        /* get the language abbreviation from uri */
        $uri_abbr = $URI->segment(1);

        /* adjust the uri string leading slash */
        $URI->uri_string = preg_replace("|^\/?|", '/', $URI->uri_string);

        if ($lang_ignore) {
            if (isset($lang_uri_abbr[$uri_abbr])) {
                /* set the language_abbreviation cookie */
                $IN->set_cookie('user_lang', $uri_abbr, $config['sess_expiration']);
            } else {
                /* get the language_abbreviation from cookie */
                $lang_abbr = $IN->cookie($config['cookie_prefix'].'user_lang');
            }

            if (strlen($uri_abbr) == 2) {
                /* reset the uri identifier */
                $index_page .= empty($index_page) ? '' : '/';

                /* remove the invalid abbreviation */
                $URI->uri_string = preg_replace("|^\/?$uri_abbr\/?|", '', $URI->uri_string);

                /* redirect */
                header('Location: '.$config['base_url'].$index_page.$URI->uri_string);
                exit;
            }
        } else {
            /* set the language abbreviation */
            $lang_abbr = $uri_abbr;
        }

        /* check validity against config array */
        if (isset($lang_uri_abbr[$lang_abbr])) {
           /* reset uri segments and uri string */
            $URI->segment(array_shift($URI->segments));
            $URI->uri_string = preg_replace("|^\/?$lang_abbr|", '', $URI->uri_string);

           /* set config language values to match the user language */
            $config['language'] = strtolower($lang_uri_abbr[$lang_abbr]);
            $config['language_abbr'] = $lang_abbr;

           /* if abbreviation is not ignored */
            if (! $lang_ignore) {
                   /* check and set the uri identifier */
                   $index_page .= empty($index_page) ? $lang_abbr : "/$lang_abbr";

                /* reset the index_page value */
                $config['index_page'] = $index_page;
            }

           /* set the language_abbreviation cookie */
            $IN->set_cookie('user_lang', $lang_abbr, $config['sess_expiration']);
        } else {
            /* if abbreviation is not ignored */
            if (! $lang_ignore) {
                   /* check and set the uri identifier to the default value */
                $index_page .= empty($index_page) ? $default_abbr : "/$default_abbr";

                if (strlen($lang_abbr) == 2) {
                    /* remove invalid abbreviation */
                    $URI->uri_string = preg_replace("|^\/?$lang_abbr|", '', $URI->uri_string);
                }

                /* redirect */
                header('Location: '.$config['base_url'].$index_page.$URI->uri_string);
                exit;
            }

            /* set the language_abbreviation cookie */
            $IN->set_cookie('user_lang', $default_abbr, $config['sess_expiration']);
        }

        log_message('debug', "Language_Identifier Class Initialized");
    }

    // --------------------------------------------------------------------
    
    /**
     * Load a language file, with fallback to english.
     *
     * @param   mixed   $langfile   Language file name
     * @param   string  $idiom      Language name (english, etc.)
     * @param   bool    $return     Whether to return the loaded array of translations
     * @param   bool    $add_suffix Whether to add suffix to $langfile
     * @param   string  $alt_path   Alternative path to look for the language file
     *
     * @return  void|string[]   Array containing translations, if $return is set to TRUE
     */
    public function load($langfile, $idiom = '', $return = false, $add_suffix = true, $alt_path = '')
    {
        if (is_array($langfile)) {
            foreach ($langfile as $value) {
                $this->load($value, $idiom, $return, $add_suffix, $alt_path);
            }

            return;
        }

        $langfile = str_replace('.php', '', $langfile);

        if ($add_suffix === true) {
            $langfile = preg_replace('/_lang$/', '', $langfile) . '_lang';
        }

        $langfile .= '.php';

        if (empty($idiom) or ! preg_match('/^[a-z_-]+$/i', $idiom)) {
            $config = & get_config();
            $idiom = empty($config['language']) ? $this->base_language : $config['language'];
        }

        if ($return === false && isset($this->is_loaded[$langfile]) && $this->is_loaded[$langfile] === $idiom) {
            return;
        }

        // load the default language first, if necessary
        // only do this for the language files under system/
        $basepath = SYSDIR . 'language/' . $this->base_language . '/' . $langfile;
        if (($found = file_exists($basepath)) === true) {
            include($basepath);
        }

        // Load the base file, so any others found can override it
        $basepath = BASEPATH . 'language/' . $idiom . '/' . $langfile;
        if (($found = file_exists($basepath)) === true) {
            include($basepath);
        }

        // Do we have an alternative path to look in?
        if ($alt_path !== '') {
            $alt_path .= 'language/' . $idiom . '/' . $langfile;
            if (file_exists($alt_path)) {
                include($alt_path);
                $found = true;
            }
        } else {
            foreach (get_instance()->load->get_package_paths(true) as $package_path) {
                $package_path .= 'language/' . $idiom . '/' . $langfile;
                if ($basepath !== $package_path && file_exists($package_path)) {
                    include($package_path);
                    $found = true;
                    break;
                }
            }
        }

        if ($found !== true) {
            show_error('Unable to load the requested language file: language/' . $idiom . '/' . $langfile);
        }

        if (!isset($lang) or ! is_array($lang)) {
            log_message('error', 'Language file contains no data: language/' . $idiom . '/' . $langfile);

            if ($return === true) {
                return array();
            }
            return;
        }

        if ($return === true) {
            return $lang;
        }

        $this->is_loaded[$langfile] = $idiom;
        $this->language = array_merge($this->language, $lang);

        log_message('info', 'Language file loaded: language/' . $idiom . '/' . $langfile);
        return true;
    }
}
